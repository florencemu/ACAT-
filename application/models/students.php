<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Students extends CI_Model {
/*添加学生*/
	/*public function add($stu_id,$stu,$stu_major,$stu_passwd,$stu_sex){
		$sql = "INSERT INTO `student_info` (`stu_id`, `stu_name`, `stu_major`, `stu_passwd`, `grade`, `stu_sex`) VALUES ('$stu_id', '$stu', '$stu_major', '$stu_passwd', 0, '$stu_sex')";
		//var_dump($sql);die;
		$result = $this->db->query($sql);
    	return $result;
	}*/
/*删除学生*/
	public function stu_del($id){
		/*$res1="SELECT stu_id,stu_name,stu_sex,stu_major,stu_group,grade FROM `student_info`";*/
		$sql = "DELETE FROM `student_info` WHERE `stu_id` = '$id'";
		$result = $this->db->query($sql);
    	return $result;
	}




/*修改学生*/


	public function stu_mod($id,$s_id,$name,$major,$sex,$group){

		$res="UPDATE student_info SET stu_id ='$s_id',stu_name = '$name',stu_major = '$major',stu_sex = '$sex',stu_group = '$group' WHERE stu_id='$id'";
		$result = $this->db->query($res);
    	return $result;
	}


/*打印学生信息*/
	public function sel(){
		/*$res="SELECT student_info.stu_id,student_info.stu_name,student_info.stu_sex,student_info.stu_major,student_info.stu_group,student_paper.grade FROM `student_info`,`student_paper` WHERE student_info.stu_id = student_paper.stu_id";*/
		$data = $this->db->select('stu_id,stu_name,stu_sex,stu_major,stu_group,grade')->from('student_info')->join('student_paper','stu_id = stu_id ')->get()->result_array();
		//var_dump($res3);die;
		/*$result = $this->db->query($res)->get()->result_array();*/
		/*var_dump($result3);die;*/
    	return $data;
	}
/*查找学生*/
	public function seek_out($name){
		$res="SELECT stu_id,stu_name,stu_sex,stu_major,stu_group,grade FROM `student_info`WHERE stu_name='$name'";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}
		public function seek_out_group($group){
		$res="SELECT stu_id,stu_name,stu_sex,stu_major,stu_group,grade FROM `student_info`WHERE stu_group= '$group'";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}
		public function seek_out_sex($sex){
		$res="SELECT stu_id,stu_name,stu_sex,stu_major,stu_group,grade FROM `student_info`WHERE stu_sex = '$sex'";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}
		public function seek_out_all($group,$sex){
		$res="SELECT stu_id,stu_name,stu_sex,stu_major,stu_group,grade FROM `student_info`WHERE stu_group = '$group'AND stu_sex ='$sex'";
		$result = $this->db->query($res)->result_array();
    	return $result;
    }
    	public function seek_out_id($id){
		$res="SELECT stu_id,stu_name,stu_major FROM `student_info`WHERE stu_id='$id'";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}
	


	
}