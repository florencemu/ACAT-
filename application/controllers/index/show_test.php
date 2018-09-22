<?php
 ini_set("display_errors", 0);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');



class Show_test extends CI_Controller {
    /*加载试卷*/
	public function index(){
		$id =$this->input->get("id");
		$this->load->model('paper','paper');
		$inf = $this->paper->stu_sel($id);
		$grade = $this->paper->grade_sel($id);
		$this->load->library('session');
		$this->session->set_userdata('name',$inf);
		$this->session->set_userdata('b_grade',$grade[0]['base_grade']);
		$this->session->set_userdata('d_grade',$grade[0]['dir_grade']);
		$res = $this->paper->sel_stu_ans($id);
		$s_id=explode('.', $res[0]['include_id'],-1);

		$length=sizeof($s_id);
		for($i=0;$i<$length;$i++)
		{
			$res1=$this->paper->sel_stu_que($s_id[$i]);
			$que[$i]=$res1[0]['sub_que'];
			$ans[$i]=$res1[0]['sub_ans'];
		}
		$this->session->set_userdata('show_que',$que);

		$s_ans=explode(',', $res[0]['stu_ans'],-1);

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

		$this->load->view('index/show_test.html',$data);



	}

}

