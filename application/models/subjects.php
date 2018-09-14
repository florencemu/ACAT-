<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Subjects extends CI_Model {
/*显示试题信息*/
	public function sub_inf(){
    	 $data = $this->db->select('sub_id,sub_type,sub_que,sub_ans,sub_diff')->from('subject')->get()->result_array();
        return $data;
	}

	
/*添加试题*/
	public function sub_add($sub_type,$sub_diff,$sub_que,$sub_ans){
		$sql = "INSERT INTO `subject` ( `sub_type`,`sub_diff`, `sub_que`, `sub_ans`) VALUES ('$sub_type', '$sub_diff','$sub_que','$sub_ans')";
		$result = $this->db->query($sql);
    	return $result;
	}

/*删除试题*/
	public function sub_del($id){
		$res="DELETE FROM `subject` WHERE `sub_id` = '$id' ";
		$result = $this->db->query($res);
    	return $result;
	}
/*修改试题*/
	public function sub_mod($id,$que,$ans,$diff,$type){
		$res="UPDATE subject SET sub_que = '$que',sub_ans = '$ans',sub_diff = '$diff',sub_type = '$type' WHERE sub_id='$id'";
		$result = $this->db->query($res);
    	return $result;
	}



/*查找试题*/
		public function seek_out_type($type){
		/*$res="SELECT * FROM `subject`WHERE sub_type= '$type'";
		$result = $this->db->query($res)->result_array();*/
		 $data = $this->db->select('sub_id,sub_type,sub_que,sub_ans,sub_diff')->from('subject')->where('sub_type',$type)->get()->result_array();
        return $data;
    	/*return $result;*/
	}
		public function seek_out_diff($diff){
		/*$res="SELECT * FROM `subject`WHERE sub_diff = '$diff'";
		$result = $this->db->query($res)->result_array();
    	return $result;*/
    	 $data = $this->db->select('sub_id,sub_type,sub_que,sub_ans,sub_diff')->from('subject')->where('sub_diff',$diff)->get()->result_array();
        return $data;
	}
		public function seek_out_all($type,$diff){
		/*$res="SELECT * FROM `subject`WHERE sub_type = '$type'AND sub_diff ='$diff'";
		$result = $this->db->query($res)->result_array();
    	return $result;*/
    	 $data = $this->db->select('sub_id,sub_type,sub_que,sub_ans,sub_diff')->from('subject')->where('sub_type',$type)-> where('sub_diff',$diff)->get()->result_array();
        return $data;
	}
		public function seek_out_id($id){
		$res="SELECT sub_id,sub_type,sub_diff,sub_que,sub_ans FROM `subject`WHERE sub_id = '$id'";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}
	
}