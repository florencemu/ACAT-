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
	public function test_sel($id){

	$res="SELECT paper_id,include_id,paper_sum FROM `paper`WHERE paper_id = '$id'";
    	$result = $this->db->query($res)->result_array();
    	return $result;
	
	}
/*查找试题*/
 	public function inf_b(){
    	$res="SELECT sub_id,sub_que,sub_diff  FROM `subject` WHERE sub_type='基础题'";
    	$result = $this->db->query($res)->result_array();
    	return $result;
	}
	public function inf_d(){
    	$res="SELECT sub_id,sub_que,sub_type,sub_diff  FROM `subject` WHERE sub_type='php'OR sub_type='Java' OR sub_type='前端' OR sub_type='Python' ";
    	$result = $this->db->query($res)->result_array();
    	return $result;
	}
	public function b_sel($diff){
		$res = "SELECT sub_id,sub_que,sub_diff  FROM `subject` WHERE sub_diff='$diff'";
		$result = $this->db->query($res)->result_array();
    	return $result;

	}
	public function d_sel($type){
		$res="SELECT sub_id,sub_que,sub_type,sub_diff  FROM `subject` WHERE sub_type= '$type'";
		$result = $this->db->query($res)->result_array();
    	return $result;

	}
	public function all_sel($type,$diff){
		$res="SELECT sub_id,sub_que,sub_type,sub_diff FROM `subject`WHERE sub_type = '$type' AND sub_diff ='$diff'";
		$result = $this->db->query($res)->result_array();
    	return $result;

	}

/*显示试卷信息*/	
	 public function test_inf(){
    	$res="SELECT paper_id,include_id,paper_sum  FROM `paper`";
    	$result = $this->db->query($res)->result_array();
    	return $result;
	}

}