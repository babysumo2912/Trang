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
			$err = $this->session->flashdata('err');
			if(isset($err)){
				$data['err'] = $err;
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
		$data_hocki = $this->input->post('hocki');
		
		if(isset($nambatdau) && isset($namketthuc) && isset($data_hocki)){
			// echo $hk->nambatdau;die();
			// var_dump($hocki);die();
			$id_hocki = $this->home_models->hocki();
	        foreach ($id_hocki as $hk1) {};
	        // echo $hk1->id_hocki;die();
			if($hk1->id_hocki == ""){
				if($namketthuc - $nambatdau != 1){
					$err = "Vui lòng nhập dữ liệu cho đúng!";
					$this->session->set_flashdata('err',$err);
					redirect('daotao/home');
				}else{
					$data_hk = array(
					'tenhocki' => $data_hocki,
					'nambatdau' => $nambatdau,
					'namketthuc'=>$namketthuc,
					);
					$add = $this->home_models->add($data_hk);
					// redirect('daotao/home');
				}
			}else{
	        $hocki = $this->home_models->get_info($hk1->id_hocki,'id_hocki','tb_hocki');
	        foreach ($hocki as $hk) {};
			if($nambatdau!= $hk->nambatdau){
				if(($nambatdau!=$hk->namketthuc) || ($namketthuc - $nambatdau != 1)){
				$err = "Vui lòng nhập dữ liệu cho đúng!";
				$this->session->set_flashdata('err',$err);
				redirect('daotao/home');
				}else{
					$data_hk = array(
					'tenhocki' => $data_hocki,
					'nambatdau' => $nambatdau,
					'namketthuc'=>$namketthuc,
					);
					$add = $this->home_models->add($data_hk);
				}
			}else{
				if(($data_hocki!= $hk->tenhocki+1) || ($namketthuc - $nambatdau != 1) ){
				$err = "Vui lòng nhập dữ liệu cho đúng!";
				$this->session->set_flashdata('err',$err);
				redirect('daotao/home');
				}else{
					$data_hk = array(
					'tenhocki' => $data_hocki,
					'nambatdau' => $nambatdau,
					'namketthuc'=>$namketthuc,
					);
					$add = $this->home_models->add($data_hk);
				}
			}
		}
			if($add){
				foreach ($add as $hk2) {};
				$hocsinh = $this->sinhvien_models->getall();
				if($hocsinh){
					foreach ($hocsinh as $hs) {
						$data_add = array(
						'id_hocki' =>$hk2->id_hocki,
						'masinhvien'=>$hs->masinhvien,
						'diemrl'=>'0',
						);
						$add_diemrl = $this->home_models->add_diemrl($data_add);
					}
				}
			}
			
			
		}
		redirect('daotao/home');
	}
}


 ?>