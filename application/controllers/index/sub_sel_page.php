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
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
     /*   $config['enable_query_strings'] = TRUE;*/
     /*   $config['reuse_query_string'] = TRUE;*/
        $config['per_page']=$perPage;
        $config['query_string_segment'] = 'page';
        $config['uri_segment']=4;//偏移量，默认是3，如果在控制器有二级目录，根据偏移量层级而定
        //自定义配置
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';//“第一页”链接的打开标签。
        $config['first_tag_close'] = '</li>';//“第一页”链接的关闭标签。
        $config['last_link'] = 'Last';//你希望在分页的右边显示“最后一页”链接的名字。
        $config['last_tag_open'] = '<li>';//“最后一页”链接的打开标签。
        $config['last_tag_close'] = '</li>';//“最后一页”链接的关闭标签。
        $config['next_link'] = '>';//你希望在分页中显示“下一页”链接的名字。
        $config['next_tag_open'] = '<li>';//“下一页”链接的打开标签。
        $config['next_tag_close'] = '</li>';//“下一页”链接的关闭标签。
        $config['prev_link'] = '<';//你希望在分页中显示“上一页”链接的名字。
        $config['prev_tag_open'] = '<li>';//“上一页”链接的打开标签。
        $config['prev_tag_close'] = '</li>';//“上一页”链接的关闭标签。
        $config['cur_tag_open'] = '<li class="current">';//“当前页”链接的打开标签。
        $config['cur_tag_close'] = '</li>';//“当前页”链接的关闭标签。
        $config['num_tag_open'] = '<li>';//“数字”链接的打开标签。
        $config['num_tag_close'] = '</li>';
        //设置偏移量
        $type = $this->input->get('type');
        $diff = $this ->input->get('diff');
        $page = $this->input->get('page'); 
        
        if(!($type)&&!($diff)) error("请选择你要查询的信息！");
        
        else if(!($diff)&&$type){
            
            $config['base_url'].="type=".$type."&diff=".$diff;
                    switch ($type) {
                    case '1': $type= '基础题';break;
                    case '2': $type= '前端';break;
                    case '3': $type= '后台';break;
                    case '4': $type= '服务端';break;
                    case '5':$type= '机器学习';break;
                    }
            $this->db->where('sub_type',$type) ->from('subject');
            $config['total_rows']=$this->db->count_all_results();
            /* var_dump($page);*/
              if(!$page) $page=1;   //第一页 
                $offset = ($page-1)*4;//4是显示条数
           /* $offset=$this->uri->segment(4);*/
            $this->db->limit($perPage,$offset);
            $data['sub'] = $this->db->where('sub_type',$type) ->from('subject')->get()->result_array();
            /*var_dump($data);*/
            
           
               }

        else if(!($type)&&($diff)){
            $config['base_url'].="type=".$type."&diff=".$diff;
            $this->db->where('sub_diff',$diff) ->from('subject');
            $config['total_rows']=$this->db->count_all_results();
            if(!$page) $page=1;   //第一页 
                $offset = ($page-1)*4;//4是显示条数
            /*$offset=$this->uri->segment(4);*/
            $this->db->limit($perPage,$offset);
            $data['sub'] = $this->db->where('sub_diff',$diff) -> from('subject')->get()->result_array();
               }  

        else if($diff&&$type){
             $config['base_url'].="type=".$type."&diff=".$diff;
             switch ($type) {
                    case '1': $type= '基础题';break;
                    case '2': $type= '前端';break;
                    case '3': $type= '后台';break;
                    case '4': $type= '服务端';break;
                    case '5':$type= '机器学习';break;
                    }
             $this->db->where('sub_diff',$diff) ->where('sub_type',$type)->from('subject');
            $config['total_rows']=$this->db->count_all_results();
            /*$offset=$this->uri->segment(4);*/
            if(!$page) $page=1;   //第一页 
                $offset = ($page-1)*4;//4是显示条数
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




 