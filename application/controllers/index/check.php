<?php

 ini_set("display_errors", 0);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_WARNING);

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
/*加载答案*/
	/*public function show_ans(){
		$this->load->library('session');
		$this->load->model('check_paper','check_paper');
		$id=$this->session->userdata('id');
		$res=$this->check_paper->get_paper($id);
		$s_id=explode('.', $res,-1);
		$length=sizeof($s_id);
		for($i=0;$i<$length;$i++)
		{
			$res1=$this->check_paper->get_title($s_id[$i]);
			
			$ans[$i] = $res1[0]['sub_ans'];
		}
		$res1=$this->check_paper->get_ans($id);
		$s_ans=explode(',', $res1,-1);
		$ans = New ArrayObject($ans);
		$s_ans = New ArrayObject($s_ans);
		$sub_ans = json_encode($ans,JSON_UNESCAPED_UNICODE);
		$stu_ans = json_encode($s_ans,JSON_UNESCAPED_UNICODE);
		echo $sub_ans;
		echo $stu_ans;
            		
    }*/
		
		

	}




