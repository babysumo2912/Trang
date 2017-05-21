<?php 
class danhsachlophoc extends CI_Controller{
	function view($mamh,$nhommonhoc){
	    $data = array();
	    $data['mamh'] = $mamh;
	    $data['nhommonhoc'] = $nhommonhoc;
		 $session_sinhvien = $this->session->userdata('masinhvien');
		if(isset($session_sinhvien)){
		    $data['session_sv'] = $session_sinhvien;
			$data['sinhvien'] = $this->sinhvien_models->infomation($session_sinhvien);
            $danhsachsinhvien = $this->monhoc_models->getdanhsach($mamh,$nhommonhoc);
            if($danhsachsinhvien){
                $data['danhsachsinhvien'] = $danhsachsinhvien;
            }
		}else{
			$thongbao = "Bạn phải đăng nhập để thực hiện chức năng này!";
			$this->session->set_flashdata('in',$thongbao);
			redirect('home');
		}
		$this->load->view('layout/danhsachlophoc',$data);
	}
}

 ?>