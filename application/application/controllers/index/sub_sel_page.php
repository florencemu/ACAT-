<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Sub_sel_page extends CI_Controller {
  





/*可实现分页*/

  public function page(){
        //载入分页类
        $this->load->library('pagination');
        $perPage=4;//每页4条
        //配置项设置
        $config['base_url']=site_url() .'/index/sub_sel_page/page?';
        /*$config['use_page_numbers'] = TRUE;*/
        $config['page_query_string'] = TRUE;
     /*   $config['enable_query_strings'] = TRUE;*/
     /*   $config['reuse_query_string'] = TRUE;*/
        $config['per_page']=$perPage;
        $config['uri_segment']=4;//偏移量，默认是3，如果在控制器有二级目录，根据偏移量层级而定
        //自定义配置
        $config['first_link']="First  &nbsp ";
        $config['prev_link']="<  &nbsp"; 
        $config['next_link']="&nbsp >  ";
        $config['last_link']="   &nbsp Last";
        //设置偏移量
        $type = $this->input->get('type');
        $diff = $this ->input->get('diff');
        
        if(!($type)&&!($diff)) error("请选择你要查询的信息！");
        
        else if(!($diff)&&$type){
            
            $config['base_url'].="type=".$type."&diff=".$diff;
                    switch ($type) {
                    case '1': $type= '基础题';break;
                    case '2': $type= 'PHP';break;
                    case '3': $type= '前端';break;
                    case '4': $type= 'JAVA';break;
                    case '5':$type= 'Python';break;
                    }
            $this->db->where('sub_type',$type) ->from('subject');
            $config['total_rows']=$this->db->count_all_results();
            $offset=$this->uri->segment(4);
            $this->db->limit($perPage,$offset);
            $data['sub'] = $this->db->where('sub_type',$type) ->from('subject')->get()->result_array();
            /*var_dump($data);*/
            
           
               }

        else if(!($type)&&($diff)){
            $config['base_url'].="type=".$type."&diff=".$diff;
            $this->db->where('sub_diff',$diff) ->from('subject');
            $config['total_rows']=$this->db->count_all_results();
            $offset=$this->uri->segment(4);
            $this->db->limit($perPage,$offset);
            $data['sub'] = $this->db->where('sub_diff',$diff) -> from('subject')->get()->result_array();
               }  

        else if($diff&&$type){
             $config['base_url'].="type=".$type."&diff=".$diff;
             switch ($type) {
                    case '1': $type= '基础题';break;
                    case '2': $type= 'PHP';break;
                    case '3': $type= '前端';break;
                    case '4': $type= 'JAVA';break;
                    case '5':$type= 'Python';break;
                    }
             $this->db->where('sub_diff',$diff) ->where('sub_type',$type)->from('subject');
            $config['total_rows']=$this->db->count_all_results();
            $offset=$this->uri->segment(4);
            $this->db->limit($perPage,$offset);
            $data['sub'] = $this->db->where('sub_diff',$diff) ->where('sub_type',$type)->from('subject')->get()->result_array();

        }
         //传入配置项，并生成链接
       $offset=$this->uri->segment(4);
        $this->db->limit($offset);
        $this->pagination->initialize($config);
        $data['links']=$this->pagination->create_links();
        /*var_dump($data['links']);*/
       
        //加载模型类和视图
       /*$this->load->model("subjects","subjects");*/
        /*$data['sub']=$this->subjects->get_inf();*/
       /* var_dump($data['sub']);*/
        $this->load->view('index/subject.html',$data);
    }





}

?>