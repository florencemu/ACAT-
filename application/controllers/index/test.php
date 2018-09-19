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


	/*我的试卷*/
	public function my_test(){
		$this->load->library('session');
 		$admin=$this->session->userdata('user');
		$this->load->model('paper','paper');
		$data['test'] = $this->paper->my_test($admin);
		$this->load->view('index/my_test.html',$data);
	}

	/*查看试卷*/
	public function show_paper(){
		$id=$this->input->get('id');
		$this->load->model('paper','paper');
		$res = $this->paper->admin_show($id);
		$s_id=explode('.', $res[0]['include_id'],-1);
		$length=sizeof($s_id);
		for($i=0;$i<$length;$i++)
		{
			$res1=$this->paper->admin_show_test($s_id[$i]);
			$res2[$i]=$res1;
		}
		$data['test']=$res2;
		/*var_dump($res2);die;*/
		$this->load->view('index/admin_show.html',$data);
	}

	/*删除试卷*/
		public function del_paper(){
		$id=$this->input->get('id');
		$this->load->model('paper','paper');
		$res = $this->paper->del_paper($id);
		if($res) success('index/test/my_test','删除成功');
		else error("删除失败");
	}

		/*添加试题页*/


	public function test_add_html(){
		
		$this->load->library('session');
 		$admin=$this->session->userdata('user');
 		$this->load->model('paper','paper');
		$res = $this->paper->sel_admin($admin);
		$type =$this->session->set_userdata('type',$res);
		/*var_dump($type);*/
		$this->load->view('index/test_add.html');

	}
	public function test_add_b(){
		$this->load->library('session');
 		$admin=$this->session->userdata('user');
 		$this->load->model('paper','paper');
		$res = $this->paper->sel_admin($admin);
		$type =$this->session->set_userdata('type',$res);
		/*for($i=0;)
		$data['id'] = */
		$id = $this->input->get('id').'.';
		$b_id  =$this->session->set_userdata('b_id',$id);
		if($id) success('index/test_page/b_page','添加成功');

	}

	public function test_add_d(){
		$this->load->library('session');
 		$admin=$this->session->userdata('user');
 		$this->load->model('paper','paper');
		$res = $this->paper->sel_admin($admin);
		$type =$this->session->set_userdata('type',$res);
		$data['d_id'] = $this->input->get('id');
		/*$this->load->model('paper','paper');
		$data['sub'] = $this->paper->inf_b();*/
		if($data)/* success('index/test_page/d_page','添加成功');*/
		$this->load->view('index/test_add.html',$data);

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
	public function seek_out_type_num(){
		$type=$this->input->post('type');
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