<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Gra_sel_page extends CI_Controller {
  



/*可实现分页*/

  public function page(){
        //载入分页类
        $this->load->library('pagination');
        $perPage=10;//每页4条
        //配置项设置
        $config['base_url']=site_url() .'/index/gra_sel_page/page?';
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
        $group = $this->input->get('group');
        $major = $this ->input->get('major');
        $name = $this->input->get('name');
        $page = $this->input->get('page'); 
        $this->load->model("grades","grades");


        if(empty($offset)) $offset = 0;

//检索姓名
        if(!($group)&&!($major)) {
                 $config['base_url'].="name=".$name;
            if(!$page) $page=1;   //第一页 
                $offset = ($page-1)*10;//4是显示条数
            $num = $this ->grades ->seek_out_name_num($name);
            $config['total_rows']=(int)$num;
            $data['grades'] = $this ->grades ->seek_out_name($name,$perPage,$offset);

        }

//检索班级   
        else if(!($group)&&!($name)){
            
             $config['base_url'].="major=".$major;
            if(!$page) $page=1;   //第一页 
                $offset = ($page-1)*10;//4是显示条数
            $num = $this ->grades ->seek_out_major_num($major);
            $config['total_rows']=(int)$num;
            $data['grades'] = $this ->grades ->seek_out_major($major,$perPage,$offset);

          
               }


//检索组别
        else if(!($name)&&!($major)){
            $config['base_url'].="group=".$group;
                   switch ($group) {
                    case '1': $group= 'PHP';break;
                    case '2': $group= '前端';break;
                    case '3': $group= 'JAVA';break;
                    case '4': $group= 'Python';break;
                    default : error("请选择组别！");
                    }
            if(!$page) $page=1;   //第一页 
                $offset = ($page-1)*10;//4是显示条数
            $num = $this ->grades ->seek_out_group_num($group);
            $config['total_rows']=(int)$num;
            /*var_dump( $config['total_rows']);*/
            $data['grades'] = $this ->grades ->seek_out_group($group,$perPage,$offset);
               }


//检索全部
        else if($major&&$group){
             $config['base_url'].="major=".$major."&group=".$group;
             switch ($group) {
                     case '1': $group= 'PHP';break;
                    case '2': $group= '前端';break;
                    case '3': $group= 'JAVA';break;
                    case '4':$group= 'Python';break;
                    }
             if(!$page) $page=1;   //第一页 
                $offset = ($page-1)*10;//4是显示条数
            $num = $this ->grades ->seek_out_num($group,$major);
            $config['total_rows']=(int)$num;
            /*var_dump( $config['total_rows']);*/
            $data['grades'] = $this ->grades ->seek_out_all($group,$major,$perPage,$offset);
               }


        
         //传入配置项，并生成链接
      
        $this->pagination->initialize($config);
        $data['links']=$this->pagination->create_links();
    
        //加载模型类和视图
      
        $this->load->view('index/grade.html',$data);
    }

}





?>

