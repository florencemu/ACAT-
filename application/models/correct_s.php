<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Correct_s extends CI_Model {


/*随机抽取学生信息*/
public function stu_inf(){
    	$res="SELECT stu_name,stu_id,stu_major,stu_group FROM student_info ORDER BY rand()     LIMIT 1";
        $result = $this->db->query($res)->result_array();
        return $result;

	}

/*获取试题*/
public function get_paper($id){
    $res="SELECT paper.include_id FROM paper,student_paper WHERE student_paper.stu_id= $id AND student_paper.paper_id= paper.paper_id";
        $result = $this->db->query($res)->result_array();
        return $result[0]['include_id'];

}
public function get_title($s_id){
        $res="SELECT sub_que,sub_ans FROM subject WHERE sub_id = $s_id";
        $result = $this->db->query($res)->result_array();
        return $result; 
    }
public function get_ans($id){
        $res="SELECT stu_ans FROM student_paper WHERE stu_id = $id";
        $result = $this->db->query($res)->result_array();
        return $result[0]['stu_ans']; 
    }
    

/*分数提交*/
/*public function seek_out_major($major){

    $res="SELECT student_info.stu_id,
        student_info.stu_name,
        student_info.stu_group,
        student_paper.base_grade,
        student_paper.dir_grade,
        student_paper.grade,
        student_info.stu_major FROM `student_info`,`student_paper` WHERE student_info.stu_major = '$major'AND student_info.stu_id = student_paper.stu_id";
        $result = $this->db->query($res)->result_array();
        return $result;
    
    }*/



}