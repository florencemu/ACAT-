<?php
class UeditorUp extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    /**
     * 百度编辑器唯一请求接口
     * @throws Exception
     */
    public function unifiedRequest () 
        {
        try 
        {
            $action = $this->input->get('action');
            $this->config->load('uploadconfig');//获取上传配置
            $config = $this->config->item('ueditor_upload');
            if(empty($config))
                throw new Exception(errorLang('62409'));if($action == 'config')
            {
                echo json_encode($config);
            }elseif(method_exists($this, $action))
            {
                $this->config->load('mimeconfig');
                $config['mimeType'] = $this->config->item('mime_type_conf');
                $result = $this->{$action}($config);
                echo json_encode($result);
　　　　　　　　}else
                throw new Exception(errorLang('62409'));
        } 
        catch (Exception $e) 
        {
            echo json_encode(array('state'=>$e->getMessage()));
        }
    }
    
    /**
     * 图片上传处理方法
     * @param array $config
     */
    public function imageUpload ($config)
    {
        $this->load->library('MyUploader');
        $config = $this->setConf($config, 'image');
        $this->myuploader->do_load($config['imageFieldName'], $config);
        return $this->myuploader->getFileInfo();
    }
     /**
      * 视频上传处理方法
      * @param array $config
      */
     public function videoUpload ($config)
     {
         $this->load->library('MyUploader');
         $config = $this->setConf($config, 'video');
         $this->myuploader->do_load($config['videoFieldName'], $config);
         return $this->myuploader->getFileInfo();
     }
    /**
     * 附件上传处理方法
     * @param array $config
     */
    public function filesUpload ($config)
    {
        $this->load->library('MyUploader');
        $config = $this->setConf($config, 'file');
        $this->myuploader->do_load($config['fileFieldName'], $config);
        return $this->myuploader->getFileInfo();
    }
    /**
     * 涂鸦图片上传处理方法
     * @param unknown $config
     */
    public function scrawlUpload ($config)
    {
        $this->load->library('MyUploader');
        $config = $this->setConf($config, 'scrawl', 'scrawl.png');
        $this->myuploader->do_load($config['scrawlFieldName'], $config, 'base64');
        return $this->myuploader->getFileInfo();
    }
    
    /**
     * 设置config
     * @param array     $config
     * @param string    $prefix
     * @param string    $oriName
     * @return array
     */
    private function setConf (array $config, $prefix, $oriName=NULL)
    {
        $config['maxSize']       =    array_key_exists($prefix.'MaxSize', $config) ? $config[$prefix.'MaxSize'] : $config['fileMaxSize'];
        $config['allowFiles']    =    array_key_exists($prefix.'AllowFiles', $config) ? $config[$prefix.'AllowFiles'] : $config['fileAllowFiles'];
        $config['pathFormat']    =    array_key_exists($prefix.'PathFormat', $config) ? $config[$prefix.'PathFormat'] : $config['filePathFormat'];
        empty($oriName) || $config['oriName'] = $oriName;
        return $config;
    }
    
}