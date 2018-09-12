<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Information extends CI_Controller {
    /*阅卷*/
	public function index(){
		$this->load->view('index/information.html');
	}

	

}