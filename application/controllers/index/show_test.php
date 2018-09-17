<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Show_test extends CI_Controller {
    /*加载试卷*/
	public function index(){
		$id =$this->input->get("id");
		$this->load->model('paper','paper');
		$inf = $this->paper->stu_sel($id);
		$this->load->library('session');
		$this->session->set_userdata('name',$inf);
		/*$data['paper'] = $this->paper->stu_sel_paper($id);*/
		$this->load->view('index/show_test.html'/*,$data*/);



	}

}

