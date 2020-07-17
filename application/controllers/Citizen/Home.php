<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($_SESSION['user']['is_loggin'] == false){
            redirect(base_url().'citizen/signin');
        }
	}


	public function index()
	{
		$travels = Request::where('citizen_id', $_SESSION['user']['data']['citizen_id'])->get();

		$this->slice->view('citizen.home', [
			'travels' => $travels
		]);
	}
}