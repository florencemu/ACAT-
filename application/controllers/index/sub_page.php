
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Sub_page extends CI_Controller {
  


 /*曾经成功调用create_links*/
 /* function index() {
    // load pagination class
    $this->load->library('pagination');
    $config['base_url'] = site_url() .'/index/subject';
    $config['total_rows'] = $this->db->count_all('subject');
    $config['per_page'] = 5;
    $config['uri_segment'] = 3;  // 表示第 3 段 URL 为当前页数，如 index.php/控制器/方法/页数，如果表示当前页的 URL 段不是第 3 段，请修改成需要的数值。
    $config['full_tag_open'] = '<p>';
    $config['full_tag_close'] = '</p>';
 
    $this->pagination->initialize($config);
                
    //load the model and get results
    $this->load->model('sub_all_p');
    $data=array('page'=>$this->pagination->create_links());
    $data['results'] = $this->sub_all_p->get_inf($config['per_page'],$this->uri->segment(3));
                
    // load the HTML Table Class
   /* $this->load->library('table');
    $this->table->set_heading('题号', '题型', '难度', '题目','答案','操作');*/
  //              
    // load the view
   /*  var_dump($data);
    $this->load->view('index/subject.html', $data);
  }
*/



/*前端无法调用create_links*/

  public function index(){
        //载入分页类
        $this->load->library('pagination');
        $perPage=4;//每页4条
        //配置项设置
        $config['base_url']=site_url() .'/index/sub_page';
        $config['total_rows']=$this->db->count_all_results('subject');
        $config['per_page']=$perPage;
        $config['uri_segment']=3;//偏移量，默认是3，如果在控制器有二级目录，根据偏移量层级而定
        //自定义配置
        $config['first_link']="首页";
        $config['prev_link']="上一页";
        $config['next_link']="下一页";
        $config['last_link']="尾页";
        //传入配置项，并生成链接
        $this->pagination->initialize($config);
        $data['links']=$this->pagination->create_links();
        var_dump($data['links']);
        //设置偏移量
        $offset=$this->uri->segment(3);
        $this->db->limit($perPage,$offset);
        //加载模型类和视图
        $this->load->model("sub_all_p","sub_all_p");
        $data['sub']=$this->sub_all_p->get_inf();
       /* var_dump($data['sub']);*/
        $this->load->view('index/subject.html',$data);
    }





}

?>