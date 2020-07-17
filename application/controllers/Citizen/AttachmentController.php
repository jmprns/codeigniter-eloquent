<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttachmentController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($_SESSION['user']['is_loggin'] == false){
            redirect(base_url().'citizen/signin');
        }
    }
    
    public function upload($id)
    {
        // var_dump($_FILES);
        // die;

        $config = array(
            'upload_path'   => './uploads/attachments/',
            'allowed_types' => 'jpg|png|jpeg|pdf',
            'overwrite'     => 1,            
            'file_name'     => time().generate_token()
        );
    
        $this->load->library('upload', $config);
    
        if($this->upload->do_upload('file')) {
            $uploaded_data = array('upload_data' => $this->upload->data());
        
        }else{
            $this->session->set_flashdata('error', 'Upload error. Please check your files and try again.');
        }

        Attachment::create([
            "request_id" => $id,
            "name" => $this->input->post('name'),
            "url" => $config['file_name'].$uploaded_data['upload_data']['file_ext']
        ]);

        redirect(base_url().'citizen/travel/'.$id.'/show');
        return;
        

    }



	
}