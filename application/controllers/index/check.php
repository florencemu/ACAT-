<?php

ini_set("display_errors", 0);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_WARNING);
header("Content-type:text/html;charset=UTF-8");

defined('BASEPATH') OR exit('No direct script access allowed');



class Check extends CI_Controller {
    /*加载试题*/
	public function index(){
		$this->load->library('session');
		$this->load->model('check_paper','check_paper');
		$inf=$this->check_paper->stu_inf();
		$this->session->set_userdata('name',$inf[0]['stu_name']);
		$this->session->set_userdata('id',$inf[0]['stu_id']);
		$this->session->set_userdata('major',$inf[0]['stu_major']);
		$this->session->set_userdata('group',$inf[0]['stu_group']);
		$id=$this->session->userdata('id');
		$res=$this->check_paper->get_paper($id);
		$s_id=explode('.', $res,-1);

		$length=sizeof($s_id);
		for($i=0;$i<$length;$i++)
		{
			$res1=$this->check_paper->get_title($s_id[$i]);
			$que[$i]=$res1[0]['sub_que'];
			$ans[$i]=$res1[0]['sub_ans']; 
			
		}
		$res1=$this->check_paper->get_ans($id);
		/*var_dump($que);*/
		$s_ans=explode(',', $res1,-1);
		$this->session->set_userdata('que',$que);
		$a=array(ans=>$ans);
		$b=array(s_ans=>$s_ans);
		$test = array("a"=>ans,"b"=>s_ans);
		$result = array();
		for($i=0;$i<count($a[ans]);$i++){
    			foreach($test as $key=>$value){
        			$result[$i][$value] = ${$key}[$value][$i];
    			}
			}
		$data['ans'] = $result;
		/*var_dump($data);*/
		$this->load->view('index/check.html',$data);
	}
/*提交成绩*/
	public function check_ok(){
		$result ='{"APPCount": [{"0":""},{"1":""},{"2":"sxcsc"},{"3":""},{"4":""}]}';
		$a=json_decode($result,TRUE);
		var_dump($a);
		

		//$result=$this->input->post();
		//var_dump($result);
		//$result='{"APPCount":[{"a":"ssss"},{"b":""},{"c":""},{"d":""},{"e":""}]}';
		//$a=json_decode($result,TRUE);
		//var_dump($a);
		//print_r($a);
		
		
	

            		
    }
		
		

	}




