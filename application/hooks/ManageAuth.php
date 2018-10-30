<?php /** * * 后台权限拦截钩子 * @link http://www.php-chongqing.com * @author bing.peng *  */
class ManageAuth 
{    
	private $CI;            
	public function __construct() {        
		$this->CI = &get_instance();     
	}            


/**     * 权限认证     */    

	public function auth() {        
	$this->CI->load->helper('url');        
		if (preg_match("/index.*/i", uri_string()) ) {        
		// 需要进行权限检查的URL            
		$this->CI->load->library('session');
			if(!$this->CI->session->userdata('user'))
			{        // 用户未登陆                
		//		success('','抱歉您没有访问权限;');        
			}       
		}            
	}        
}

	?>
