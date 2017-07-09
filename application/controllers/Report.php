<?php 
class Report extends CI_Controller
{
	function report_ds($malop){
		// echo $malop;die();
		$data = array();
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $admin = $this->admin_models->infomation('tendangnhap',$session_admin);
            foreach ($admin as $key) {
                $data['admin'] = $key->ten;
            }
        // $data = array();
        $tenlop = $this->home_models->get_info($malop,'malop','tb_lop');
        if($tenlop){
            $data['tenlop'] = $tenlop;
        }
        $data1 = $this->lop_models->get_dsachsv($malop);
        if($data1){
            $data['data1'] = $data1;
        }
        $data['malop'] = $malop;
		$this->load->library('pdf');
		$this->load->view('report',$data);
        }
	}
    function report_sv(){
        $session_sinhvien = $this->session->userdata('masinhvien');
        $hocki = $this->home_models->hocki();
        foreach ($hocki as $hk) {};
        if(isset($session_sinhvien)){
            $data['sinhvien'] = $this->sinhvien_models->infomation($session_sinhvien);
            $danhsachmonhoc_sinhvien = $this->sinhvien_models->danhsachmonhoc_hk($session_sinhvien,$hk->id_hocki);
            if($danhsachmonhoc_sinhvien){
                // var_dump($danhsachmonhoc_sinhvien);
                $data['danhsachmonhoc_sinhvien'] = $danhsachmonhoc_sinhvien;
            }else $data['danhsachmonhoc_sinhvien'] = '';
        }else{
            $thongbao = "Bạn phải đăng nhập để thực hiện chức năng này!";
            $this->session->set_flashdata('in',$thongbao);
            redirect('home');
        }
        // echo $session_sinhvien;
        $this->load->library('pdf') ;
        $this->load->view('report_sv',$data);
    }
}


 ?>