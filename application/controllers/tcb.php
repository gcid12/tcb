<?php if (!defined('BASEPATH')) die();
class Tcb extends Main_Controller {



	function __construct()
    {
        parent::__construct();

        
        $this->load->library('ion_auth');
        $this->load->library('tcb_functions');

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
    
    

	
	
   public function index()
	{
	
		$this->load->model('tcbmodel');  //loading model
		$data['query'] = $this->tcbmodel->get_AllMembers();
		
      
      $this->load->view('pages/home',$data);
      $this->load->view('include/footer');
	}
	
	
	   public function about()
	{

      $this->load->view('pages/about');
      $this->load->view('include/footer');
	}
	
	   public function story()
	{

      $this->load->view('pages/story');
      $this->load->view('include/footer');
	}
	
	
		   public function profile($slug)
	{
	
			$this->load->model('tcbmodel');  //loading model
			$data['query'] = $this->tcbmodel->get_Member($slug);
			
			$this->load->model('tcbmodel');  //loading model
		$data['query2'] = $this->tcbmodel->get_AllMembers();
		

      $this->load->view('pages/profile',$data);
      $this->load->view('include/footer');
	}
	
			   public function news()
	{
	
			/*
$this->load->model('tcbmodel');  //loading model
			$data['query'] = $this->tcbmodel->get_Member($slug);
*/
		

      $this->load->view('pages/news');
      $this->load->view('include/footer');
	}
	
				   public function jointcb()
	{
	
			/*
$this->load->model('tcbmodel');  //loading model
			$data['query'] = $this->tcbmodel->get_Member($slug);
*/
		

      $this->load->view('pages/jointcb');
      $this->load->view('include/footer');
	}
	
	
	
		public function test()
	{
	
		if (!$this->ion_auth->logged_in())
		{
		
		}else{

	$data['tcbuser'] = $this->ion_auth->user()->row();
	
      $this->load->view('pages/test',$data);
      $this->load->view('include/footer');
		}

	}
	
			public function invitesent()
	{
	
		if (!$this->ion_auth->logged_in())
		{
		redirect('tcb', 'refresh');
		
		}else{
	
      $this->load->view('pages/invitesent');
      $this->load->view('include/footer');
		}

	}

				public function backstage($id)
	{
	
	if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}


	$user = $this->ion_auth->user($id)->row();
	$groups=$this->ion_auth->groups()->result_array();
	$currentGroups = $this->ion_auth->get_users_groups($id)->result();

	$this->data['user'] = $user;
	$this->data['groups'] = $groups;
	$this->data['currentGroups'] = $currentGroups;


		if (!$this->ion_auth->logged_in())
		{
		redirect('tcb', 'refresh');
		}else{
      $this->load->view('pages/zone',$this->data);
      $this->load->view('include/footer');
		}

	}


					public function member($id)
	{
	
	$user = $this->ion_auth->user($id)->row();
	$groups=$this->ion_auth->groups()->result_array();
	$currentGroups = $this->ion_auth->get_users_groups($id)->result();

	$this->data['user'] = $user;
	$this->data['groups'] = $groups;
	$this->data['currentGroups'] = $currentGroups;


		if (!$this->ion_auth->logged_in())
		{
		redirect('tcb', 'refresh');
		}else{
      $this->load->view('pages/member',$this->data);
      $this->load->view('include/footer');
		}

	}




				public function tagtest()
	{
	
      $this->load->view('pages/tagtest');
      $this->load->view('include/footer');


	}


	
	
	
	
	
	
   
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
