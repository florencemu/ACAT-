<?php
ini_set("display_errors", 0);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');



class Student_grade extends CI_Controller {
    /*成绩查询*/
	public function index(){
		$this->load->library('session');
    	$inf=$this->session->userdata('user');
    	//var_dump($inf);
    	$this->load->model('p_student','p_student');
    	$session_inf['id']=$this->session->userdata('user');
		$res= $this->p_student->grade_sel($inf);
		//var_dump($res);
		if($res)
		{

		//$data = $this->p_student->paper_sel($inf);
		$this->session->set_userdata('b_grade',$res[0]['base_grade']);
		$this->session->set_userdata('d_grade',$res[0]['dir_grade']);
		$this->session->set_userdata('grade',$res[0]['grade']);
		$res1 = $this->p_student->paper_ans($inf);
		$s_id=explode('.', $res1[0]['include_id'],-1);
		$this->session->set_userdata('s_id',$s_id);
		$length=sizeof($s_id);
		for($i=0;$i<$length;$i++)
		{
			$res2=$this->p_student->paper_que($s_id[$i]);
			$que[$i]=$res2[0]['sub_que'];
			$ans[$i]=$res2[0]['sub_ans'];
		}
		//$this->session->set_userdata('show_que',$que);
		$s_ans=explode(',', $res1[0]['stu_ans'],-1);
		$a=array(que=>$que);
		$b=array(s_ans=>$s_ans);
		$test = array("a"=>que,"b"=>s_ans);
		$result = array();
		for($i=0;$i<count($a[que]);$i++){
    			foreach($test as $key=>$value){
        			$result[$i][$value] = ${$key}[$value][$i];
    			}
			}
		$data['res'] = $result;
		//var_dump($data);die;
		$this->load->view('student/grade.html',$data);
	}
	else 
	error("对不起！你还没有成绩，请先参与测试或耐心等待！");
		

	}

	

}