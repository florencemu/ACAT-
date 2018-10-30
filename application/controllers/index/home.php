<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);
if($_SERVER['HTTP_REFERER'] == ""){
	error("本系统不允许从地址栏访问!");
exit;

}

class Home extends CI_Controller {
/*考生首页*/
	public function stu_home()
    {
    	$this->load->library('session');
 		$session_inf['inf']=$this->session->userdata('user');
 		if(empty($session_inf)) success('index','登录信息过期，请重新登录！');
		$this->load->view('student/home.html',$session_inf);
	}

/*默认首页显示*/

	public function index()
	{
		/*$a = site_url('index');
		var_dump($a);*/
		$this->load->library('session');
 		$session_inf['inf']=$this->session->userdata('user');
 		if(empty($session_inf)) success('index','登录信息过期，请重新登录！');
 		else $this->load->view('index/home.html',$session_inf); 

	}
// /*登录*/
// 	public function login(){
// 		$this->load->view('index/login.html');
// 	}
	
/*题库管理*/

	public function category(){
		$this->load->view('index/category.html');
	}

/*分数统计*/

	public function grade(){
		$this->load->view('index/grade.html');
	}

/*科目管理*/

	public function subject(){
		$this->load->view('index/subject.html');
	}
	
/*学生管理*/

	public function student(){
		$this->load->view('index/student.html');
	}

/*试题管理*/

	public function test(){
		$this->load->view('index/test.html');
	}

/*注销*/

	// public function exit(){
	 //	$this->load->view('index/login.html');
	 //}
}
