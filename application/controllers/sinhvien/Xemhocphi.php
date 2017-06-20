<?php
class xemhocphi extends CI_Controller{
    function index(){
        $session_sinhvien = $this->session->userdata('masinhvien');
        $hocki = $this->home_models->hocki();
        foreach ($hocki as $hk) {};
        if(isset($session_sinhvien)){
            $data['sinhvien'] = $this->sinhvien_models->infomation($session_sinhvien);
            $danhsachmonhoc_sinhvien = $this->sinhvien_models->danhsachmonhoc_hk($session_sinhvien,$hk->id_hocki);
            if($danhsachmonhoc_sinhvien){
                $data['danhsachmonhoc_sinhvien'] = $danhsachmonhoc_sinhvien;
            }
        }else{
            $thongbao = "Bạn phải đăng nhập để thực hiện chức năng này!";
            $this->session->set_flashdata('in',$thongbao);
            redirect('home');
        }
        // echo $session_sinhvien;
        $this->load->view('layout/xemhocphi',$data);
    }
}
?>