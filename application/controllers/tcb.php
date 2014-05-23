<?php if (!defined('BASEPATH')) die();
class Tcb extends Main_Controller {



	function __construct()
    {
        parent::__construct();
        
        $this->load->helper('url');
		//$this->load->library('tank_auth');

    }
    
    

	
	
   public function index()
	{
      $this->load->view('include/header');
      $this->load->view('pages/topmenu');
      $this->load->view('pages/home');
      $this->load->view('include/footer');
	}
	
	
	   public function about()
	{
      $this->load->view('include/header');
      $this->load->view('pages/topmenu');
      $this->load->view('pages/about');
      $this->load->view('include/footer');
	}
	
	   public function story()
	{
      $this->load->view('include/header');
      $this->load->view('pages/topmenu');
      $this->load->view('pages/story');
      $this->load->view('include/footer');
	}
	
	
	
   
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
