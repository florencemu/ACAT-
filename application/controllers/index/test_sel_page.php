<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Test_sel_page extends CI_Controller {
  



/*可实现分页*/

  public function page(){
        //载入分页类
        $this->load->library('pagination');
        $perPage=10;//每页4条
        //配置项设置
        $config['base_url']=site_url() .'/index/test_sel_page/page?';
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
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
       
        $page = $this->input->get('page'); 
        $this->load->model("paper","paper");


        if(empty($offset)) $offset = 0;
            
         $config['base_url'].="type=".$type;
                   switch ($type) {
                    case '0': error("请选择你要检索的试卷类型！");break;
                    case '1': $type= 'PHP';break;
                    case '2': $type= '前端';break;
                    case '3': $type= 'JAVA';break;
                    case '4':$type= 'Python';break;
                    }
            if(empty($page)) $page=1;   //第一页 
             else   $offset = ($page-1)*10;//4是显示条数
            $num = $this ->paper ->seek_out_type_num($type);
            $config['total_rows']=(int)$num;
    
            $data['test'] = $this ->paper ->seek_out_type($type,$perPage,$offset);
          /*  var_dump($data);  */
          
         //传入配置项，并生成链接
      
        $this->pagination->initialize($config);
      /*  $data['links']=$this->pagination->create_links();*/
    
        //加载模型类和视图
      
        $this->load->view('index/test.html',$data);
    }


/*检索基础题*/
 public function b_sel(){
        //载入分页类
        $this->load->library('pagination');
        $perPage=4;//每页4条
        //配置项设置
        $config['base_url']=site_url() .'/index/test_sel_page/b_sel?';
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
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
        $diff = $this->input->get('diff');  
        $page = $this->input->get('page'); 



        if(empty($offset)) $offset = 0;
            
         $config['base_url'].="diff=".$diff;
            if(!($diff)) error("请选择试题难度！");
            if(empty($page)) $page=1;   //第一页 
             else   $offset = ($page-1)*4;//4是显示条数
             $this->load->model("paper","paper");
            $num = $this ->paper ->diff_num($diff);
            $config['total_rows']=(int)$num;
            $data['sub'] = $this ->paper->b_sel($diff,$perPage,$offset);
          /*  var_dump($data);  */
          
         //传入配置项，并生成链接
      
        $this->pagination->initialize($config);
      /*  $data['links']=$this->pagination->create_links();*/
    
        //加载模型类和视图
      
        $this->load->view('index/test_add_b.html',$data);
    }

 
/*检索方向题*/
 public function d_sel(){
        //载入分页类
        $this->load->library('pagination');
        $perPage=4;//每页4条
        //配置项设置
        $config['base_url']=site_url() .'/index/test_sel_page/d_sel?';
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
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
        $diff = $this->input->get('diff');
        $page = $this->input->get('page'); 
        $this->load->model("paper","paper");

        if(empty($offset)) $offset = 0;
        if(!($type)&&!($diff)) error("请选择你要查询的信息！");

        else if (!($diff)&&$type) 
            {   
                 $config['base_url'].="type=".$type;
                switch ($type) {
                    case '1': $type= 'PHP';break;
                    case '2': $type= '前端';break;
                    case '3': $type= 'JAVA';break;
                    case '4':$type= 'Python';break;
            
                        }
            if(empty($page)) $page=1;   //第一页 
             else   $offset = ($page-1)*4;//4是显示条数
            $num = $this ->paper ->type_num($type);
            $config['total_rows']=(int)$num;
            $data['sub'] = $this ->paper ->d_sel($type,$perPage,$offset);
                }
        else if (!($type)&&($diff) ){
            $config['base_url'].="diff=".$diff;        
             if(empty($page)) $page=1;   //第一页 
             else   $offset = ($page-1)*4;//4是显示条数
            $num = $this ->paper ->diff_num_d($diff);
            $config['total_rows']=(int)$num;
            $data['sub'] = $this ->paper ->diff_sel_d($diff,$perPage,$offset);
                }

        else if ($diff&&$type) 
            {
                $config['base_url'].="type=".$type."&"."diff=".$diff;
                switch ($type) {
                
                    case '1': $type= 'PHP';break;
                    case '2': $type= '前端';break;
                    case '3': $type= 'JAVA';break;
                    case '4':$type= 'Python';break;
                }
              if(empty($page)) $page=1;   //第一页 
             else   $offset = ($page-1)*4;//4是显示条数
            $num = $this ->paper ->num_d($diff,$type);
            $config['total_rows']=(int)$num;
            $data['sub'] = $this ->paper ->all_sel($type,$diff,$perPage,$offset);
            }
          





         //传入配置项，并生成链接
      
        $this->pagination->initialize($config);
      /*  $data['links']=$this->pagination->create_links();*/
    
        //加载模型类和视图
      
        $this->load->view('index/test_add_d.html',$data);
    }


}





?>

