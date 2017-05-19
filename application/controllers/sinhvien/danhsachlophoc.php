<?php 
class danhsachlophoc extends CI_Controller{
	function view($mamh,$nhommonhoc){
		 $session_sinhvien = $this->session->userdata('masinhvien');
		if(isset($session_sinhvien)){
			$data['sinhvien'] = $this->sinhvien_models->infomation($session_sinhvien);

		}else{
			$thongbao = "Bạn phải đăng nhập để thực hiện chức năng này!";
			$this->session->set_flashdata('in',$thongbao);
			redirect('home');
		}
		// echo $session_sinhvien;
		$this->load->view('layout/danhsachlophoc',$data);
	}
}

 ?>