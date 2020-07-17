<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        
        if(@$_SESSION['admin']['is_loggin'] == false){
            redirect(base_url().'super/signin');
        }
	}


    public function index()
    {
        $requests = Request::all();
        $citizens = Citizen::all();

        $stats['widget']['pending'] = $requests->where('status', "1")->count();
        $stats['widget']['quarantine'] = $requests->where('status', "5")->count();
        $stats['widget']['user_pending'] = $citizens->where('status', "0")->count();
        $stats['widget']['user_approved'] = $citizens->where('status', "1")->count();

        $this->slice->view('admin.dashboard', [
            "stats" => $stats
        ]);
    }


	
}