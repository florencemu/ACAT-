<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*试卷管理*/
class Test extends CI_Controller {
	/*试卷主页*/
	public function index(){
		
		$this->load->model('paper','paper');
		$data['test'] = $this->paper->test_inf();
		$this->load->view('index/test.html',$data);
	}

		/*添加试题页*/
	public function test_add_html(){
		$this->load->view('index/test_add.html');

	}
	public function test_add_b(){
		$this->load->model('paper','paper');
		$data['sub'] = $this->paper->inf_b();
		$this->load->view('index/test_add_b.html',$data);

	}

	public function test_add_d(){
		$this->load->model('paper','paper');
		$data['sub'] = $this->paper->inf_d();
		$this->load->view('index/test_add_d.html',$data);

	}
		/*查找题目*/
	public function test_add_sel(){
		$type = $this->input->post('type');
		$diff = $this->input->post('diff');
		$this->load->model('paper','paper');
		if(!($type)&&!($diff)) error("请选择你要查询的信息！");

		else if (!($diff)&&$type) 
			{ 	
				switch ($type) {
					case '1': $type= 'PHP';break;
					case '2': $type= '前端';break;
					case '3': $type= 'JAVA';break;
					case '4':$type= 'Python';break;
			    	}
					$data['sub'] = $this ->paper ->d_sel($type);
					$this->load->view('index/test_add_d.html',$data);

			}
		else if (!($type)&&($diff) ){
					
					$data['sub'] = $this ->paper->b_sel($diff);
					$this->load->view('index/test_add_b.html',$data);
				}
		else if ($diff&&$type) 
			{
				switch ($type) {
				
					case '1': $type= 'PHP';break;
					case '2': $type= '前端';break;
					case '3': $type= 'JAVA';break;
					case '4':$type= 'Python';break;
			    }
				$data['sub'] = $this ->paper->all_sel($type,$diff);

				$this->load->view('index/test_add_d.html',$data);
			}

	}

		/*查找试卷*/
	public function test_sel(){
		$id=$this->input->post('test_id');
		$this->load->model('paper','paper');
		$data['test']= $this->paper->test_sel($id);
		$this->load->view('index/test.html',$data);
	}

		/*修改试卷*/
	public function test_mod(){
		$this->load->view('index/test_corr.html');
	}

		/*删除试卷*/
	public function test_del(){
		$this->load->view('index/test_del.html');
	}



}