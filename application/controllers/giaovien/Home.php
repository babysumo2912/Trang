<?php
class Home extends CI_Controller{
    public function index(){
        $data = array();
        $session_gv = $this->session->userdata('id_gv');
        if(isset($session_gv)){
            $gv = $this->giaovien_models->infomation($session_gv);
            $class = $this->giaovien_models->getclass($session_gv);
            if($gv){
                foreach ($gv as $key) {
                    $data['tengiaovien'] = $key->tengiaovien;
                }
            }
            if($class){
                $data['class'] = $class;
            }
            $this->load->view('giaovien/home',$data);
        }else redirect('giaovien/home/login');
    }
    public function login(){
        $data = array();
        $session_login = $this->session->userdata('id_gv');
        if(isset($session_login)){
            redirect('giaovien/home');
        }
        $user = $this->input->post('magiaovien');
        $password = $this->input->post('matkhau');
        if(isset($user) && isset($password)){
            $login = array(
                'magiaovien' => $user,
                'matkhau' => ($password),
            );
            $check_login = $this->giaovien_models->login($login);
            if($check_login == 1){
                $session = array(
                    'id_gv' => $user,
                );
                $this->session->set_userdata($session);

                redirect('giaovien/home');
            }else{
                if($check_login == 2){
                    $data['err'] = "Mật khẩu đăng nhập không chính xác!";
                }else{
                    if($check_login == 3){
                        $data['err'] = "Tài khoản chưa được đăng kí!";
                    }
                }
            }
        }
        $this->load->view('giaovien/login',$data);
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('giaovien/home');
    }
    public function diemsinhvien($mamonhoc,$nhommonhoc,$id_hocki){
        $check = $this->monhoc_models->getdanhsach($mamonhoc,$nhommonhoc,$id_hocki);
        if($check){
            $data['dssv'] = $check;
        }else{ $data['err'] = "Khong tim thay lop phu hop!"; }
        $this->load->view('giaovien/qlidiem',$data);
    }
}

?>