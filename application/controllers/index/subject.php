<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Subject extends CI_Controller {
	/*试题主页*/
	public function index(){

		$this->load->model('subjects','subjects');
		$data['sub'] = $this->subjects->sub_inf();
		$this->load->view('index/subject.html',$data);
	}
	
	/*添加试题页*/
	public function sub_add_html(){
		$this->load->view('index/sub_add.html');
	}

	public function sub_add(){

		$sub_que = $this->input->post('sub_que');
		$sub_ans = $this->input->post('sub_ans');
		if(empty($sub_que&&$sub_ans)){
				error('题目和答案不可为空！');
		}
		
		$sub_type = $this->input->post('sub_type');
		switch ($sub_type) {
			case '1':$sub_type = '基础题';break;
			case '2':$sub_type = 'PHP';break;
			case '3':$sub_type = '前端';break;
			case '4':$sub_type = 'JAVA';break;
			case '5':$sub_type = 'Python';break;
		}
		$sub_que = $sub_type.":".$sub_que ;
		$sub_diff = $this->input->post('sub_diff');
 	
 	
 		$this->load->model('subjects', 'subjects');
		$result = $this->subjects->sub_add($sub_type,$sub_diff,$sub_que,$sub_ans);
		if($result){
			success('index/subject','添加试题成功');
		}else{
			error('您的输入有误，请重新输入！');
		}
	}

	/*查找试题*/
	public function sub_sel(){
		$type = $this->input->post('type');
		$diff = $this->input->post('diff');
		$this->load->model('subjects','subjects');
		if(!($type)&&!($diff)) error("请选择你要查询的信息！");

		else if (!($diff)&&$type) 
			{ 	
				switch ($type) {
					case '1': $type= '基础题';break;
					case '2': $type= 'PHP';break;
					case '3': $type= '前端';break;
					case '4': $type= 'JAVA';break;
					case '5':$type= 'Python';break;
			    	}
					$data['sub'] = $this ->subjects ->seek_out_type($type);
			}
		else if (!($type)&&($diff) )
					
					$data['sub'] = $this ->subjects->seek_out_diff($diff);
		else if ($diff&&$type) 
			{
				switch ($type) {
					case '1': $type= '基础题';break;
					case '2': $type= 'PHP';break;
					case '3': $type= '前端';break;
					case '4': $type= 'JAVA';break;
					case '5':$type= 'Python';break;
			    }
				$data['sub'] = $this ->subjects->seek_out_all($type,$diff);
			}
		$this->load->view('index/subject.html',$data);
	}




	
	/*修改前显示试题*/
	public function mod_que(){

		$this->load->library('session');
		$id=$this->input->get('id');
		$this->load->model('subjects','subjects');
		$inf= $this->subjects->seek_out_id($id);
		$this->session->set_userdata('id',$inf[0]['sub_id']);
		$this->session->set_userdata('que',$inf[0]['sub_que']);
		$this->session->set_userdata('ans',$inf[0]['sub_ans']);
		$this->load->view('index/sub_mod.html');
	}

	/*修改*/
	public function sub_mod(){
		$this->load->library('session');
        $id=$this->session->userdata('id');
		$this->load->model('subjects','subjects');
		$s_id = $this->input->post('id');
		$que  = $this->input->post('question');
		$ans = $this->input->post('answer');
		$diff  = $this->input->post('sub_diff');
		if(!$diff) error("请选择试题难度！");
		$type = $this->input->post('sub_type');
		switch ($type) {
					case '1': $type= '基础题';break;
					case '2': $type= 'PHP';break;
					case '3': $type= '前端';break;
					case '4': $type= 'JAVA';break;
					case '5':$type= 'Python';break;
					default:error("请选择试题类型！");
			    }
		$res=$this->subjects->sub_mod($id,$s_id,$que,$ans,$diff,$type);
		if($res) 
		success('index/subject','修改成功');
		else error("修改失败！");
	}

	/*删除试题*/
	public function sub_del(){
		$id=$this->input->get('id');
		$this->load->model('subjects','subjects');
		$res= $this->subjects->sub_del($id);
		if($res)
		success('index/subject','删除成功');
		else error("删除失败！");
	}
}
	
