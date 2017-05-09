<?php
class tuyendung extends CI_Controller{
    function index(){
        $data['title'] = "Tuyển dụng lao động Nhật Bản 2017 - japan.com";
        $this->load->view('tuyendung', $data);
    }
}
 ?>