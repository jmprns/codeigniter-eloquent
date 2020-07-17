<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TravelController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($_SESSION['user']['is_loggin'] == false){
            redirect(base_url().'citizen/signin');
        }
	}


	public function create()
	{
		$this->slice->view('citizen.travel.create');
	}

	public function store()
	{


		$response = array(
			"code" => 200
		);


		// checking if other checkbox is checked specify the reason
		if(in_array('others', $this->input->post('purpose'))){
			if($this->input->post('purpose-other') == ''){
				$response['title'] = 'Incomplete form.';
				$response['message'] = 'Please specify your purpose travel.';
				$response['code'] = 406;
			}
		}

		if($response['code'] == 406){
			return $this->output
            ->set_content_type('application/json')
            ->set_status_header(406)
            ->set_output(json_encode($response));
		}


		// manipulating purpose of travel
		if($this->input->post('purpose-other') == ''){
			$purposes = array();
			$purposes['type'] = 'many';
			$purposes['data'] = array();

			foreach($this->input->post('purpose') as $purpose){
				array_push($purposes['data'], $purpose);
			}
		}else{
			$purposes = array();
			$purposes['type'] = 'other';
			$purposes['data'] = array();

			array_push($purposes['data'], $this->input->post('purpose-other'));
		}

		$illness = array();
		if(array_key_exists('illness', $this->input->post())){
			foreach($this->input->post('illness') as $ill){
				array_push($illness, $ill);
			}
		}


		$travel = Request::create([
			"citizen_id" => $_SESSION['user']['data']['citizen_id'],
			"vehicle_type" => $this->input->post('vehicle-type'),
			"plate_no" => $this->input->post('plate-number'),
			"purpose" => json_encode($purposes),
			"destination" => $this->input->post('destination'),
			"port_of_origin" => $this->input->post('port-origin'),
			"details_of_city_from" => $this->input->post('details-city-from'),
			"contact_person" => $this->input->post('contact_person'),
			"contact_person_no" => $this->input->post('contact_person_no'),
			"symptoms" => json_encode($illness),
			"expected_arrival" => $this->input->post('date-expect'),
			"status" => "1",
			"remarks" => "Please upload your documents to verify this request."
		]);

		$response['title'] = 'Almost done.';
		$response['message'] = 'Your request has been submitted. Please prepaire your documents for uploading in the next page.';
		$response['data']['travel_id'] = $travel->request_id;

		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($response));
	}

	public function show($id)
	{
		$travel = Request::with('attachments')->where('request_id', $id)->where('citizen_id', $_SESSION['user']['data']['citizen_id'])->first();

		helper_404($travel);

		if($travel->attachments->count() == 0){
            $this->session->set_flashdata('warning', 'Please upload your documents to verify this request.');
		}

		$this->slice->view('citizen.travel.show', [
			'travel' => $travel
		]);
	}
}