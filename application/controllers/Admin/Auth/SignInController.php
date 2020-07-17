<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class SignInController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        
        // if(@$_SESSION['user']['is_loggin'] == true){
        //     redirect(base_url().'citizen/home');
        // }
	}


	public function form()
	{
		$this->slice->view('admin.auth.signin');
    }
    
    public function signin()
    {

        $account = Admin::where('username', $this->input->post('username'))->first();

    
        if(!$account){
            $this->session->set_flashdata('message', 'Username not found.');
            redirect(base_url()."super/signin");
        }


        if(password_verify($this->input->post('password'), $account->password) == false){
            $this->session->set_flashdata('message', 'Wrong password.');
            redirect(base_url()."super/signin");
        }


        $user['admin']['data'] = $account->toArray();
		$user['admin']['is_loggin'] = true;
		$user['admin']['agent'] = array(
            'os' => $this->agent->platform(),
            'browser' => $this->agent->browser(),
            'ip' => $this->input->ip_address()
        );
        
        $this->session->set_userdata($user);

        redirect(base_url()."super/dashboard");





    }


	
}