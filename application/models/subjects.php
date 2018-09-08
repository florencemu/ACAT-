<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Subjects extends CI_Model {
/*显示试题信息*/
	public function sub_inf(){
		$res="SELECT sub_id,sub_type,sub_diff,sub_que,sub_ans FROM `subject` ORDER BY sub_id asc";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}
/*分页*/
	public function  gettotal()
	{
		$query=$this->db->query("SELECT * FROM 'subject'");
		return $query->result();
	}

	public function sub_inf_page($num, $offset)
	{
		 $query = $this->db->get('subject', $num, $offset);          
    		return $query->result(); 
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
	public function sub_mod($id,$s_id,$que,$ans,$diff,$type){
		$res="UPDATE subject SET sub_id ='$s_id',sub_que = '$que',sub_ans = '$ans',sub_diff = '$diff',sub_type = '$type' WHERE sub_id='$id'";
		$result = $this->db->query($res);
    	return $result;
	}
/*查找试题*/
		public function seek_out_type($type){
		$res="SELECT * FROM `subject`WHERE sub_type= '$type'";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}
		public function seek_out_diff($diff){
		$res="SELECT * FROM `subject`WHERE sub_diff = '$diff'";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}
		public function seek_out_all($type,$diff){
		$res="SELECT * FROM `subject`WHERE sub_type = '$type'AND sub_diff ='$diff'";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}
		public function seek_out_id($id){
		$res="SELECT sub_id,sub_type,sub_diff,sub_que,sub_ans FROM `subject`WHERE sub_id = '$id'";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}
	
}