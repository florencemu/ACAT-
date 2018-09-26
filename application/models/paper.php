<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Paper extends CI_Model {

/*创建试卷*/

public function sel_admin($admin){
	$sql = "SELECT admin_group,admin_level FROM `admin_id` WHERE admin = '$admin'";
	$result = $this->db->query($sql)->result_array();
	return $result;


}
/*我的试卷*/
public function my_test($admin){
	$sql = "SELECT paper_id,paper_type,include_id,paper_sum FROM `paper` WHERE create_id = '$admin'";
	$result = $this->db->query($sql)->result_array();
	return $result;


}
/*查看试卷*/
public function admin_show($id){
	$sql = "SELECT include_id FROM `paper` WHERE paper_id = '$id'";
	$result = $this->db->query($sql)->result_array();
	return $result;

}
public function admin_show_test($s_id){
	$sql = "SELECT sub_que,sub_ans FROM `subject` WHERE sub_id = '$s_id'";
	$result = $this->db->query($sql)->result_array();
	return $result;
}

/*删除试卷*/
public function del_paper($id){
	$sql = "DELETE FROM paper  WHERE paper_id = '$id'";
	$result = $this->db->query($sql);
	return $result;
}


/*public function create($type,$paper_id,$include_id)
	$sql = "INSERT INTO `paper` (`paper_id`, `include_id`, `paper_sum`, `paper_type`) VALUES (NULL, '', '0', '$type')";
	$result = $this ->db->query($sql);
	$id = $this->db->insert_id();

	var_dump($id);die;
	/*$sql1 = "INSERT INTO `paper` (`paper_id`, `include_id`, `paper_sum`, `paper_type`) VALUES (NULL, '', '0', '$type')";
	$sql2 = "INSERT INTO `paper` (`paper_id`, `include_id`, `paper_sum`, `paper_type`) VALUES (NULL, '', '0', '$type')";
	$sql3 = "INSERT INTO `paper` (`paper_id`, `include_id`, `paper_sum`, `paper_type`) VALUES (NULL, '', '0', '$type')";
	$result = $this ->db->query($sql);
	/*var_dump($result);die;*/
	/*return $result;
}*/

/*public function show_sub(){
	$id = $this->db->insert_id();
	$sql = "SELECT  include_id,FROM `admin_id` WHERE admin = '$admin'";
	$result = $this->db->query($sql)->result_array();
	return $result[0]['admin_group'];


}*/






/*	public function test_add($paper_id,$include_id){
		$sql = "INSERT INTO `paper` (`paper_id`,`include_id`) VALUES ('$paper_id','$include_id')";
		//var_dump($sql);die;
		$result = $this->db->query($sql);
    	return $result;

		
	}
*/
/*修改试卷*/
	public function test_mod(){

	$res="SELECT paper_id,include_id FROM `paper`";
    	$result = $this->db->query($res)->result_array();
    	return $result;


	}
/*删除试卷*/
	public function test_del(){

	$res="SELECT paper_id,include_id FROM `paper`";
    	$result = $this->db->query($res)->result_array();
    	return $result;
		
	}
	
/*查找试卷*/

	public function seek_out_type_num($type){
		$res="SELECT COUNT(paper_id) FROM `paper` WHERE paper_type = '$type'";
		$result = $this->db->query($res)->result_array();
		/*var_dump($result);die;*/
    	return $result[0]['COUNT(paper_id)'];
	}

	public function seek_out_type($type,$perPage,$offset){

	$res="SELECT paper_id,create_id,include_id,paper_sum FROM `paper`WHERE paper_type = '$type' LIMIT $offset,$perPage";
    	$result = $this->db->query($res)->result_array();
    	return $result;
	
	}

/*查找学生试卷*/
public function stu_sel($id){


 		$res="SELECT stu_name FROM `student_info`WHERE stu_id = '$id' ";
    	$result = $this->db->query($res)->result_array();
    	return $result[0]['stu_name'];


 	}
public function grade_sel($id){

 		$res="SELECT base_grade,dir_grade FROM `student_paper`WHERE stu_id = '$id' ";
    	$result = $this->db->query($res)->result_array();
    	return $result;


 	}


public function sel_stu_ans($id){

 		$res="SELECT paper.paper_id,
 					 paper.include_id,
 					 student_paper.stu_ans FROM `student_paper`,`paper` WHERE stu_id = '$id' AND paper.paper_id  = student_paper.paper_id ";
    	$result = $this->db->query($res)->result_array();
    	/*var_dump($result);*/
    	return $result;

 	}

public function sel_stu_que($s_id){

 		$res="SELECT sub_que,sub_ans FROM `subject` WHERE sub_id = '$s_id' ";
    	$result = $this->db->query($res)->result_array();
    	return $result;

 	}


 	
/*查找试题*/
public function b_num(){
    	$res="SELECT COUNT(sub_id) FROM `subject` WHERE sub_type='基础题'";
    	$result = $this->db->query($res)->result_array();
    	return $result[0]['COUNT(sub_id)'];
	}

 	public function inf_b($perPage,$offset){
    	$res="SELECT sub_id,sub_que,sub_diff  FROM `subject` WHERE sub_type='基础题' LIMIT $offset,$perPage";
    	$result = $this->db->query($res)->result_array();
    	return $result;
	}




	public function d_num(){
    	$res="SELECT COUNT(sub_id) FROM `subject` WHERE sub_type='PHP'OR sub_type='JAVA' OR sub_type='前端' OR sub_type='Python' ";
    	$result = $this->db->query($res)->result_array();
    	return $result[0]['COUNT(sub_id)'];
	}
	public function inf_d($perPage,$offset){
    	$res="SELECT sub_id,sub_que,sub_type,sub_diff  FROM `subject` WHERE sub_type='PHP'OR sub_type='JAVA' OR sub_type='前端' OR sub_type='Python' LIMIT $offset,$perPage ";
    	$result = $this->db->query($res)->result_array();
    	return $result;
	}


/*基础题检索*/

public function diff_num($diff){
		$res = "SELECT COUNT(sub_id)  FROM `subject` WHERE sub_diff='$diff' AND sub_type='基础题' ";
		$result = $this->db->query($res)->result_array();
    	return $result[0]['COUNT(sub_id)'];

	}


	public function b_sel($diff,$perPage,$offset){
		$res = "SELECT sub_id,sub_que,sub_diff  FROM `subject` WHERE sub_diff='$diff'AND sub_type = '基础题' LIMIT $offset,$perPage";
		$result = $this->db->query($res)->result_array();
    	return $result;



	}

/*方向题检索*/

public function num_d($diff,$type){
		$res = "SELECT COUNT(sub_id) FROM `subject` WHERE sub_diff='$diff' AND sub_type='$type' ";
		$result = $this->db->query($res)->result_array();
    	return $result[0]['COUNT(sub_id)'];
}

public function diff_num_d($diff){
		$res = "SELECT COUNT(sub_id)  FROM `subject` WHERE sub_diff='$diff' AND sub_type='PHP' OR sub_type='JAVA' OR sub_type='前端' OR sub_type='Python'  ";
		$result = $this->db->query($res)->result_array();
    	return $result[0]['COUNT(sub_id)'];

	}

public function type_num($type){
		$res = "SELECT COUNT(sub_id)  FROM `subject` WHERE sub_type='$type' ";
		$result = $this->db->query($res)->result_array();
    	return $result[0]['COUNT(sub_id)'];
}


	public function d_sel($type,$perPage,$offset){
		$res="SELECT sub_id,sub_que,sub_type,sub_diff  FROM `subject` WHERE sub_type= '$type'  LIMIT $offset,$perPage ";
		$result = $this->db->query($res)->result_array();
    	return $result;

	}
	public function diff_sel_d($diff,$perPage,$offset){
		$res="SELECT sub_id,sub_que,sub_type,sub_diff  FROM `subject` WHERE sub_diff= '$diff'  LIMIT $offset,$perPage ";
		$result = $this->db->query($res)->result_array();
    	return $result;

	}
	public function all_sel($type,$diff,$perPage,$offset){
		$res="SELECT sub_id,sub_que,sub_type,sub_diff FROM `subject`WHERE sub_type = '$type' AND sub_diff ='$diff' LIMIT $offset,$perPage ";
		$result = $this->db->query($res)->result_array();
    	return $result;

	}

/*显示试卷信息*/	
	 public function test_inf($perPage,$offset){
    	$res="SELECT paper_id,create_id,include_id,paper_sum  FROM `paper` LIMIT $offset,$perPage";
    	$result = $this->db->query($res)->result_array();
    	return $result;
	}

}