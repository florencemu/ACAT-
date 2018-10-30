<?php
defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting(E_ALL ^ E_NOTICE);
if($_SERVER['HTTP_REFERER'] == ""){
    error("本系统不允许从地址栏访问!");
exit;

}

class Information extends CI_Controller {
    /*阅卷*/
	public function index(){
		$this->load->view('index/information.html');
	}
	public function change_pwd(){
		$this->load->library('session');
    	$inf=$this->session->userdata('user');
		$pwd = $this ->input->post('password');
		$npwd = $this ->input ->post('newpassword');
		$rpwd = $this ->input ->post('repassword');
		$this ->load ->model('index','index');
		$data['pwd'] = $this ->index->admin_check($inf);
	
		if($pwd==$data['pwd'])
		{
			
			if($npwd==$rpwd)
			{
			$result= $this ->index->admin_pwd_mod($inf,$npwd);
				if($result)
					success('index','密码修改成功，请重新登录！');
				else error("密码修改失败！");
			}
			else error("两次输入密码不一致！");
		}

		else{
		
		 error ("旧密码输入有误，请检查后重新输入！");
	}



	}



	

}