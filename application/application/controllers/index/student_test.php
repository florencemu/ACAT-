<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Student_test extends CI_Controller {
    
	/*public function index(){
		$this->load->view('student/stu_test.html');
	}
*/

	/*考试注意事项*/
	public function inf()
	{
		$this->load->view('student/test_inf.html');
	}

	/*加载答卷*/
	public function test(){
 		$this->load->library('session');
        $id=$this->session->userdata('user');
		$this->load->model('p_student','p_student');
		$paper['inf']=$this->p_student->stu_test($id);
		$p_id=$paper['inf'][0]['paper_id'];
		$res=$this->p_student->get_sub($p_id);
		$s_id=explode('.', $res,-1);
		$length=sizeof($s_id);
		for($i=0;$i<$length;$i++)
		{
			$res1=$this->p_student->create($s_id[$i]);
			$res2[$i]=$res1;
		}
		$data['test']=$res2;
		$this->load->view('student/stu_test.html',$data);
		

	}
	/*提交答案*/
	public function stu_ans(){
		$ans=$this->input->post('answer');
		var_dump($ans);


	}

}