<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class SignInController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        
        if(@$_SESSION['user']['is_loggin'] == true){
            redirect(base_url().'citizen/home');
        }
	}


	public function form()
	{
		// echo json_encode($_SESSION);
		// print_r($_SESSION);
		$this->slice->view('citizen.auth.signin');
	}

	public function signin()
	{
		$response = array(
			"code" => 200
		);


		// get the account according to email
		$account = Citizen::where('email', $this->input->post('email'))->get()->first();

		// check if email exists
		if($account == null){
			$response['title'] = 'Email not found.';
			$response['message'] = "Sorry, we coudnt find an account with that email. Please try again.";
			$response['code'] = 406;

			return $this->output
            ->set_content_type('application/json')
            ->set_status_header(406)
            ->set_output(json_encode($response));
		}


		// check if the account is activated
		if($account->status == "0"){
			$response['title'] = 'Account Deactivated';
			$response['message'] = "Sorry, we can't grant access to your account. We've sent an email to ".$account->email.". Open it up to activate your account.";
			$response['code'] = 406;

			return $this->output
            ->set_content_type('application/json')
            ->set_status_header(406)
            ->set_output(json_encode($response));
		}

		// check if password match
		if(password_verify($this->input->post('pass'), $account->password) == false){
			$response['title'] = 'Incorrect Password';
			$response['message'] = "Sorry, we can't grant access to your account. Please check your password and try again.";
			$response['code'] = 406;
			return $this->output
            ->set_content_type('application/json')
            ->set_status_header(406)
            ->set_output(json_encode($response));
		}

	


		// SETTING UP SESSION
		$user['user']['data'] = $account->toArray();
		$user['user']['is_loggin'] = true;
		$user['user']['agent'] = array(
            'os' => $this->agent->platform(),
            'browser' => $this->agent->browser(),
            'ip' => $this->input->ip_address()
		);
        $this->session->set_userdata($user);
		

		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($response));

	}

	
}