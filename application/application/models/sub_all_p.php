<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Sub_all_p extends CI_Model {



public function get_inf(/*$num, $offset*/){
    	
        $data = $this->db->select('sub_id,sub_type,sub_que,sub_ans,sub_diff')->from('subject')->get()->result_array();
        return $data;
          /*$query = $this->db->get('subject', $num, $offset);        
            return $query;*/
  

	}







}