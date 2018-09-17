<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Regist extends CI_Controller{
		/* 注册 */	
		public function index(){
			
			$this->load->view('index/regist.html');
		}
		public function register(){
			$user_name = $this->input->post('user_name');
			$user_id = $this->input->post('user_id');
			//$password = $this->input->post('password');
 			//$repassword = $this->input->post('password1');
 			$password = md5($this->input->post('password'));
 			$repassword = md5($this->input->post('password1'));
 			if(empty($password)) error("请输入密码！");
 			if(empty($repassword)) error("请确认密码！");
 			if(empty($user_name)) error("请输入用户名！");
 			if(empty($user_id)) error("请输入学号！");
 	
 			if($password == $repassword)
 			{
 				$this->load->model('index', 'index');
 			$user1= $this->index->s_id($user_id);
 
 			if($user1 == NULL){
 				$user[] = $this->index->regist($user_name,$user_id,$password);
 				if(isset($user)){
 					success('index','注册成功，请尽快登录并完善相关信息！');
 				}else{
 					error('您的输入有误，请重新输入');
	 			}
 			}else{
 				error('该学号已被注册，请检查后重新输入！');
 				
 			}
 			}
 			else error("两次输入密码不一致！");
 			
 			
 			
		}


}