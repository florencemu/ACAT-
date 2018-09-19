<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Show_test extends CI_Controller {
    /*加载试卷*/
	public function index(){
		$id =$this->input->get("id");
		$this->load->model('paper','paper');
		$inf = $this->paper->stu_sel($id);
		$this->load->library('session');
		$this->session->set_userdata('name',$inf);
		$res = $this->paper->sel_stu_ans($id);
		$s_id=explode('.', $res[0]['include_id'],-1);
		$length=sizeof($s_id);
		for($i=0;$i<$length;$i++)
		{
			$res1=$this->paper->sel_stu_que($s_id[$i]);
			$res2[$i]=$res1;
		}
		$data['test']=$res2;
		$s_ans=explode(',', $res[0]['stu_ans'],-1);
		$this->load->view('index/show_test.html',$data);



	}

}

