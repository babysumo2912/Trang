<?php 
class xemdiem extends CI_Controller{
    function index(){
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
        $this->load->view('layout/xemdiem',$data);
    }
    function full(){
        $session_sinhvien = $this->session->userdata('masinhvien');
        if(isset($session_sinhvien)){
            $data['sinhvien'] = $this->sinhvien_models->infomation($session_sinhvien);
            $danhsachmonhoc_sinhvien = $this->sinhvien_models->full_hocki($session_sinhvien);
            if($danhsachmonhoc_sinhvien){
                // var_dump($danhsachmonhoc_sinhvien);
                $data['danhsachmonhoc_sinhvien'] = $danhsachmonhoc_sinhvien;
            }else $data['danhsachmonhoc_sinhvien']='';
        }else{
            $thongbao = "Bạn phải đăng nhập để thực hiện chức năng này!";
            $this->session->set_flashdata('in',$thongbao);
            redirect('home');
        }
        // echo $session_sinhvien;
        $this->load->view('layout/xemdiemfull',$data);
    }
    function hocki(){
        $session_sinhvien = $this->session->userdata('masinhvien');
        if(isset($session_sinhvien)){
            $hocki = $this->input->post('hocki');
            $year = substr($hocki,0,4);
            $hk = substr($hocki,4,1);
            $id_hocki = $this->sinhvien_models->hocki($hk,$year);
            if($id_hocki){
                foreach ($id_hocki  as $idhk) {}
                $hockic = $idhk->id_hocki;
            }else{
                $hocki = $this->home_models->hocki();
                foreach ($hocki as $hk) {};
                $hockic = $hk->id_hocki;
            }
            $data['sinhvien'] = $this->sinhvien_models->infomation($session_sinhvien);
            $danhsachmonhoc_sinhvien = $this->sinhvien_models->danhsachmonhoc_hk($session_sinhvien,$hockic);
            if($danhsachmonhoc_sinhvien){
                // var_dump($danhsachmonhoc_sinhvien);
                $data['danhsachmonhoc_sinhvien'] = $danhsachmonhoc_sinhvien;
            }else {$data['danhsachmonhoc_sinhvien'] = '';$data['err_timhk'] = "Không tìm thấy dữ liệu!";}
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