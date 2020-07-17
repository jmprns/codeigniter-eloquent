<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationController extends CI_Controller {


	public function form()
	{
		$this->slice->view('citizen.auth.register');
	}

	public function register()
	{

		$response = array(
			"code" => 200
		);


		$token = generate_token(50);

		// check if username already exists
		$username = Citizen::where('email', $this->input->post('email'))->get()->count();

		if($username !== 0){
			$response['message'] = 'Username already exists';
			$response['code'] = 406;
			return $this->output
            ->set_content_type('application/json')
            ->set_status_header(406)
            ->set_output(json_encode($response));
		}



		$email = $this->input->post('email');
		$em = explode("@", $email);

		// checking email if exists
		$checkEmailExists = dns_get_record($em[1]);
		if($checkEmailExists == false){
			$response['message'] = "We cannot sent to your email. Please check your email and try again.";
			$response['code'] = 406;
			return $this->output
            ->set_content_type('application/json')
            ->set_status_header(406)
            ->set_output(json_encode($response));
		}

		$this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        //Email content
		$htmlContent = '
			<h1>Click the link below to activate your account</h1>

			<a href="#">Activate Account</a>

			<br></br>

			<p>Or copy the link below and paste it to your browser\'s URL</p>
			<p>http://aurora.gov.ph/pho-covid/citizen/register/'.$token.'/activate
		';

        $this->email->to($email);
        $this->email->from('pho.aurora.covid19@gmail.com','PHO COVID-19 TRAVEL TRACKER');
        $this->email->subject('PHO COVID-19 TRAVEL TRACKER ACCOUNT ACTIVATION');
		$this->email->message($htmlContent);
		

        //Send email
		$checkEmail = $this->email->send();

		if($checkEmail == false){
			$response['message'] = "We cannot sent to your email. Please check your email and try again.";
			$response['code'] = 406;
			return $this->output
            ->set_content_type('application/json')
            ->set_status_header(406)
            ->set_output(json_encode($response));
		}




		$citizen = Citizen::create([
			"fname" => $this->input->post('fname'),
			"lname" => $this->input->post('lname'),
			"mname" => $this->input->post('mname'),
			"nationality" => $this->input->post('nationality'),
			"sex" => $this->input->post('sex'),
			"birthday" => $this->input->post('birthday'),
			"contact" => $this->input->post('contact'),
			"address" => $this->input->post('address'),
			"email" => $this->input->post('email'),
			"password" => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			"status" => "0",
			"token" => $token
		]);

		$response['message'] = "We've sent an email to ".$email.". Open it up to activate your account.";
		$response['title'] = "Almost done!";


		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($response));
	}
}