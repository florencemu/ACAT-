
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



/*可实现分页*/

  public function page(){
        //载入分页类
        $this->load->library('pagination');
        $perPage=4;//每页4条
        //配置项设置
        $config['base_url']=site_url() .'/index/sub_page/page';
        $config['total_rows']=$this->db->count_all_results('subject');
        $config['per_page']=$perPage;
        $config['uri_segment']=4;//偏移量，默认是3，如果在控制器有二级目录，根据偏移量层级而定
        //自定义配置
        $config['first_link']="首页";
        $config['prev_link']="上一页";
        $config['next_link']="下一页";
        $config['last_link']="尾页";
        //传入配置项，并生成链接
        $this->pagination->initialize($config);
        $data['links']=$this->pagination->create_links();
        /*var_dump($data['links']);*/
        //设置偏移量
        $offset=$this->uri->segment(4);
        $this->db->limit($perPage,$offset);
        //加载模型类和视图
        $this->load->model("sub_all_p","sub_all_p");
        $data['sub']=$this->sub_all_p->get_inf();
       /* var_dump($data['sub']);*/
        $this->load->view('index/subject.html',$data);
    }



    /*好看的分页*/
   /*public  function page($num = '') {
        $this->load->library('pagination'); // 加载分页类
        $config['base_url'] = site_url() .'/index/sub_page/page'; // 分页的基础 URL
        $config['total_rows'] = $this->db->count_all_results('subject'); // 统计数量
        $config['per_page'] = 2; // 每页显示数量，为了能有更好的显示效果，我将该数值设置得较小
        $config['num_links'] = 3; // 当前连接前后显示页码个数
        //$config['full_tag_open'] = ''; // 分页开始样式
        //$config['full_tag_close'] = ''; // 分页结束样式
        $config['first_link'] = '首页'; // 第一页显示
        $config['last_link'] = '末页'; // 最后一页显示
        $config['next_link'] = '下一页 >'; // 下一页显示
        $config['prev_link'] = '< 上一页'; // 上一页显示
        $config['cur_tag_open'] = ' <a class="current">'; // 当前页开始样式
        $config['cur_tag_close'] = '</a>'; // 当前页结束样式
        $this->pagination->initialize($config); // 配置分页
        $data['post'] = $this->sub_all_p->get('front', $config['per_page'], $num); // 获取前分页数据
        $data['page'] = array(
                'total' => $config['total_rows'],
                'num' => $config['per_page'],
                'page' => (int) (($config['total_rows'] % $config['per_page'] === 0) ? ($config['total_rows'] / $config['per_page']) : ($config['total_rows'] / $config['per_page'] + 1)),
                'current' => ($num + 1) . '~' . ($num + $data['post']->num_rows)
        );
}*/
 



}

?>