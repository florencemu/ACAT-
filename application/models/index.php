<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Index extends CI_Model {
	
//管理员信息匹配
	public function login($username){
		//echo $username;die;
		$sql = "select * from admin_id where `admin` = '$username'";
		//echo $sql;die;
		$result = $this->db->query($sql)->row();
		//print_r($result);die;
		return $result;
	}

/*	public function log_in($password){
		$sql1 = "select * from admin_id where `ad_passwd ` = ' . '$password'";
		$result1 = $this->db->query($sql1)->result_array();
		return $result1;
	}
*/
//学生信息匹配

		public function login_s($username){
		//echo $username;die;
		$sql2 = "select * from student_info  where `stu_id` = '$username'";
		//echo $sql;die;
		$result2 = $this->db->query($sql2)->row();
		//print_r($result);die;
		return $result2;
	}

/*		public function log_in_s($password){
		$sql3 = "select * from student_info where `stu_passwd`  = ' . '$password'";
		$result3 = $this->db->query($sql3)->result_array();
		return $result3;
	}

//管理员密码修改

/*核查密码*/

	public function admin_check($inf)
	{
		$res = "SELECT * FROM `admin_id` WHERE admin='$inf'";
		$result = $this ->db ->query($res)->result_array();
		//var_dump($result[0]['ad_passwd']);
		return $result[0]['ad_passwd'];
	}


/*修改密码*/
	public function admin_pwd_mod($inf,$npwd){
		$res="UPDATE admin_id SET ad_passwd ='$npwd' WHERE admin='$inf'";
		$result = $this->db->query($res);
    	return $result;
	}

		public function s_id($user_id){
		//echo $username;die;
		$sql5 = "select * from admin_id where `admin` = '$user_id'";
		//echo $sql;die;
		$result5 = $this->db->query($sql5)->row();
		//print_r($result);die;
		return $result5;
	}

//学生注册
	public function regist($user_name,$user_id,$password ){
		$sql4 = "INSERT INTO `student_info` (`stu_name`, `stu_id`, `stu_passwd`) VALUES ('$user_name', '$user_id', '$password')";
		$result4 = $this->db->query($sql4);
		return $result4;
	}

}