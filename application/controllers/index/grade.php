<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Grade extends CI_Controller {
	/*成绩查询*/

	public function index(){
		$this->load->model('grades','grades');
		$data['grades'] = $this->grades->grade_inf();
		/*var_dump($data);*/
		$this->load->view('index/grade.html',$data);
	}

	/*成绩查询*/
	public function sel(){
		$major = $this->input->post('major');
		$type  = $this->input->post('type');
		$name = $this->input->post('name');
		$this->load->model('grades','grades');
		if(!($name)&&!($major)) 
		{	
			switch ($type) {
					case '1': $type= 'PHP';break;
					case '2': $type= '前端';break;
					case '3': $type= 'JAVA';break;
					case '4':$type= 'Python';break;
			    	}
				$data['grades'] = $this ->grades ->seek_out_type($type);
				foreach($data as $row)
				{	if(!($row)) success('index/grade','所查找的方向还没有学生有成绩！');
				}
				
		}
		else if(!($type)&&!($major)) 
		{	
			$data['grades'] = $this ->grades->seek_out_name($name);
				foreach($data as $row)
				{	if(!($row)) success('index/grade','所查找的学生还没有成绩！');
				}
		}
		else if(!($name)&&!($type)) 
		{

				$data['grades'] = $this ->grades ->seek_out_major($major);
				foreach($data as $row)
				{	if(!($row)) success('index/grade','所查找的班级还没有学生有成绩！');
				}

		}		
		else if ($major&&$type) 
			{
				switch ($type) {
				case '1': $type= 'PHP';break;
				case '2': $type= '前端';break;
				case '3': $type= 'JAVA';break;
				case '4':$type= 'Python';break;
			    }
				$data['grades'] = $this ->grades->seek_out_all($type,$major);
				foreach ($data as $row) {
					if(!($row)) success('index/grade','所查找的方向或班级还没有学生有成绩！');
				}
			}

		if($data) $this->load->view('index/grade.html',$data);
		
	}
	/*异常试卷过滤*/
	/*public function choose_False(){
		$this->load->model('grades','grades');
		$data['grades'] = $this->grades->choose_f_Paper();
		//var_dump($data);
		$this->load->view('index/grade.html',$data);
	}*/


	/*删除异常试卷*/
	public function del_False(){
		$id=$this->input->get("id");
		$this->load->model('grades','grades');
		$res= $this->grades->del_f_Paper($id);
		if($res) success('index/gra_page/page','删除成功！');
		else error("删除失败");

	}



}