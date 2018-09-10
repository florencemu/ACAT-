<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Grades extends CI_Model {


/*显示成绩*/
public function grade_inf(){
    	$res="SELECT student_info.stu_id,
        student_info.stu_name,
    	student_info.stu_group,
    	student_paper.base_grade,
    	student_paper.dir_grade,
    	student_paper.grade,
    	student_info.stu_major,
        student_paper.correct_ad FROM `student_info`,`student_paper` WHERE student_info.stu_id = student_paper.stu_id ORDER BY student_paper.grade desc";
    	$result = $this->db->query($res)->result_array();
    	return $result;
	}

/*查找*/
public function seek_out_name($name){

    $res="SELECT student_info.stu_id,
        student_info.stu_name,
        student_info.stu_group,
        student_paper.base_grade,
        student_paper.dir_grade,
        student_paper.grade,
        student_paper.correct_ad,
        student_info.stu_major FROM `student_info`,`student_paper` WHERE student_info.stu_name = '$name'AND student_info.stu_id = student_paper.stu_id";
        $result = $this->db->query($res)->result_array();
        return $result;
    
    }
public function seek_out_major($major){

    $res="SELECT student_info.stu_id,
        student_info.stu_name,
        student_info.stu_group,
        student_paper.base_grade,
        student_paper.dir_grade,
        student_paper.grade,
        student_paper.correct_ad,
        student_info.stu_major FROM `student_info`,`student_paper` WHERE student_info.stu_major = '$major'AND student_info.stu_id = student_paper.stu_id";
        $result = $this->db->query($res)->result_array();
        return $result;
    
    }

public function seek_out_type($type){

    $res="SELECT student_info.stu_id,
        student_info.stu_name,
        student_info.stu_group,
        student_paper.base_grade,
        student_paper.dir_grade,
        student_paper.grade,
        student_paper.correct_ad,
        student_info.stu_major FROM `student_info`,`student_paper` WHERE student_info.stu_group = '$type'AND student_info.stu_id = student_paper.stu_id";
        $result = $this->db->query($res)->result_array();
        return $result;
    
    }

public function seek_out_all($type,$major){

    $res="SELECT student_info.stu_id,
        student_info.stu_name,
        student_info.stu_group,
        student_paper.base_grade,
        student_paper.dir_grade,
        student_paper.grade,
        student_paper.correct_ad,
        student_info.stu_major FROM `student_info`,`student_paper` WHERE student_info.stu_group = '$type' AND student_info.stu_major = '$major'AND student_info.stu_id = student_paper.stu_id";
        $result = $this->db->query($res)->result_array();
        return $result;
    
    }


}