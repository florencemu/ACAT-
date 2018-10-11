<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
	

	/*显示信息*/

	public function index(){
		$this->load->model('students','students');
		$data['stu'] = $this->students->sel(); 
		                        
		$this->load->view('index/student.html',$data);

	}

   
   /* public function stu_add_html(){
    	 $this->load->view('index/stu_add.html');
    }

	/*增加学生*/
/*	public function stu_add(){
		// $this->load->model('students','students');
		// $data['stu'] = $this->students->add();
		
		$stu_id = $this->input->post('stu_id');
		if(empty($stu_id)){
				error('学号不能为空！');
		}
		if(strlen($stu_id)>8){
				error('请输入正确格式的学号！');
		}
		
		$stu = $this->input->post('stu');
		$stu_major = $this->input->post('stu_major');
 		$stu_passwd = md5($this->input->post('stu_passwd'));
 		$stu_sex = $this->input->post('stu_sex');
 		if($stu_sex == '男'){
 			$stu_sex = 0;
 		}else{
 			$stu_sex = 1;
 		}
 		$this->load->model('students', 'students');
		$user = $this->students->add($stu_id,$stu_name,$stu_major,$stu_passwd,$stu_sex);
		if($user){
			success('index/student','添加成功');
		}else{
			error('您的输入有误，请重新输入！');
		}

	}*/


	


	/*删除学生*/
	public function stu_del(){
		$id=$this->input->get('id');
		$this->load->model('students','students');
		$res= $this->students->stu_del($id);
		if($res) 
		success('index/student','删除成功');
		else error("删除失败！");
		
	}

	/*修改前显示学生*/
	public function mod_inf(){

		$this->load->library('session');
		$id=$this->input->get('id');
		$this->load->model('students','students');
		$inf= $this->students->seek_out_id($id);
		$this->session->set_userdata('id',$inf[0]['stu_id']);
		$this->session->set_userdata('name',$inf[0]['stu_name']);
		$this->session->set_userdata('major',$inf[0]['stu_major']);
		$this->load->view('index/stu_mod.html');
	}

	/*修改*/
	public function stu_mod(){
		$this->load->library('session');
        $id=$this->session->userdata('id');
		$this->load->model('students','students');
		$s_id = $this->input->post('id');
		$name  = $this->input->post('name');
		$major = $this->input->post('major');
		$sex = $this->input->post('sex');
		switch ($sex) {
				case '1': $sex= '男';break;
				case '2': $sex= '女';break;
				default: error("请选择性别！");
			}
		$group = $this->input->post('group');
		switch ($group) {
				case '1': $group= '前端';break;
				case '2': $group= '后台';break;
				case '3': $group= '服务端';break;
				case '4':$group= '机器学习';break;
				default: error("请选择方向！");
			}
		$res=$this->students->stu_mod($id,$s_id,$name,$major,$sex,$group);
		if($res) 
		success('index/stu_page/page','修改成功');
		else error("修改失败！");
	}



	/*查找学生*/
	public function stu_sel(){
		$group = $this->input->post('group');
		$sex = $this->input->post('sex');
		$name = $this->input->post('name');
		$this->load->model('students','students');
		if(!($group)&&!($sex)) 
		{
			
			$data['stu'] = $this ->students->seek_out($name);
			
		}
		else if (!($sex)&&$group) 
			{ 	
				switch ($group) {
					case '1': $group= 'PHP';break;
					case '2': $group= '前端';break;
					case '3': $group= 'JAVA';break;
					case '4':$group= 'Python';break;
			    	}

					$data['stu'] = $this ->students ->seek_out_group($group);
				
			}
		else if (!($group)&&($sex) )
			{ 	
				switch ($sex) {
					case '1': $sex= '男';break;
					case '2': $sex= '女';break;
					}  
					$data['stu'] = $this ->students->seek_out_sex($sex);
					
			}
				
		else if ($sex&&$group) 
			{
				switch ($group) {
				case '1': $group= 'PHP';break;
				case '2': $group= '前端';break;
				case '3': $group= 'JAVA';break;
				case '4':$group= 'Python';break;
			    }

				switch ($sex) {
				case '1': $sex= '男';break;
				case '2': $sex= '女';break;
				}
				/*var_dump($group,$sex);die;*/
				$data['stu'] = $this ->students->seek_out_all($group,$sex);
				
			}
			$this->load->view('index/student.html',$data);
	}

	}
