<?php
class xemdiem extends CI_Controller{
    function index(){
        $session_sinhvien = $this->session->userdata('masinhvien');
        if(isset($session_sinhvien)){
            $data['sinhvien'] = $this->sinhvien_models->infomation($session_sinhvien);
            $danhsachmonhoc_sinhvien = $this->sinhvien_models->full_hocki($session_sinhvien);
            if($danhsachmonhoc_sinhvien){
                // var_dump($danhsachmonhoc_sinhvien);
                $data['danhsachmonhoc_sinhvien'] = $danhsachmonhoc_sinhvien;
            }else echo 2;
        }else{
            $thongbao = "Bạn phải đăng nhập để thực hiện chức năng này!";
            $this->session->set_flashdata('in',$thongbao);
            redirect('home');
        }
        // echo $session_sinhvien;
        $this->load->view('layout/xemdiem',$data);
    }
}
?>