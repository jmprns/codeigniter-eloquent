<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class SignOutController extends CI_Controller {

    public function signout()
    {

        if($_SESSION['user']['is_loggin'] == false){
            redirect(base_url().'citizen/signin');
        }

        unset($_SESSION['user']);
        redirect(base_url().'citizen/signin');
    }

}