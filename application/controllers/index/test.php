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

/*基础题显示*/
	public function base_add(){
		$this->load->model("paper","paper");
       /* $this->load->library('session');*/
        $data['sub'] = $this ->paper ->inf_b();
       /* var_dump($data);die;*/
        $b=json_encode($data,JSON_UNESCAPED_UNICODE);
		$this->load->view('index/test_add_b.html',$data);    
	}

/*方向题显示*/
	public function dir_add(){
		$this->load->model("paper","paper");
        $this->load->library('session');
        $type = $this->session->userdata('type');
        $data['sub'] = $this ->paper ->inf_d($type);
        /*var_dump($data);die;*/
        $b=json_encode($data,JSON_UNESCAPED_UNICODE);
		$this->load->view('index/test_add_d.html',$data);    

	}


	/*查找基础题*/
	public function sel_b(){
		$result= file_get_contents("php://input");
		$diff=json_decode($result,TRUE);
		
		//echo $diff['num'];
		$this->load->model('paper','paper');
		if(!($diff)) error("请选择你要查询的试题难度！");
		else {
					
					$data['sub'] =$this->paper->b_sel($diff['num']);
					$b=json_encode($data,JSON_UNESCAPED_UNICODE);

					echo $b;
			}
	}


/*查找方向题*/
	public function sel_d(){
		$this->load->library('session');
        $type = $this->session->userdata('type');
        //$result = $this->input->post();
		$result= file_get_contents("php://input");
		$a=json_decode($result,TRUE);
		$diff=$a['num'];
		$this->load->model('paper','paper');
		if(!($diff)) error("请选择你要查询的试题难度！");
		else{
					
					$data['sub'] = $this ->paper->d_sel($type,$diff);
					$b=json_encode($data,JSON_UNESCAPED_UNICODE);
					/*$this->load->view('index/test_add_d.html',$data);*/
					echo $b;
				}
	}

/*选择试题*/
public function add_sub(){
	if($result= file_get_contents("php://input")){
	$a=json_decode($result,TRUE);
	echo $a['num'];}
	else echo"-1";
}




/*取消选择*/
/*public function change_add(){
	if($result= file_get_contents("php://input")){
	$a=json_decode($result,TRUE);
	echo "0";}
	else echo"-1";
}*/

/*确认基础题*/

	public function add_b(){
		$result= file_get_contents("php://input");
		$a=json_decode($result,TRUE);
		$a=$a['questions'];
		$data=implode(',', $a);
		$b_sub=$data.',';
		$this->load->library('session');
        $type = $this->session->set_userdata('b_sub',$b_sub);
		echo $b_sub;

	}
	

/*确认方向题*/
	public function add_d(){
	$result= file_get_contents("php://input");
		$a=json_decode($result,TRUE);
		$a=$a['questions'];
		$data=implode(',', $a);
		$d_sub=$data.',';
		$this->load->library('session');
        $type = $this->session->set_userdata('d_sub',$d_sub);
		echo $d_sub;


	}


/*添加试题页*/

	public function test_add_html(){
		
		$this->load->library('session');
 		$admin=$this->session->userdata('user');

 		$this->load->model('paper','paper');
		$a = $this->paper->sel_admin($admin);
		$res = $a[0]['admin_group'];
		$level = $a[0]['admin_level'];
		if(intval($level)<3) error("抱歉，您尚未获得创建试卷的权限！");
		$type =$this->session->set_userdata('type',$res);
		$this->load->view('index/test_add.html');

	}

/*上传试卷*/
	public function test_add(){
		$this->load->library('session');
		$result= file_get_contents("php://input");
		$a=json_decode($result,TRUE);
		$b_sub=explode(',', $a['question1'],-1);
		$d_sub=explode(',', $a['question2'],-1);
		$bb_sub=implode(',', $b_sub);
		$dd_sub=implode(',', $d_sub);
		$sub=$bb_sub.",".$dd_sub.",";
		//var_dump(strlen($sub));
		if((strlen($sub)!=37))
		{echo "-1";exit;}
		else echo $sub;
		$id=$this->session->userdata('user');
		$type=$this->session->userdata('type');
		$this->load->model('paper','paper');
		$result=$this->paper->paper_add($id,$type,$sub);
		var_dump($result);die;
		
		
	}
/*查找试卷*/
	public function seek_out_type_num(){
		$type=$this->input->post('type');
		$this->load->model('paper','paper');
		$data['test']= $this->paper->test_sel($id);
		$this->load->view('index/test.html',$data);
	}




}