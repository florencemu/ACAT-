<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Student_grade extends CI_Controller {
    /*成绩查询*/
	public function index(){
		$this->load->library('session');
    	$inf=$this->session->userdata('user');
		$session_inf['id']=$this->session->userdata('user');
		$this->load->model('p_student', 'p_student');
		$data= $this->p_student->grade_sel($inf);
		$this->session->set_userdata('b_grade',$data[0]['base_grade']);
		$this->session->set_userdata('d_grade',$data[0]['dir_grade']);
		$this->session->set_userdata('grade',$data[0]['grade']);
		if(!$data) error("对不起！你还没有成绩，请先参与测试或耐心等待！");
		else 
		$this->load->view('student/stu_grade.html');
		

	}

	

}