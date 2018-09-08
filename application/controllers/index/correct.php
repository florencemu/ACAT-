<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Correct extends CI_Controller {
    /*加载试卷*/
	public function index(){
		/*$this->load->library('session');
		$this->load->model('correct_s','correct_s');
		$inf=$this->correct_s->stu_inf();
		$this->session->set_userdata('name',$inf[0]['stu_name']);
		$this->session->set_userdata('id',$inf[0]['stu_id']);
		$this->session->set_userdata('major',$inf[0]['stu_major']);
		$this->session->set_userdata('group',$inf[0]['stu_group']);
		$id=$this->session->userdata('id');
		$res=$this->correct_s->get_paper($id);
		$s_id=explode('.', $res,-1);
		$length=sizeof($s_id);
		for($i=0;$i<$length;$i++)
		{
			$res1=$this->correct_s->get_title($s_id[$i]);
			$res2[$i]=$res1;
		}
		$res1=$this->correct_s->get_ans($id);
		$s_ans=explode(',', $res1,-1);
		$length1=sizeof($s_ans);
		for($j=0,$k=0;$j<$length1&&$k<$length;$j++,$k++)
		{
			$res3[$k][]=$res2[$k];
			$res3[][$j]=$s_ans[$j];
		}
		$data['test']=$res3;
		var_dump($data);*/
		$this->load->view('index/correct.html',$data);
	}
	public function show(){
		/*$this->load->library('session');
		$this->load->model('correct_s','correct_s');
		$inf=$this->correct_s->stu_inf();
		$this->session->set_userdata('name',$inf[0]['stu_name']);
		$this->session->set_userdata('id',$inf[0]['stu_id']);
		$this->session->set_userdata('major',$inf[0]['stu_major']);
		$this->session->set_userdata('group',$inf[0]['stu_group']);
		$id=$this->session->userdata('id');
		$res=$this->correct_s->get_paper($id);
		$s_id=explode('.', $res,-1);
		$length=sizeof($s_id);
		for($i=0;$i<$length;$i++)
		{
			$res1=$this->correct_s->get_title($s_id[$i]);
			$res2[$i]=$res1;
		}
		$res1=$this->correct_s->get_ans($id);
		$s_ans=explode(',', $res1,-1);
		$length1=sizeof($s_ans);
		for($j=0,$k=0;$j<$length1&&$k<$length;$j++,$k++)
		{
			$res3[$k][]=$res2[$k];
			$res3[][$j]=$s_ans[$j];
		}
		$data['test']=$res3;
		var_dump($data);*/
		$this->load->view('index/correct.html',$data);
	}

/*完成批阅*/


}
