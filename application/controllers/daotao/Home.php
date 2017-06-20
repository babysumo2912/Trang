<?php 
class home extends CI_Controller{
	public function index(){
		$session_admin = $this->session->userdata('id_admin');
		if(isset($session_admin)){
			$admin = $this->admin_models->infomation('tendangnhap',$session_admin);
			$data['khoa'] = $this->khoa_models->get();	
			foreach ($admin as $key) {
				$data['admin'] = $key->ten;
			}
			// $data['admin'] = 
			$this->load->view('daotao/home',$data);
		}else redirect('daotao/home/login');
	}
	public function login(){
		$data = array();
		$user = $this->input->post('user');
		$pass = $this->input->post('password');
		if(isset($user) && isset($pass)){
			$login = array(
				'user' => $user,
				'password' => $pass,
				);
			$login = $this->admin_models->login($login);
			if($login == 1){
				$session = array(
					'id_admin'=> $user,
					);
				$this->session->set_userdata($session);
				redirect('daotao/home');
			}
		}
		$this->load->view('daotao/login',$data);
	}
	public function add(){
		$ten = $this->input->post('tenkhoa');
		$data = array('tenkhoa' => $ten);
		$add = $this->khoa_models->add($data);
		redirect('khoa');
	}
	public function update($makhoa){
		$session_admin = $this->session->userdata('id_admin');
		if(isset($session_admin)){
			$admin = $this->admin_models->infomation('tendangnhap',$session_admin);
			$data['khoa'] = $this->khoa_models->get();	
			$data['khoaup'] = $this->khoa_models->getinfo($makhoa);
			foreach ($admin as $key) {
				$data['admin'] = $key->ten;
			}
			$tenkhoa = $this->input->post('tenkhoa');
			if(isset($tenkhoa)){
				$update = array(
				'makhoa' => $makhoa,
				'tenkhoa' => $tenkhoa,
				);
				$end = $this->khoa_models->update($update);
				if($end){
					redirect('khoa');
				}
			}else{
				$this->load->view('daotao/khoa/home',$data);	
			}
			
		}else redirect('daotao/login');
		
	}
	public function delete($makhoa){
		$this->khoa_models->delete($makhoa);
		redirect('khoa');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('daotao/home');
	}
	public function add_hocki(){
		$nambatdau = $this->input->post('nambatdau');
		$namketthuc = $this->input->post('namketthuc');
		$hocki = $this->input->post('hocki');
		$data = array(
			'tenhocki' => $hocki,
			'nambatdau' => $nambatdau,
			'namketthuc'=>$namketthuc,
			);
		$this->home_models->add($data);
		redirect('daotao/home');
	}
}


 ?>