<?php
class Home extends CI_Controller {
    public function index(){
    	$data = array();
    	$thongbao = $this->session->flashdata('in');
    	if(isset($thongbao)){
    		$data['thongbao'] = $thongbao;
    	}
        $session_sinhvien = $this->session->userdata('masinhvien');
		if(isset($session_sinhvien)){
			$data['sinhvien'] = $this->sinhvien_models->infomation($session_sinhvien);
		}
		$this->load->view('layout/home',$data);
    }
    public function logout(){
	$this->session->sess_destroy();
        redirect('home');	
	}
}
?>