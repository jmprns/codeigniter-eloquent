<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Utility Helpers for File Management System of Provincial Government of Aurora
 *
 *  @package		CodeIgniter
 *	@subpackage		Utility Helper
 *	@category		Helpers
 *	@author			JMPRNS@github
 *	@link			https://github.com/jmprns/fms
  */



// ------------------------------------------------------------------------
if ( ! function_exists('asset_url'))
{
	/**
     * Return the path url of the assets file
     * @param string 
     * @return string
     */
    function asset_url(){
        return base_url().'assets/';
    }
}
// ------------------------------------------------------------------------

// ------------------------------------------------------------------------
if ( ! function_exists('database_url'))
{
	/**
     * Return the path url of the database folder
     * @param string 
     * @return string
     */
    function database_url(){
        return APPPATH."database/";
    }
}
// ------------------------------------------------------------------------


/**
 * Return the path url of the vendor files
 * @param string 
 * @return string
 */
function vendor_url(){
	return base_url().'assets/plugins/';
}



function generate_token($length = 12){
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet);

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[random_int(0, $max-1)];
    }

    return $token;
}


function citizen_travel_status_helper($int)
{
    switch($int){

        case "1": 
            $status = '<span class="badge badge-secondary">PENDING</span>';
        break;

        case "2": 
            $status = '<span class="badge badge-success">APPROVED</span>';
        break;

        case "3": 
            $status = '<span class="badge badge-danger">DISAPPROVED</span>';
        break;

        case "4": 
            $status = '<span class="badge badge-warning">RETURNED</span>';
        break;

        case "5": 
            $status = '<span class="badge badge-primary">QUARANTINE</span>';
        break;

        case "6": 
            $status = '<span class="badge badge-success">FINISHED</span>';
        break;

        default: 
        break;
    }

    return $status;
}



/**
 * 404 Helper
 * @param string
 * @return function
 */
function helper_404($int)
{
    if(!$int){
        show_404();
    }
}


/**
 * Name Helper
 * @param array
 * @return string
 */
function name_helper($object, $arrangement = 'LFMI'){

    
    switch($arrangement){

        case 'LFMI':
            // checking if fname is available
            if($object['mname'] != ''){
                $name = $object['lname'].", ".$object['fname']." ".$object['mname'][0].".";
            }else{
                $name = $object['lname'].", ".$object['fname'];
            }

        break;

        case 'LFM':
            // checking if fname is available
            if($object['mname'] != ''){
                $name = $object['lname'].", ".$object['fname']." ".$object['mname'];
            }else{
                $name = $object['lname'].", ".$object['fname'];
            }
        break;

        case 'FMIL':  
            // checking if fname is available
            if($object['mname'] != ''){
                $name = $object['fname']." ".$object['mname'][0].". ".$object['lname'];
            }else{
                $name = $object['fname']." ".$object['lname'];
            }
        break;

        case 'FL': 
            $name = $object['fname']." ".$object['lname'];
        break;
    
        case 'FMNL':  
            // checking if fname is available
            if($object['mname'] != ''){
                $name = $object['fname']." ".$object['mname']." ".$object['lname'];
            }else{
                $name = $object['fname']." ".$object['lname'];
            }
        break;
        default:
            // checking if fname is available
            if($object['mname'] != ''){
                $name = $object['lname'].", ".$object['fname']." ".$object['mname'][0].".";
            }else{
                $name = $object['lname'].", ".$object['fname'];
            }
        break;

    }

    return $name;

}

