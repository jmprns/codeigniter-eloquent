<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RequestController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        
        if(@$_SESSION['admin']['is_loggin'] == false){
            redirect(base_url().'super/signin');
        }
	}


    public function index($type)
    {

        switch($type){
            case 'all':
                $requests = Request::with('citizen')->get();
                $type = 'All Requests';
            break;
            case 'pending': 
                $requests = Request::with('citizen')->where('status', '1')->get();
                $type = 'Pending Requests';
            break;
            case 'approved': 
                $requests = Request::with('citizen')->where('status', '2')->get();
                $type = 'Approved Requests';
            break;
            case 'disapproved': 
                $requests = Request::with('citizen')->where('status', '3')->get();
                $type = 'Disapproved Requests';
            break;
            case 'returned': 
                $requests = Request::with('citizen')->where('status', '4')->get();
                $type = 'Returned Requests';
            break;
            case 'quarantine': 
                $requests = Request::with('citizen')->where('status', '5')->get();
                $type = 'Quarantined';
            break;
            case 'finished': 
                $requests = Request::with('citizen')->where('status', '6')->get();
                $type = 'Finised Requests';
            break;
            default:
                $requests = null;
                $type = 'UNDEFINED';
            break;
        }

        $this->slice->view('admin.request.index', [
            'requests' => $requests,
            'type' => $type
        ]);
        
    }

    public function show($id)
    {
        $request = Request::with('attachments', 'citizen')->where('request_id', $id)->first();
        return $this->slice->view('admin.request.show', [
            'request' => $request
        ]);
    }

    public function mark($id)
    {
        $request = Request::find($id);
        $request->status = $this->input->post('action');
        $request->remarks = $this->input->post('remarks');
        $request->save();

        $this->session->set_flashdata('success', 'Remarks updated.');

        return redirect(base_url()."super/request/".$id."/show");
    }


	
}