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
		$s_id=explode(',', $res,-1);
		$this->session->set_userdata('s_id',$s_id);

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
		$this->load->library('session');
		$id=$this->session->userdata('id');
		$c_id=$this->session->userdata('user');
		$result=file_get_contents("php://input");
		$a=json_decode($result,TRUE);
		$length=count($a);
		for($i=0,$j=0;$i<$length;$i++,$j++)
		{
			 $b[$j] = $a[$i][$i];
				if(is_numeric($b[$j])==FALSE&&empty($b[$j])==TRUE){ echo "typeFalse";exit;}
		}
		for($k=0;$k<10;$k++)
		{	if(intval($b[$k])>=15)
				{ echo "gradeFalse";exit;}
			$b_sum+=$b[$k];
		}
		for($h=10;$h<15;$h++)
		{	
			
			if(intval($b[$h])>=6)
				{ echo "gradeFalse";exit;}
			$d_sum+=$b[$h];
		}
		$sum=$b_sum+$d_sum;
		$this->load->model('check_paper','check_paper');
		$res=$this->check_paper->grade_sum($id,$b_sum,$d_sum,$sum,$c_id);
		if($res) echo "Success";
			else echo "Error";

		
	

            		
    }
		



}



