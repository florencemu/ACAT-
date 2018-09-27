<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Grades extends CI_Model {


/*显示成绩*/
public function grade_inf($perPage,$offset){
    	$res="SELECT student_info.stu_id,
        student_info.stu_name,
    	student_info.stu_group,
        student_info.stu_sex,
    	student_paper.base_grade,
    	student_paper.dir_grade,
    	student_paper.grade,
    	student_info.stu_major,
        student_paper.correct_id FROM `student_info`,`student_paper` WHERE student_info.stu_id = student_paper.stu_id  ORDER BY student_paper.grade desc LIMIT $offset,$perPage";
    	$result = $this->db->query($res)->result_array();
    	return $result;
	}

/*查找*/


public function seek_out_name_num($name){
        $res="SELECT COUNT(stu_id) FROM `student_info` WHERE stu_name = '$name'";
        $result = $this->db->query($res)->result_array();
        /*var_dump($result);die;*/
        return $result[0]['COUNT(stu_id)'];
    }

public function seek_out_name($name,$perPage,$offset){

    $res="SELECT student_info.stu_id,
        student_info.stu_name,
        student_info.stu_group,
        student_info.stu_sex,
        student_paper.base_grade,
        student_paper.dir_grade,
        student_paper.grade,
        student_paper.correct_id,
        student_info.stu_major FROM `student_info`,`student_paper` WHERE student_info.stu_name = '$name'AND student_info.stu_id = student_paper.stu_id LIMIT $offset,$perPage ";
        $result = $this->db->query($res)->result_array();
        return $result;
    
    }






public function seek_out_major_num($major){
        $res="SELECT COUNT(stu_id) FROM `student_info` WHERE stu_major = '$major'";
        $result = $this->db->query($res)->result_array();
        /*var_dump($result);die;*/
        return $result[0]['COUNT(stu_id)'];
    }



public function seek_out_major($major,$perPage,$offset){

    $res="SELECT student_info.stu_id,
        student_info.stu_name,
        student_info.stu_group,
        student_info.stu_sex,
        student_paper.base_grade,
        student_paper.dir_grade,
        student_paper.grade,
        student_paper.correct_id,
        student_info.stu_major FROM `student_info`,`student_paper` WHERE student_info.stu_major = '$major'AND student_info.stu_id = student_paper.stu_id LIMIT $offset,$perPage";
        $result = $this->db->query($res)->result_array();
        return $result;
    
    }





public function seek_out_group_num($group){
        $res="SELECT COUNT(stu_id) FROM `student_info` WHERE stu_group = '$group'";
        $result = $this->db->query($res)->result_array();
        /*var_dump($result);die;*/
        return $result[0]['COUNT(stu_id)'];
    }


public function seek_out_group($group,$perPage,$offset){

    $res="SELECT student_info.stu_id,
        student_info.stu_name,
        student_info.stu_group,
        student_info.stu_sex,
        student_paper.base_grade,
        student_paper.dir_grade,
        student_paper.grade,
        student_paper.correct_id,
        student_info.stu_major FROM `student_info`,`student_paper` WHERE student_info.stu_group = '$group'AND student_info.stu_id = student_paper.stu_id LIMIT $offset,$perPage";
        $result = $this->db->query($res)->result_array();
        return $result;
    
    }





public function seek_out_num($group,$major){
        $res="SELECT COUNT(stu_id) FROM `student_info` WHERE stu_group = '$group' AND stu_major = '$major'";
        $result = $this->db->query($res)->result_array();
        /*var_dump($result);die;*/
        return $result[0]['COUNT(stu_id)'];
    }
public function seek_out_all($group,$major,$perPage,$offset){

    $res="SELECT student_info.stu_id,
        student_info.stu_name,
        student_info.stu_group,
        student_info.stu_sex,
        student_paper.base_grade,
        student_paper.dir_grade,
        student_paper.grade,
        student_paper.correct_id,
        student_info.stu_major FROM `student_info`,`student_paper` WHERE student_info.stu_group = '$group' AND student_info.stu_major = '$major'AND student_info.stu_id = student_paper.stu_id LIMIT $offset,$perPage";
        $result = $this->db->query($res)->result_array();
        return $result;
    
    }


}