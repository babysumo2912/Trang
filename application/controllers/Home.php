<?php
class Home extends CI_Controller {
    public function index(){
    	$data = array();
    	$thongbao = $this->session->flashdata('in');
    	if(isset($thongbao)){
    		$data['thongbao'] = $thongbao;
    	}
    	$tintucthongbao = $this->home_models->get_info('1','danhmuc','tb_tintuc');
    	if($tintucthongbao){
    	    $data['data_thongbao'] = $tintucthongbao;
        }
        $tintucmoi = $this->home_models->get_info('2','danhmuc','tb_tintuc');
        if($tintucmoi){
            $data['data_tintuc'] = $tintucmoi;
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
	function view($id_tintuc){
        $data = array();
        $tintuc = $this->home_models->get_info($id_tintuc,'id_tintuc','tb_tintuc');
        if($tintuc){
            $data['tintuc'] = $tintuc;
            $this->load->view('view',$data);
        }
    }
}
?>