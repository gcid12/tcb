<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');

		$this->load->database();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->helper('language');
		
		//HEADER
        if (!$this->ion_auth->logged_in())  
		{
		$data['logged'] = false;			
		}else{
		$data['logged'] = true;
		$data['tcbuser'] = $this->ion_auth->user()->row();
		}
		
				
		$this->load->view('include/header',$data);
      	$this->load->view('pages/topmenu',$data);
	}

	//redirect if needed, otherwise display the user list
	function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
		{
			//redirect them to the home page because they must be an administrator to view this
			/* return show_error('You must be an administrator to view this page.'); */
			redirect('tcb', 'refresh');
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->_render_page('auth/index', $this->data);
		}
	}

	//log the user in
	function login()
	{
		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('/', 'refresh');
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			$this->_render_page('auth/login', $this->data);
		}
	}

	//log the user out
	function logout()
	{
		$this->data['title'] = "Logout";

		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('auth/login', 'refresh');
	}

	//change password
	function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{
			//display the form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id'   => 'new',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id'   => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);

			//render
			$this->_render_page('auth/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	//forgot password
	function forgot_password()
	{
		$this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		if ($this->form_validation->run() == false)
		{
			//setup the input
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
			);

			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			//set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->_render_page('auth/forgot_password', $this->data);
		}
		else
		{
			// get identity from username or email
			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
			}
			else
			{
				$identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
			}
	            	if(empty($identity)) {
		        	$this->ion_auth->set_message('forgot_password_email_not_found');
		                $this->session->set_flashdata('message', $this->ion_auth->messages());
                		redirect("auth/forgot_password", 'refresh');
            		}
            
			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				//if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	//reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			//if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false)
			{
				//display the form

				//set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
				'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id'   => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				//render
				$this->_render_page('auth/reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					//something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						//if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						$this->logout();
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}


	//activate the user
	function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	//deactivate the user
	function deactivate($id = NULL)
	{
		$id = $this->config->item('use_mongodb', 'ion_auth') ? (string) $id : (int) $id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->_render_page('auth/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			//redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	//formerly create_user
	function invite_user()
	{
		$this->data['title'] = "Create User";

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}

		$tables = $this->config->item('tables','ion_auth');
		
		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
		/* $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean'); */
		/*
$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
*/

		if ($this->form_validation->run() == true)
		{
			$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'endorser'    => $this->input->post('endorser'),
				/* 'phone'      => $this->input->post('phone'), */
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			//check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("tcb/invitesent", 'refresh'); //when it's done
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'class'    => 'form-control',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'class'    => 'form-control',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'class'    => 'form-control',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['endorser'] = array(
				'name'  => 'endorser',
				'id'    => 'endorser',
				'type'  => 'text',
				'class'    => 'form-control',
				'value' => $this->form_validation->set_value('endorser'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'value' => 'Suchil.5618',
				//'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'value' => 'Suchil.5618',
				//'value' => $this->form_validation->set_value('password_confirm'),
			);

			$this->_render_page('auth/create_user', $this->data);
		}
	}

	//edit a user
	function edit_user($id)
	{
		$this->data['title'] = "Edit User";

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		

		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'xss_clean'); 
		$this->form_validation->set_rules('pitch', 'Pitch', 'xss_clean'); 
		$this->form_validation->set_rules('about', 'About', 'xss_clean');
		$this->form_validation->set_rules('iwant', 'I want', 'xss_clean');
		$this->form_validation->set_rules('pw', 'Personal web', 'xss_clean');
		$this->form_validation->set_rules('city', 'City', 'xss_clean');
		$this->form_validation->set_rules('country', 'Country', 'xss_clean');
		$this->form_validation->set_rules('skillsdev', 'Developer skills', 'xss_clean');
		$this->form_validation->set_rules('skillsdes', 'Design skills', 'xss_clean');
		$this->form_validation->set_rules('skillspro', 'Product skills', 'xss_clean');
		$this->form_validation->set_rules('skillsdat', 'Data Skills', 'xss_clean');
		$this->form_validation->set_rules('skillsfin', 'Finance skills', 'xss_clean');
		$this->form_validation->set_rules('pay01', 'Payment 1', 'xss_clean');
		$this->form_validation->set_rules('pay02', 'Payment 2', 'xss_clean');
		$this->form_validation->set_rules('pm01', 'Payment Method 1', 'xss_clean');
		$this->form_validation->set_rules('pm02', 'Payment Method 2', 'xss_clean');
		$this->form_validation->set_rules('s01', 'Social 1', 'xss_clean');
		$this->form_validation->set_rules('s02', 'Social 2', 'xss_clean');
		$this->form_validation->set_rules('s03', 'Social 3', 'xss_clean');
		$this->form_validation->set_rules('s04', 'Social 4', 'xss_clean');
		$this->form_validation->set_rules('s05', 'Social 5', 'xss_clean');
		$this->form_validation->set_rules('k01', 'Key 1', 'xss_clean');
		$this->form_validation->set_rules('k02', 'Key 2', 'xss_clean');
		$this->form_validation->set_rules('k03', 'Key 3', 'xss_clean');
		$this->form_validation->set_rules('k04', 'Key 4', 'xss_clean');
		$this->form_validation->set_rules('k05', 'Key 5', 'xss_clean');
		$this->form_validation->set_rules('showemail', 'Show Email', 'xss_clean');
		$this->form_validation->set_rules('battletag', 'Battle tag', 'xss_clean');
		$this->form_validation->set_rules('cofound', 'Co-found', 'xss_clean');
		$this->form_validation->set_rules('work', 'work', 'xss_clean');
		$this->form_validation->set_rules('recru', 'Recruiters', 'xss_clean');
		$this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');
		$this->form_validation->set_rules('skills', 'Skills', 'xss_clean');
		

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'email'  => $this->input->post('email'),
				'pitch'      => $this->input->post('pitch'),
				'about'      => $this->input->post('about'),
				'iwant'      => $this->input->post('iwant'),
				'pw'      => $this->input->post('pw'),
				'city'      => $this->input->post('city'),
				'country'      => $this->input->post('country'),
				'tshirt'      => $this->input->post('tshirt'),
				'gender'      => $this->input->post('gender'),
				'skillsdev'      => $this->input->post('skillsdev'),
				'skillsdes'      => $this->input->post('skillsdes'),
				'skillspro'      => $this->input->post('skillspro'),
				'skillsfin'      => $this->input->post('skillsfin'),
				'skillsdat'      => $this->input->post('skillsdat'),
				's01'      => $this->input->post('s01'),
				's02'      => $this->input->post('s02'),
				's03'      => $this->input->post('s03'),
				's04'      => $this->input->post('s04'),
				's05'      => $this->input->post('s05'),
				'k01'      => $this->input->post('k01'),
				'k02'      => $this->input->post('k02'),
				'k03'      => $this->input->post('k03'),
				'k04'      => $this->input->post('k04'),
				'k05'      => $this->input->post('k05'),
				'showemail'      => $this->input->post('showemail'),
				'recru'      => $this->input->post('recru'),
				'pay01'      => $this->input->post('pay01'),
				'pay02'      => $this->input->post('pay02'),
				'pm01'      => $this->input->post('pm01'),
				'pm02'      => $this->input->post('pm02'),
				'battletag'      => $this->input->post('battletag'),
				'cofound'      => $this->input->post('cofound'),
				'work'      => $this->input->post('work'),
				/* ////////////*/
			);

			
			//if ($this->ion_auth->is_admin())   //Originally only Admin can update
			//{
				//Update the groups user belongs to
				$groupData = $this->input->post('groups');

				if (isset($groupData) && !empty($groupData)) {

					$this->ion_auth->remove_from_group('', $id);

					foreach ($groupData as $grp) {
						$this->ion_auth->add_to_group($grp, $id);
					}

				}
			//}

			//update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');

				$data['password'] = $this->input->post('password');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$this->ion_auth->update($user->id, $data);

				//check to see if we are creating the user
				//redirect them back to the admin page
				$this->session->set_flashdata('message', "User Saved");
				if ($this->ion_auth->is_admin())
				{
					redirect('auth', 'refresh');
				}
				else
				{
					redirect('/', 'refresh');
				}
			}
		}

		//display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;


		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'class'    => 'form-control input-sm',
			'placeholder' => 'First Name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'class'    => 'form-control input-sm',
			'placeholder' => 'Last Name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'placeholder' => 'email',
				'class'    => 'form-control',
				'value' => $this->form_validation->set_value('email', $user->email),
		);
// Intrusos
		$this->data['pitch'] = array(
			'name'  => 'pitch',
			'id'    => 'pitch',
			'type'  => 'text',
			'placeholder' => 'your personal pitch',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('pitch', $user->pitch),
		);
		$this->data['about'] = array(
			'name'  => 'about',
			'id'    => 'about',
			'type'  => 'text',
			'placeholder' => 'Try to be concise and to the point',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('about', $user->about),
		);
		$this->data['iwant'] = array(
			'name'  => 'iwant',
			'id'    => 'iwant',
			'type'  => 'text',
			'placeholder' => 'Save the rainforest, explore other possibilities, make money, meet new people, etc..',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('iwant', $user->iwant),
		);
			$this->data['pw'] = array(
			'name'  => 'pw',
			'id'    => 'pw',
			'placeholder' => 'Your personal website',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('pw', $user->pw),
		);
				$this->data['city'] = array(
			'name'  => 'city',
			'id'    => 'city',
			'type'  => 'text',
			'placeholder' => 'Where you live',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('city', $user->city),
		);
				$this->data['country'] = array(
			'name'  => 'country',
			'id'    => 'country',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('country', $user->country),
		);
				$this->data['tshirt'] = array(
			'name'  => 'tshirt',
			'id'    => 'tshirt',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('tshirt', $user->tshirt),
		);
			$this->data['gender'] = array(
			'name'  => 'gender',
			'id'    => 'gender',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('gender', $user->gender),
		);
				$this->data['s01'] = array(
			'name'  => 's01',
			'id'    => 's01',
			'type'  => 'text',
			'placeholder' => 'Twitter handle',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('s01', $user->s01),
		);
				$this->data['s02'] = array(
			'name'  => 's02',
			'id'    => 's02',
			'type'  => 'text',
			'placeholder' => 'URL',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('s02', $user->s02),
		);
				$this->data['s03'] = array(
			'name'  => 's03',
			'id'    => 's03',
			'type'  => 'text',
			'placeholder' => 'URL',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('s03', $user->s03),
		);
				$this->data['s04'] = array(
			'name'  => 's04',
			'id'    => 's04',
			'type'  => 'text',
			'placeholder' => 'URL',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('s04', $user->s04),
		);
				$this->data['s05'] = array(
			'name'  => 's05',
			'id'    => 's05',
			'type'  => 'text',
			'placeholder' => 'URL',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('s05', $user->s05),
		);
				$this->data['k01'] = array(
			'name'  => 'k01',
			'id'    => 'k01',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('k01', $user->k01),
		);
				$this->data['k02'] = array(
			'name'  => 'k02',
			'id'    => 'k02',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('k02', $user->k02),
		);
				$this->data['k03'] = array(
			'name'  => 'k03',
			'id'    => 'k03',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('k03', $user->k03),
		);
				$this->data['k04'] = array(
			'name'  => 'k04',
			'id'    => 'k04',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('k04', $user->k04),
		);
				$this->data['k05'] = array(
			'name'  => 'k05',
			'id'    => 'k05',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('k05', $user->k05),
		);
					$this->data['skillsdev'] = array(
			'name'  => 'skillsdev',
			'id'    => 'skillsdev',
			'type'  => 'text',
			'rows'  => '3',
			'max_length'  => '300',
			'placeholder'  => 'max 300 chars, separate with comas',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('skillsdev', $user->skillsdev),
		);
					$this->data['skillsdes'] = array(
			'name'  => 'skillsdes',
			'id'    => 'skillsdes',
			'type'  => 'text',
			'rows'  => '3',
			'max_length'  => '300',
			'placeholder'  => 'max 300 chars, separate with comas',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('skillsdes', $user->skillsdes),
		);
					$this->data['skillspro'] = array(
			'name'  => 'skillspro',
			'id'    => 'skillspro',
			'type'  => 'text',
			'rows'  => '3',
			'max_length'  => '300',
			'placeholder'  => 'max 300 chars, separate with comas',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('skillspro', $user->skillspro),
		);
					$this->data['skillsdat'] = array(
			'name'  => 'skillsdat',
			'id'    => 'skillsdat',
			'type'  => 'text',
			'rows'  => '3',
			'max_length'  => '300',
			'placeholder'  => 'max 300 chars, separate with comas',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('skillsdat', $user->skillsdat),
		);
					$this->data['skillsfin'] = array(
			'name'  => 'skillsfin',
			'id'    => 'skillsfin',
			'type'  => 'text',
			'rows'  => '3',
			'max_length'  => '300',
			'placeholder'  => 'max 300 chars, separate with comas',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('skillsfin', $user->skillsfin),
		);	
					$this->data['showemail'] = array(
			'name'  => 'showemail',
			'id'    => 'showemail',
			'value'  => 'accept',
			'checked'  => 'TRUE',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('showemail', $user->showemail),
		);
		 			$this->data['recru'] = array(
			'name'  => 'recru',
			'id'    => 'recru',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('recru', $user->recru),
		);
		 			$this->data['battletag'] = array(
			'name'  => 'battletag',
			'id'    => 'battletag',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('battletag', $user->battletag),
		);
		 			$this->data['cofound'] = array(
			'name'  => 'cofound',
			'id'    => 'cofound',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('cofound', $user->cofound),
		);
		 			$this->data['work'] = array(
			'name'  => 'work',
			'id'    => 'work',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('work', $user->work),
		);
				$this->data['pay01'] = array(
			'name'  => 'pay01',
			'id'    => 'pay01',
			'type'  => 'text',
			'placeholder' => 'Payment details',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('pay01', $user->pay01),
		);
			$this->data['pay02'] = array(
			'name'  => 'pay02',
			'id'    => 'pay02',
			'type'  => 'text',
			'placeholder' => 'Payment details',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('pay02', $user->pay02),
		);	
			$this->data['pay03'] = array(
			'name'  => 'pay03',
			'id'    => 'pay03',
			'type'  => 'text',
			'placeholder' => 'Payment details',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('pay03', $user->pay03),
		);		
			$this->data['pm01'] = array(
			'name'  => 'pm01',
			'id'    => 'pm01',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('pm01', $user->pm01),
		);
			$this->data['pm02'] = array(
			'name'  => 'pm02',
			'id'    => 'pm02',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('pm02', $user->pm02),
		);
				$this->data['pm03'] = array(
			'name'  => 'pm03',
			'id'    => 'pm03',
			'type'  => 'text',
			'class'    => 'form-control input-sm',
			'value' => $this->form_validation->set_value('pm03', $user->pm03),
		);

//intrusos finish		
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password',
			'class'    => 'form-control input-sm'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password',
			'class'    => 'form-control input-sm'
		);

		$this->_render_page('auth/edit_user', $this->data);
		$this->load->view('include/footer');
	}

	// create a new group
	function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('description', $this->lang->line('create_group_validation_desc_label'), 'xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else
		{
			//display the create group form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			$this->_render_page('auth/create_group', $this->data);
		}
	}

	//edit a group
	function edit_group($id)
	{
		// bail if no group id given
		if(!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		//validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('group_description', $this->lang->line('edit_group_validation_desc_label'), 'xss_clean');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("auth", 'refresh');
			}
		}

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['group'] = $group;

		$this->data['group_name'] = array(
			'name'  => 'group_name',
			'id'    => 'group_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_name', $group->name),
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		$this->_render_page('auth/edit_group', $this->data);
		$this->load->view('include/footer');
	}


	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function _render_page($view, $data=null, $render=false)
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $render);

		if (!$render) return $view_html;
	}

}
