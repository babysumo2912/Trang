<?php 
/** 
* 
*/
class dangkimonhoc extends CI_Controller
{
	
	function index(){
		$data = array();
		$hocki = $this->home_models->hocki();
		foreach ($hocki as $hk) {};
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
		    $err = $this->session->flashdata('err');
		    if(isset($err)){
		        $data['err'] = $err;
            }
			$data['sinhvien'] = $this->sinhvien_models->infomation($session_sinhvien);
			$danhsachmonhoc_sinhvien = $this->sinhvien_models->danhsachmonhoc_hk($session_sinhvien,$hk->id_hocki);
			if($danhsachmonhoc_sinhvien){
			    $data['danhsachmonhoc_sinhvien'] = $danhsachmonhoc_sinhvien;
            }
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
		$hocki = $this->home_models->hocki();
        foreach ($hocki as $hk) {};
		if(isset($mamonhoc)){
			$search = $this->monhoc_models->search($mamonhoc,$hk->id_hocki);
			if($search){
				$this->session->set_flashdata('mamonhoc',$mamonhoc);
				$this->session->set_flashdata('in',$search);
				redirect('sinhvien/dangkimonhoc');
			}else{
				$err = "Khong tim thay mon hoc";
				$this->session->set_flashdata('err',$err);
				redirect('sinhvien/dangkimonhoc');
			}
		}
	}
	function add($masinhvien,$nhommonhoc,$mamh){
		$hocki = $this->home_models->hocki();
		foreach ($hocki as $hk) {};
	    $get_siso = $this->monhoc_models->get_allinfo($mamh,$nhommonhoc);

	    if($get_siso){
	        foreach ($get_siso as $row){};
        }
        $get_cl = $this->monhoc_models->getdanhsach($mamh,$nhommonhoc);
	    if($get_cl){
            $cl = count($get_cl);
        }
        if($row->siso - $cl <= 0){
            $err = "Lớp học đã hết chỗ để đăng kí";
            $this->session->set_flashdata('err',$err);
            redirect('sinhvien/dangkimonhoc');
        }
		$data_add = array(
			'id_hocki' => $hk->id_hocki,
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
	function delete($mamonhoc,$nhommonhoc,$masinhvien){
        $delete = $this->monhoc_models->delete($mamonhoc,$nhommonhoc,$masinhvien);
        if($delete){
            $err = "Xoá thành công!";
            $this->session->set_flashdata('err',$err);
            redirect('sinhvien/dangkimonhoc');
        }
    }
}

 ?>