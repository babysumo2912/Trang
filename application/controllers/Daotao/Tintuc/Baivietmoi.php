<?php 
class baivietmoi extends CI_Controller{
    function index(){
        $data = array();
        $err = $this->session->flashdata('err');
        if(isset($err)){
            $data['err']  =$err;
        }
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $admin = $this->admin_models->infomation('tendangnhap',$session_admin);
            $data['khoa'] = $this->khoa_models->get();
            foreach ($admin as $key) {
                $data['admin'] = $key->ten;
            }
            $this->load->view('daotao/tintuc/home',$data);
// $data['admin'] =

        }else redirect('daotao/home/login');
    }
    function add(){
        $tieude = $this->input->post('title');
        $danhmuc = $this->input->post('catalog');
        $noidung = $this->input->post('tintuc');
        if(isset($tieude) && isset($danhmuc)){
            $data = array(
                'tieude' => $tieude,
                'noidung' =>$noidung,
                'danhmuc'=>$danhmuc,
            );
        }
        $this->admin_models->themtintuc($data);
        $err = "Ban da dang bai viet thanh cong!";
        $this->session->set_flashdata('err',$err);
        redirect('Daotao/Tintuc/baivietmoi');
    }
}

?>