<?php 
class taikhoan extends CI_Controller{
	public function index(){
		$session_sinhvien = $this->session->userdata('masinhvien');
		if(isset($session_sinhvien)){
			echo 1;
		}else redirect('taikhoan/login');

	}
	public function login(){
		$data = array();
		$session_login = $this->session->userdata('id_user');
		if(isset($session_login)){
			redirect('home');
		}
		$user = $this->input->post('user');
		$password = $this->input->post('password');
		if(isset($user) && isset($password)){
			$login = array(
				'user' => $user,
				'password' => ($password),
				);
			$check_login = $this->sinhvien_models->login($login);
			if($check_login == 1){
				$session = array(
					'masinhvien' => $user,
					);
				$this->session->set_userdata($session);
				redirect('home');
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
		$this->load->view('layout/login',$data);
	}
}
 ?>
