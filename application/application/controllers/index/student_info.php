<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Student_info extends CI_Controller {
    

/*显示注册信息*/
    public function index()
    {
    	$this->load->library('session');
    	$inf=$this->session->userdata('user');
		$session_inf['id']=$this->session->userdata('user');
		$this->load->model('p_student', 'p_student');
		$data['name']= $this->p_student->inf_sel($inf);
		$this->load->view('student/stu_mod.html',$data);
	}


/*修改信息*/
	public function mod_inf(){
		$id = $this->input->post('userid');
		$name = $this->input->post('username');
		$major = $this->input->post('usermajor');
		$sex = $this->input->post('sex');
		$group = $this->input->post('group');

		switch ($sex) {
				case '1': $sex= '男';break;
				case '0': $sex= '女';break;
				default: error("请选择性别！");
			}

			switch ($group) {
				case '1': $group= '前端';break;
				case '2': $group= 'PHP';break;
				case '3': $group= 'Python';break;
				case '4':$group= 'JAVA';break;
				default: error("请选择方向！");
			}
		/*var_dump($id,$name,$major,$sex,$group);die;*/
		if($id&&$name&&$major&&$sex&&$group)
		{

			$this->load->model('p_student','p_student');
			$result = $this->p_student->inf_mod($id,$name,$major,$sex,$group);
			if($result)
			{	$this->load->library('session');
				$this->session->set_userdata('inf_m',$major);
				$inf=$this->session->userdata('user');
				success('index/home/stu_home','修改成功');
			}
			else
				error("信息修改失败！");
		}
		else error("信息不能为空！");
	}

/*修改密码*/	
	public function  mod_pwd()
	{	
		$this->load->library('session');
    	$inf=$this->session->userdata('user');
		$pwd = $this ->input->post('password');
		$npwd = $this ->input ->post('newpassword');
		$rpwd = $this ->input ->post('repassword');
		$this ->load ->model('p_student','p_student');
		$data['pwd'] = $this ->p_student->check($inf);
	
		if($pwd==$data['pwd'])
		{
			
			if($npwd==$rpwd)
			{
			$result= $this ->p_student->pwd_mod($inf,$npwd);
				if($result)
					success('index','密码修改成功，请重新登录！');
				else error("密码修改失败！");
			}
			else error("两次输入密码不一致！");
		}

		else{
		
		 error ("旧密码输入有误，请检查后重新输入！");}
	}

	

}