<?php 
class khoa extends CI_Controller{
	public function index(){
		$session_admin = $this->session->userdata('id_admin');
		if(isset($session_admin)){
			$admin = $this->admin_models->infomation('tendangnhap',$session_admin);
			$data['khoa'] = $this->khoa_models->get();	
			foreach ($admin as $key) {
				$data['admin'] = $key->ten;
			}
			// $data['admin'] = 
			$this->load->view('daotao/khoa',$data);
		}else redirect('daotao/login');
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
				$this->load->view('daotao/khoa',$data);	
			}
			
		}else redirect('daotao/login');
		
	}
	public function delete($makhoa){
		$this->khoa_models->delete($makhoa);
		redirect('khoa');
	}
}


 ?>