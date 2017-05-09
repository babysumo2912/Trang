<?php
class Home extends CI_Controller {
    public function index(){
        $data['title'] = "Xuất khẩu lao động Nhật Bản | Không phí môi giới 2017";
        $this->load->view('layout/home', $data);
    }
}
?>