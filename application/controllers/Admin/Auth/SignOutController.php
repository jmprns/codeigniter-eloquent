<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class SignOutController extends CI_Controller {

    public function signout()
    {

        if($_SESSION['admin']['is_loggin'] == false){
            redirect(base_url().'super/signin');
        }

        unset($_SESSION['admin']);
        redirect(base_url().'super/signin');
    }

}