<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Login extends CI_Controller {


    /* 登录 */

  
	public function index()	{
		//载入验证码辅助函数
		$this->load->helper('captcha');
		$speed ='hmjkwkloveeachotherforeverandhappniesseverydayandnight11290908';
		$word = '';
		for($i = 0 ;$i<4;$i++){
			$word .=$speed[mt_rand(0,strlen($speed) -1 )];
		}
		//配置项
		$vals = array(
			'word'=>$word,
			'img_path'=>'./captcha/',
			'img_url'=>base_url() .'/captcha/',
			'img_width'=>80,
			'img_height'=>25,
			'expiration'=>60
			);
		//创建验证码
		$cap = create_captcha($vals);

/*存入session*/
		$this->load->library('session');
			$this->session->set_userdata('cap',$cap['word']);
		$data['captcha'] = $cap['image'];
		$this->load->view('index/login.html',$data);
	}



		public function login_in(){

			$this->load->library('session');
            $cap=$this->session->userdata('cap');
	 		$username = $this->input->post('user_id');
 			$people = $this->input->post('people');
 			$captcha = $this->input->post('captcha');
 			$this->load->model('index', 'index');
//考官登录
//

 			if($cap != $captcha)
 				error("验证码输入有误！");
 			else
 			{

 			if($people==1)
 			{
 				$password = $this->input->post('password');
 				$user = $this->index->login($username);
 	
	 		if($user){
	 			$this->session->set_userdata('user',$username);
 				if($user->ad_passwd == $password){
	

 					success('index/home/index','登录成功');
 				}else{
 					error('用户名或者密码不正确');
 				}	
 			}else{
 				error('用户名或者密码不正确');
 			}
 			}
//学生登录
 			else if($people==2)
 			{
 				$password =md5($this->input->post('password'));
 	
 				$user = $this->index->login_s($username);
 	
	 		if($user){
	 			$this->session->set_userdata('user',$username);
 				if($user->stu_passwd == $password){
 					success('index/home/stu_home','登录成功！');
 				}else{
 					error('用户名或者密码不正确3');
 				}	

 			}else{
 				error('用户名或者密码不正确4');
 			}

 			}
 			else if(!$people) error("请选择身份！");
 	
 		}
}

}