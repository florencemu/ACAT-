<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);
if($_SERVER['HTTP_REFERER'] == ""){
    error("本系统不允许从地址栏访问!");
exit;

}



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
		//$this->load->view('index/1.html');
	}

	public function sub_add(){

		$sub_que = $this->input->post('question');
		$sub_ans = $this->input->post('answer');
		/*	var_dump($sub_que);
		var_dump($sub_ans);*/

		if(empty($sub_que&&$sub_ans)){
				error('题目和答案不可为空！');
		}
		
		$sub_type = $this->input->post('sub_type');
		switch ($sub_type) {
			case '1':$sub_type = '基础题';break;
			case '2':$sub_type = '前端';break;
			case '3':$sub_type = '后台';break;
			case '4':$sub_type = '服务端';break;
			case '5':$sub_type = '机器学习';break;
		}
		$sub_que = $sub_type.":".$sub_que ;
		$sub_diff = $this->input->post('sub_diff');
 	
 	
 		$this->load->model('subjects', 'subjects');
		$result = $this->subjects->sub_add($sub_type,$sub_diff,$sub_que,$sub_ans);
		//var_dump($result);
		if($result){
			//$id=$result[0]['LAST_INSERT_ID()'];
			//$json_string = file_get_contents("http://localhost/CI_test/ueditor/php/config.json");
			//var_dump($json_string);// 从文件中读取数据到PHP变量
		    //$data=explode(',',$json_string);
		    //$data[13]='"imagePathFormat":"/sub_image/$id"';    
		    //$json_strings = implode(",",$data);
		  /*  var_dump($json_strings);*/
		    //file_put_contents("http://localhost/CI_test/ueditor/php/config.json",$json_strings);//写入*/
			success('index/sub_page/page','添加试题成功');
		}else{
			error('您的输入有误，请重新输入！');
		}
		
	}

	/*查找试题*/
	public function sub_sel(){
		$type = $this->input->get('type');
		$diff = $this->input->get('diff');
		$this->load->model('subjects','subjects');
		if(!($type)&&!($diff)) error("请选择你要查询的信息！");

		else if (!($diff)&&$type) 
			{ 	
				switch ($type) {
					case '1': $type= '基础题';break;
					case '2': $type= '前端';break;
					case '3': $type= '后台';break;
					case '4': $type= '服务端';break;
					case '5':$type= '机器学习';break;
			    	}
					$data['sub'] = $this ->subjects ->seek_out_type($type);
			}
		else if (!($type)&&($diff) )
					
					$data['sub'] = $this ->subjects->seek_out_diff($diff);
		else if ($diff&&$type) 
			{
				switch ($type) {
					case '1': $type= '基础题';break;
					case '2': $type= '前端';break;
					case '3': $type= '后台';break;
					case '4': $type= '服务端';break;
					case '5':$type= '机器学习';break;
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
		$que  = $this->input->post('question');
		$ans = $this->input->post('answer');
		$diff  = $this->input->post('sub_diff');
		if(!$diff) error("请选择试题难度！");
		$type = $this->input->post('sub_type');
		switch ($type) {
					case '1': $type= '基础题';break;
					case '2': $type= '前端';break;
					case '3': $type= '后台';break;
					case '4': $type= '服务端';break;
					case '5':$type= '机器学习';break;
					default:error("请选择试题类型！");
			    }
		$res=$this->subjects->sub_mod($id,$que,$ans,$diff,$type);
		if($res) {
			//$json_string = file_get_contents("http://localhost/CI_test/ueditor/php/config.json");
			//var_dump($json_string);// 从文件中读取数据到PHP变量
		    //$data=explode(',',$json_string);
		   // $data[13]='"imagePathFormat":"/sub_image/$id"';    
		   // $json_strings = implode(",",$data);
		  /*  var_dump($json_strings);*/
		   // $d=file_put_contents("http://localhost/CI_test/ueditor/php/config.json",$json_strings);
		   // var_dump($d);//写入*/
			success('index/sub_page/page','修改成功');

		}
		else error("修改失败！");
	}

	/*删除试题*/
	public function sub_del(){
		$id=$this->input->get('id');
		$this->load->model('subjects','subjects');
		$res= $this->subjects->sub_del($id);
		if($res)
		success('index/sub_page/page','删除成功');
		else error("删除失败！");
	}
}
	
