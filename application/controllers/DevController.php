<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DevController extends CI_Controller {

	public function email()
	{
        // $this->email->set_mailtype("html");
        // $this->email->set_newline("\r\n");

        // //Email content
        // $htmlContent = '<h1>Sending email via SMTP server</h1>';
        // $htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

        // $this->email->to('jp.pagapulan@gmail.com');
        // $this->email->from('pho.aurora.covid19@gmail.com','PHO COVID-19 TRAVEL TRACKER');
        // $this->email->subject('How to send email via SMTP server in CodeIgniter');
        // $this->email->message($htmlContent);

        // //Send email
        // $this->email->send();


        // verifying email
		// Initialize library class
		$mail = new VerifyEmail();

		// Set the timeout value on stream
		$mail->setStreamTimeoutWait(5);

		// Set debug output mode
		$mail->Debug= TRUE; 
		$mail->Debugoutput= 'html'; 

		// Set email address for SMTP request
		$mail->setEmailFrom('pho.aurora.covid19@gmail.com');

		// Email to check
		$email = 'jp.pagapulan@gmail.com';


		// Check if email is valid and exist
		if($mail->check($email)){ 
			echo 'Email &lt;'.$email.'&gt; is exist!'; 
		}elseif(verifyEmail::validate($email)){ 
			echo 'Email &lt;'.$email.'&gt; is valid, but not exist!'; 
		}else{ 
			echo 'Email &lt;'.$email.'&gt; is not valid and not exist!'; 
        } 
        

	}
}
