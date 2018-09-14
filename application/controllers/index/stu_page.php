<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Stu_page extends CI_Controller {
  

/*可实现分页*/

  public function page(){
        //载入分页类
        $this->load->library('pagination');
        $perPage=5;//每页4条
        //配置项设置
        $config['base_url']=site_url() .'/index/sub_page/page';
        $config['total_rows']=$this->db->count_all_results('student_info');
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
        $data['links']=$this->pagination->create_links();
        /*var_dump($data['links']);*/
        //设置偏移量
        $offset=$this->uri->segment(4);
        /*var_dump($offset);*/
        $this->db->limit($perPage,$offset);
        //加载模型类和视图
        $this->load->model("students","students");
        $data['stu']=$this->students->sel();
       /* var_dump($data['sub']);*/
        $this->load->view('index/student.html',$data);
    }



  
 



}

?>