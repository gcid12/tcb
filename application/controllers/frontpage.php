<?php if (!defined('BASEPATH')) die();

class Frontpage extends Main_Controller {

   public function index()
	{
      $this->load->view('include/header');
      $this->load->view('frontpage');
      $this->load->view('include/footer');
	}
   


   public function mailtest1()
     {
          $this->load->library('email');

          $this->email->from('robot@tcb.io.com', 'TCB Robot');
          $this->email->to('rcid@myring.io');
          //$this->email->cc('ricardo@blacklabelrobot.com');
          //$this->email->bcc('ricidfe');

          $this->email->subject('Email Test 911a');
          $this->email->message('Testing the email class in CI.');

          $this->email->send();

          echo $this->email->print_debugger();     
     }

   public function mailtest2()
     {
          $this->load->library('email');

          $this->email->from('robot@tcb.io.com', 'TCB Robot');
          $this->email->to('rcid@myring.io');
          //$this->email->cc('ricardo@blacklabelrobot.com');
          //$this->email->bcc('ricidfe');

          $this->email->subject('Email Test');
          $this->email->message('Testing the email class ');

         # $this->email->send();
          print_r($this->email);
          echo $this->email->print_debugger();
     }

   public function mailtest3()
     {
            echo $this->_smtp_connect();
     }

   protected function _smtp_connect()
      {

        echo 'flag1';
        $this->smtp_crypto='';
        $this->smtp_host='smtp.gmail.com';
        $this->smtp_port='465';
        $this->smtp_timeout='300';

        $ssl = NULL;
        if ($this->smtp_crypto == 'ssl')
          $ssl = 'ssl://';


        $this->_smtp_connect = fsockopen($ssl.$this->smtp_host,
                        $this->smtp_port,
                        $errno,
                        $errstr,
                        $this->smtp_timeout);

        if ( ! is_resource($this->_smtp_connect))
        {
          //$this->_set_error_message('lang:email_smtp_error', $errno." ".$errstr);
          
          return 'error: This is not a resource';
        }

        

        echo 'flag2';

        
        echo($this->_get_smtp_data());

        if ($this->smtp_crypto == 'tls')
        {
          $this->_send_command('hello');
          $this->_send_command('starttls');
          stream_socket_enable_crypto($this->_smtp_connect, TRUE, STREAM_CRYPTO_METHOD_TLS_CLIENT);
        }

        return $this->_send_command('hello');
        
      }

  protected function _get_smtp_data()
      {
        $data = "";

        while ($str = fgets($this->_smtp_connect, 512))
        {
          $data .= $str;

          if (substr($str, 3, 1) == " ")
          {
            break;
          }
        }

        return $data;
      }



  protected function _send_command($cmd, $data = '')
  {
    switch ($cmd)
    {
      case 'hello' :

          if ($this->_smtp_auth OR $this->_get_encoding() == '8bit')
            $this->_send_data('EHLO '.$this->_get_hostname());
          else
            $this->_send_data('HELO '.$this->_get_hostname());

            $resp = 250;
      break;
      case 'starttls' :

            $this->_send_data('STARTTLS');

            $resp = 220;
      break;
      case 'from' :

            $this->_send_data('MAIL FROM:<'.$data.'>');

            $resp = 250;
      break;
      case 'to' :

            $this->_send_data('RCPT TO:<'.$data.'>');

            $resp = 250;
      break;
      case 'data' :

            $this->_send_data('DATA');

            $resp = 354;
      break;
      case 'quit' :

            $this->_send_data('QUIT');

            $resp = 221;
      break;
    }

    $reply = $this->_get_smtp_data();

    $this->_debug_msg[] = "<pre>".$cmd.": ".$reply."</pre>";

    if (substr($reply, 0, 3) != $resp)
    {
      $this->_set_error_message('lang:email_smtp_error', $reply);
      return FALSE;
    }

    if ($cmd == 'quit')
    {
      fclose($this->_smtp_connect);
    }

    return TRUE;
  }


}
/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
