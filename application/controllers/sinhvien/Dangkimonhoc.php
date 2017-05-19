<?php 
/**
* 
*/
class dangkimonhoc extends CI_Controller
{
	
	function index(){
		$data = array();
		$search = $this->session->flashdata('in');
		$mamonhoc = $this->session->flashdata('mamonhoc');
		$err = $this->session->flashdata('err');
		if(isset($err)){
			$data['err'] = $err;
		}
		if(isset($mamonhoc)){
			$data['mamonhoc'] = $mamonhoc;
		}
		if(isset($search)){
			$data['search'] = $search;
		}
        $session_sinhvien = $this->session->userdata('masinhvien');
		if(isset($session_sinhvien)){
			$data['sinhvien'] = $this->sinhvien_models->infomation($session_sinhvien);
			$data['danhsachmonhoc_sinhvien'] = $this->sinhvien_models->danhsachmonhoc($session_sinhvien);
		}else{
			$thongbao = "Bạn phải đăng nhập để thực hiện chức năng này!";
			$this->session->set_flashdata('in',$thongbao);
			redirect('home');
		}
		// echo $session_sinhvien;
		$this->load->view('layout/dangkimonhoc',$data);
	}
	function search(){
		$mamonhoc = $this->input->post('mamonhoc');
		if(isset($mamonhoc)){
			$search = $this->monhoc_models->search($mamonhoc);
			if($search){
				$this->session->set_flashdata('mamonhoc',$mamonhoc);
				$this->session->set_flashdata('in',$search);
				redirect('sinhvien/dangkimonhoc');
			}
		}
	}
	function add($masinhvien,$nhommonhoc,$mamh){
		$data_add = array(
			'mamh' => $mamh,
			'nhommonhoc' => $nhommonhoc,
			'masinhvien' => $masinhvien,
			);
		$add = $this->monhoc_models->add($data_add);
		if($add == 0){
			$err = "Bạn đã đăng kí môn học này rồi!";
			$this->session->set_flashdata('err',$err);
			redirect('sinhvien/dangkimonhoc');
		}else{
			if($add == 1){
				redirect('sinhvien/dangkimonhoc');
			}
		}

	}
}

 ?>