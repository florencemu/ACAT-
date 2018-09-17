<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Paper extends CI_Model {

/*创建试卷*/
	public function test_add($paper_id,$include_id){
		$sql = "INSERT INTO `paper` (`paper_id`,`include_id`) VALUES ('$paper_id','$include_id')";
		//var_dump($sql);die;
		$result = $this->db->query($sql);
    	return $result;

		
	}

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

	$res="SELECT paper_id,include_id,paper_sum FROM `paper`WHERE paper_type = '$type' LIMIT $offset,$perPage";
    	$result = $this->db->query($res)->result_array();
    	return $result;
	
	}

/*查找学生试卷*/
public function stu_sel($id){


 		$res="SELECT stu_name FROM `student_info`WHERE stu_id = '$id' ";
    	$result = $this->db->query($res)->result_array();
    	return $result[0]['stu_name'];


 	}

/*public function stu_sel_paper($id){


 		$res="SELECT paper_id,include_id,paper_sum FROM `paper`,``WHERE paper_type = '$type' ";
    	$result = $this->db->query($res)->result_array();
    	return $result;


 	}*/


 	
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
    	$res="SELECT paper_id,include_id,paper_sum  FROM `paper` LIMIT $offset,$perPage";
    	$result = $this->db->query($res)->result_array();
    	return $result;
	}

}