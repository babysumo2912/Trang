<?php
class Lop extends CI_Controller {
    public function view($mabomon){
        $data = array();
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $admin = $this->admin_models->infomation('tendangnhap',$session_admin);
            foreach ($admin as $key) {
                $data['admin'] = $key->ten;
            }
            $err_add = $this->session->flashdata('erradd');
            if(isset($err_add)){
                $data['err_add'] = $err_add;
            }
            $data_lop = $this->lop_models->get($mabomon);
            if($data_lop == "err"){
                $data['err'] = "Bộ môn mà bạn chọn không có trong CSDL! Vui lòng kiểm tra lại";
                $this->load->view('daotao/khoa/lop',$data);
                die();
            }
            if($data_lop){
                $data['lop'] = $data_lop;
            }else $data['lop'] = array();
            $data_bomon = $this->chuyennganh_models->getinfo('mabomon',$mabomon);
            if($data_bomon){
                foreach ($data_bomon as $dtbm){};
                $data['bomon'] = $dtbm->tenbomon;
            }
            $data_giaovien = $this->giaovien_models->get_bomon($mabomon);
            if($data_giaovien){
                $data['giaovien'] = $data_giaovien;
            }
            $data['mabomon'] = $mabomon;
            $this->load->view('daotao/khoa/lop',$data);
        }else redirect('daotao/home/login');
    }
    public function add($mabomon){
        $data = array();
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $gvcn = $this->input->post('magiaovien');
            $k = $this->input->post('k');
            if(isset($gvcn) && isset($k)){
                $data_bomon = $this->chuyennganh_models->getinfo('mabomon',$mabomon);
                if($data_bomon){
                    foreach ($data_bomon as $dtbm){};
                }
                $khoa = $this->khoa_models->get_khoa($mabomon);
                if($khoa){
                    foreach ($khoa as  $kh){};
                    $makhoa = $kh->makhoa;
                }
                $tenlop = $dtbm->tenbomon.' K'.$k;
                $malop = "DC".$makhoa.$mabomon.$k;
                $data_add = array(
                    'mabomon' => $mabomon,
                    'k'=>$k,
                    'malop'=>$malop,
                    'tenlop' => $tenlop,
                    'magiaovien' => $gvcn,
                );
                $add = $this->lop_models->add($data_add);
                if($add){
                    redirect('daotao/khoa/lop/view/'.$mabomon);
                }else{
                    $err = "Mã lớp đã bị trùng! Vui lòng thêm tiền tố A, B, C vào trường khóa!";
                    $this->session->set_flashdata('erradd',$err);
                    redirect('daotao/khoa/lop/view/'.$mabomon);
                }
            }
        }else redirect('daotao/home/login');

    }
    public function delete($malop,$mabomon){
        $this->lop_models->delete($malop);
        redirect('daotao/khoa/lop/view/'.$mabomon);
    }
    public function dsach($malop){
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
        $this->load->view('daotao/khoa/dsachsv',$data);
        }
    }
}

?>