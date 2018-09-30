<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Test_page extends CI_Controller {
  

/*可实现分页*/

  public function page(){
        //载入分页类
        $this->load->library('pagination');
        $perPage=4;//每页4条
        //配置项设置
        $config['base_url']=site_url() .'/index/test_page/page';
        $config['total_rows']=$this->db->count_all_results('paper');
        /*var_dump($config['total_rows']);*/
        $config['per_page']=$perPage;
        $config['uri_segment']=4;//偏移量，默认是3，如果在控制器有二级目录，根据偏移量层级而定
        //自定义配置
        $config['use_page_numbers'] = TRUE;
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
    
        //传入配置项，并生成链接
        $this->pagination->initialize($config);
        $res['links']=$this->pagination->create_links();
        //设置偏移量
        $page = $offset=$this->uri->segment(4);
        if(empty($page)) 
        { $page=1; $offset = 0; /*var_dump($offset);*/}   //第一页 
        else    $offset = ($page-1)*4;//4是显示条数
        
        //加载模型类和视图
     
        $this->load->model("paper","paper");
        $data['test']=$this->paper->test_inf($perPage,$offset);
      
        $this->load->view('index/test.html',$data);
    }



/*添加基础题页*/
 public function b_page(){
        $this->load->library('pagination');
        $perPage=4;//每页4条
        //配置项设置
        $config['base_url']=site_url() .'/index/test_page/b_page';
        /* $config['page_query_string'] = TRUE;*/
       /* $config['total_rows']=$this->db->count_all_results('paper');*/
        /*var_dump($config['total_rows']);*/
        $config['per_page']=$perPage;
        $config['uri_segment']=4;//偏移量，默认是3，如果在控制器有二级目录，根据偏移量层级而定
        //自定义配置
        $config['use_page_numbers'] = TRUE;
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

        $page = $offset=$this->uri->segment(4);

          if(empty($page)) { $page=1;  $offset = 0;} //第一页 
             else   $offset = ($page-1)*4;//4是显示条数
          /*   var_dump($offset);*/
               $this->load->model("paper","paper");
            $num = $this ->paper ->b_num();
            $config['total_rows']=(int)$num;
                      /*var_dump( $config['total_rows']);*/
            $data['sub'] = $this ->paper ->inf_b($perPage,$offset);
    
        //传入配置项，并生成链接
        $this->pagination->initialize($config);
        
        //加载模型类和视图
        $this->load->view('index/test_add_b.html',$data);
    }

 
public function b_page_ok(){
    $result=file_get_contents("php://input");
    if($a=json_decode($result,TRUE))
    {   echo $a['num'];
        $this->load->library('session');
        $this->session->set_userdata('num',$a['num']);;
    }
    else echo "-1";

}




/*添加方向题页*/
     public function d_page(){
        //载入分页类
        $this->load->library('pagination');
        $perPage=5;//每页4条
        //配置项设置
        $config['base_url']=site_url() .'/index/test_page/d_page';
      /*  $config['total_rows']=$this->db->count_all_results('paper');*/
        /*var_dump($config['total_rows']);*/
        $config['per_page']=$perPage;
        $config['uri_segment']=4;//偏移量，默认是3，如果在控制器有二级目录，根据偏移量层级而定
        //自定义配置
        $config['use_page_numbers'] = TRUE;
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

         $page = $offset=$this->uri->segment(4);
           if(empty($page)) { $page=1;  $offset = 0;}   //第一页 
             else   $offset = ($page-1)*4;//4是显示条数
           /* var_dump($offset);*/
            $this->load->model("paper","paper");
            $num = $this ->paper->d_num();
            $config['total_rows']=(int)$num;
                      /*var_dump( $config['total_rows']);*/
            $this->load->library('session');
            $type = $this->session->userdata('type');
           
            $data['sub'] = $this ->paper ->inf_d($type,$perPage,$offset);
    
        //传入配置项，并生成链接
        $this->pagination->initialize($config);
     
       
        
        //加载模型类和视图
     
      
        $this->load->view('index/test_add_d.html',$data);
    }


  
 



}

?>