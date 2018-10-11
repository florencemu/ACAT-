<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class P_student extends CI_Model {


/*卷头信息*/
	public function stu_test($id){
		$res="SELECT paper_id,include_id,paper_type FROM paper WHERE  paper_type in(SELECT stu_group FROM student_info WHERE stu_id=$id) AND paper_id >= ((SELECT MAX(paper_id) FROM paper)-(SELECT MIN(paper_id) FROM paper)) * RAND() + (SELECT MIN(paper_id) FROM paper)     LIMIT 1";
		
	
		$result = $this->db->query($res)->result_array();
    	return $result;
	}

/*获取试题编号*/
	public function get_sub($p_id){
		$res="SELECT include_id FROM paper WHERE paper_id = $p_id ";
		$result = $this->db->query($res)->result_array();
    	return $result[0]['include_id']; 
	}
/*检索试题*/
	public function create($s_id){
		$res="SELECT sub_que FROM subject WHERE sub_id = $s_id";
		$result = $this->db->query($res)->result_array();
    	return $result; 
	}

/*信息检索*/
	public function inf_sel($inf)
	{
		$res="SELECT stu_name FROM `student_info` WHERE stu_id='$inf'";
		$result = $this->db->query($res)->result_array();
    	return $result[0]['stu_name'];

	}


/*标记作答*/
public function ans_flag($id,$p_id)
{
$res="INSERT INTO `student_paper` (`paper_id`, `stu_id`, `stu_ans`, `base_grade`, `dir_grade`, `grade`, `correct_id`) VALUES ('$p_id', '$id', NULL, NULL, NULL, NULL, NULL)";
$res2="UPDATE `paper` set `paper_sum` = `paper_sum`+1 WHERE paper_id = '$p_id'";
$result = $this->db->query($res);
$result2 = $this->db->query($res2);
return $result;
}


/*是否作答*/
public function check_ans($id){
	$res="SELECT * FROM `student_paper` WHERE stu_id='$id'";
	$result = $this->db->query($res)->result_array();
    return $result;
}

/*提交答案*/
public function ans_add($ans,$id){
	$res="UPDATE `student_paper` SET `stu_ans` = '$ans' WHERE `student_paper`.`stu_id` = '$id'";
	$result = $this->db->query($res)->result_array();
    return $result;
}

/*查看成绩*/
	public function grade_sel($inf){
		$res="SELECT base_grade,dir_grade,grade FROM `student_paper` WHERE stu_id='$inf'";
		$result = $this->db->query($res)->result_array();
		
    	return $result;
	}
/*查看试卷*/
public function paper_ans($inf){

 		$res="SELECT paper.paper_id,
 					 paper.include_id,
 					 student_paper.stu_ans FROM `student_paper`,`paper` WHERE stu_id = '$inf' AND paper.paper_id  = student_paper.paper_id ";
    	$result = $this->db->query($res)->result_array();
    	return $result;

 	}

public function paper_que($s_id){

 		$res="SELECT sub_que,sub_ans FROM `subject` WHERE sub_id = '$s_id' ";
    	$result = $this->db->query($res)->result_array();
    	return $result;

 	}

/*修改信息*/
	public function inf_mod($id,$name,$major,$sex,$group){
		$res="UPDATE student_info SET stu_id ='$id',stu_name = '$name',stu_major = '$major',stu_sex = '$sex',stu_group = '$group' WHERE stu_id='$id'";
		$result = $this->db->query($res);
    	return $result;
	}

/*核查密码*/

	public function check($inf)
	{
		$res = "SELECT stu_passwd FROM `student_info`WHERE stu_id='$inf'";
		$result = $this ->db ->query($res)->result_array();
		return $result[0]['stu_passwd'];
	}


/*修改密码*/
	public function pwd_mod($inf,$npwd){
		$res="UPDATE student_info SET stu_passwd ='$npwd' WHERE stu_id='$inf'";
		$result = $this->db->query($res);
    	return $result;
	}


	
}







