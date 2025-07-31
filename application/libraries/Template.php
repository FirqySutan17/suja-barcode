<?php
class Template{
    protected $CI;
    
    function __construct(){
        $this->CI = &get_instance();
    }
    
    function _v($file,$data=array(),$header=TRUE){
        $this->theme = 'admin/';
        $data['sidebar_menu'] = $this->CI->load->view('admin/template/sidebar', NULL, TRUE);
        $this->CI->load->view('admin/template/header',$data);

        unset($data['sidebar_menu']);
        $this->CI->load->view('admin/'.$file,$data);
        $this->CI->load->view('admin/template/footer',$data);
    }

    function _vFront($file,$data=array(),$header=TRUE){
        $this->theme = 'file_manager/';
        $this->CI->load->view('file_manager/template/header',$data);
        $this->CI->load->view('file_manager/'.$file,$data);
        $this->CI->load->view('file_manager/template/footer',$data);
    }
}