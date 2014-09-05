class Mailtest extends Main_Controller {


    function __construct()
    {
        parent::__construct();




    }
    
    public function index()
    {
 
         print_r('Flag1');

    }


    public function sendtest1()
	{
	
          $this->load->library('email');

          $this->email->from('robot@tcb.io.com', 'TCB Robot');
          $this->email->to('rcid@myring.io');
          //$this->email->cc('ricardo@blacklabelrobot.com');
          //$this->email->bcc('ricidfe');

          $this->email->subject('Email Test');
          $this->email->message('Testing the email class.');

          $this->email->send();

          echo $this->email->print_debugger();


	}



	
	
	   public function about_old()
	{



	}
	


	
	
	
	
	
	
   
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
