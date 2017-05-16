<?php 
class daotao extends CI_Controller{
	public function index(){
		$session_admin = $this->session->userdata('id_admin');
		if(isset($session_admin)){
			$admin = $this->admin_models->infomation('tendangnhap',$session_admin);
			foreach ($admin as $key) {
				$data['admin'] = $key->ten;
			}
			// $data['admin'] = 
			$this->load->view('daotao/home',$data);
		}else redirect('daotao/login');

	}
	public function login(){
		$data = array();
		$session_login = $this->session->userdata('id_admin');
		if(isset($session_login)){
			redirect('daotao');
		}
		$user = $this->input->post('user');
		$password = $this->input->post('password');
		if(isset($user) && isset($password)){
			$login = array(
				'user' => $user,
				'password' => $password,
				);
			$check_login = $this->admin_models->login($login);
			if($check_login == 1){
				$session = array(
					'id_admin' => $user,
					);
				$this->session->set_userdata($session);
				redirect('daotao');
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
		$this->load->view('daotao/login',$data);
	}
}

 ?>