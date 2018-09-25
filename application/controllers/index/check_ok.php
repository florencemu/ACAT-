<?php

ini_set("display_errors", 0);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_WARNING);
header("Content-type:application/json;charset=UTF-8");

defined('BASEPATH') OR exit('No direct script access allowed');



class Check_ok extends CI_Controller {
    /*加载试题*/
		public function index(){
		$result =$this->input->post();
		var_dump($result);
		$a=json_decode($result,TRUE);
		var_dump($a);
		

		
		
	

            		
    }
		
		

	}




