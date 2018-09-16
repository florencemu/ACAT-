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
	public function sel($per_page,$offset){
		$res="SELECT student_info.stu_id,student_info.stu_name,student_info.stu_sex,student_info.stu_major,student_info.stu_group,student_paper.grade FROM `student_info`,`student_paper` WHERE student_info.stu_id = student_paper.stu_id LIMIT $offset,$per_page";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}

/*查找学生*/

	public function seek_out_name_num($name){
		$res="SELECT COUNT(stu_id) FROM `student_info` WHERE stu_name = '$name'";
		$result = $this->db->query($res)->result_array();
		/*var_dump($result);die;*/
    	return $result[0]['COUNT(stu_id)'];
	}
	public function seek_out($name,$per_page,$offset){
		$res="SELECT student_info.stu_id,student_info.stu_name,student_info.stu_sex,student_info.stu_major,student_info.stu_group,student_paper.grade FROM `student_info`,`student_paper` WHERE student_info.stu_name='$name ' AND student_info.stu_id = student_paper.stu_id LIMIT $offset,$per_page";
		$result = $this->db->query($res)->result_array();
		/*var_dump($result);*/
    	return $result;
	}








		public function seek_out_group_num($group){
		$res="SELECT COUNT(stu_id) FROM `student_info` WHERE stu_group = '$group'";
		$result = $this->db->query($res)->result_array();
    	return $result[0]['COUNT(stu_id)'];
	}
		public function seek_out_group($group,$per_page,$offset){
		$res="SELECT student_info.stu_id,student_info.stu_name,student_info.stu_sex,student_info.stu_major,student_info.stu_group,student_paper.grade FROM `student_info`,`student_paper` WHERE student_info.stu_id = student_paper.stu_id AND student_info.stu_group= '$group'LIMIT $offset,$per_page";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}
	



		public function seek_out_sex_num($sex){
		$res="SELECT COUNT(stu_id) FROM `student_info` WHERE stu_sex = '$sex'";
		$result = $this->db->query($res)->result_array();
    	return $result[0]['COUNT(stu_id)'];
	}


		public function seek_out_sex($sex,$perPage,$offset){
		$res="SELECT student_info.stu_id,student_info.stu_name,student_info.stu_sex,student_info.stu_major,student_info.stu_group,student_paper.grade FROM `student_info`,`student_paper` WHERE  student_info.stu_id = student_paper.stu_id AND student_info.stu_sex = '$sex'LIMIT $offset,$perPage";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}




		public function seek_out_num($group,$sex){
		$res="SELECT COUNT(stu_id) FROM `student_info` WHERE stu_group = '$group' AND stu_sex = '$sex'";
		$result = $this->db->query($res)->result_array();
		/*var_dump($result);*/
    	return $result[0]['COUNT(stu_id)'];
	}
		public function seek_out_all($group,$sex,$per_page,$offset){
		$res="SELECT student_info.stu_id,student_info.stu_name,student_info.stu_sex,student_info.stu_major,student_info.stu_group,student_paper.grade FROM `student_info`,`student_paper` WHERE student_info.stu_group = '$group'AND student_info.stu_sex ='$sex'AND student_info.stu_id = student_paper.stu_id LIMIT $offset,$per_page";
		$result = $this->db->query($res)->result_array();
		/*var_dump($result);*/
    	return $result;
    }
    	




    	public function seek_out_id($id){
		$res="SELECT stu_id,stu_name,stu_major FROM `student_info`WHERE stu_id='$id'";
		$result = $this->db->query($res)->result_array();
    	return $result;
	}
	


	
}