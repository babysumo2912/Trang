<?php  
class home extends CI_Controller{
	function index(){
		$data = array();
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $admin = $this->admin_models->infomation('tendangnhap',$session_admin);
            foreach ($admin as $key) {
                $data['admin'] = $key->ten;
            } 
            $err = $this->session->flashdata('err');
            if(isset($err)){
            	$data['err'] = $err;
            }
            $search = $this->session->flashdata('check');
            if(isset($search)){
            	$data['search'] = $search;
            }
            $data['khoa'] = $this->khoa_models->get();
            $err_add = $this->session->flashdata('err_add');
            $add = $this->session->flashdata('add');
            if(isset($err_add)){
            	$data['err_add'] = $err_add;
            }
            $nhommonhoc = $this->session->flashdata('nhommonhoc');
            if($nhommonhoc){
            	$data['nhommonhoc'] = $nhommonhoc;
            }
            if(isset($add)){
            	$data['add'] = $add;
         	}
         	$nhom_full = $this->nhommonhoc_models->getall();
         	if($mh_full){
         		$data['nhom_full'] = $nhom_full;
         	}
        	$this->load->view('daotao/nhommonhoc/home',$data);     
        }else redirect('daotao/home/login');
	}
	function search(){
		$name = $this->input->post('name');
		if(isset($name)){
			$check = $this->nhommonhoc_models->search1($name);
			if($check){
				$this->session->set_flashdata('check',$check);
				redirect('daotao/nhommonhoc/home');
			}else{
				$err = "Không tìm thấy trong CSDL";
				$this->session->set_flashdata('err',$err);
				redirect('daotao/nhommonhoc/home');
			}
		}else redirect('daotao/monhoc/home');
	}
	function list_chuyennganh(){
		$makhoa = $this->input->post('makhoa');
		$chuyennganh = $this->home_models->get_info($makhoa,'makhoa','tb_nganh');
		if(count($chuyennganh)>0)
		{
			$pro_select_box = '';
			$pro_select_box .= '<option value="">Chọn bộ môn </option>';
			foreach ($chuyennganh as $province) {
				$pro_select_box .='<option value="'.$province->manganh.'">'.$province->tennganh.'</option>';
			}
			echo json_encode($pro_select_box);
		}
	}
	function add(){
		$hocki=$this->input->post('id_hocki')
		$malop = $this->input->post('malop');
		$nhommonhoc = $this->input->post('nhommonhoc');
		$mamh = $this->input->post('mamh');
		$magiaovien = $this ->input ->post('magiaovien');
		$siso = $this ->input ->post('siso');
		// echo $sotinchi;die();
		if(isset($mamh)&&isset($id_hocki)&&isset($malop)&&isset($mamh)&&isset($magiaovien)&&isset($siso)){
			$data_add = array(
				'id_hocki'=>$id_hocki,
				'malop'=>$malop,
				'mamh'=>$mamh,
				'magiaovien'=>$magiaovien,
				'siso'=>$siso,
			);
			$add = $this->nhommonhoc_models->add($data_add);
			if($add == false){
				$err_add = "Mã môn học bị trùng";
				$this->session->set_flashdata('err_add',$err_add);
				redirect('daotao/nhom monhoc/home');
			}else{
				$add = "Thêm dữ liệu thành công!";
				$this->session->set_flashdata('add',$add);
				redirect('daotao/monhoc/home');
			}
		}
	}
	function view($mamonhoc){
		 $data = array();
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $admin = $this->admin_models->infomation('tendangnhap',$session_admin);
            foreach ($admin as $key) {
                $data['admin'] = $key->ten;
            }
            $err = $this->session->flashdata('err');
            if(isset($err)){
            	$data['err'] = $err;
            }
            $nhommonhoc = $this->nhommonhoc_models->infomation($mamonhoc); 
            if($monhoc){
            	$this->session->set_flashdata('monhoc',$monhoc);
            }
        	redirect('daotao/monhoc/home');
        }else redirect('daotao/home/login');
	}
	function sua($mamonhoc){
		
		$tenmonhoc = $this->input->post('tenmonhoc');
		$sotinchi = $this->input->post('sotinchi');
		$maloai=$this->input->post('loai');
		$manganh = $this->input->post('manganh');
		if(isset($mamonhoc)&&isset($tenmonhoc)&&isset($manganh)&&isset($maloai)&&isset($sotinchi)){
			$data_add = array(
				'tenmonhoc'=>$tenmonhoc,
				'sotinchi'=>$sotinchi,
				'manganh'=>$manganh,
				'loai'=>$maloai,
			);
			$add = $this->monhoc_models->sua($mamonhoc,$data_add);
			redirect('daotao/monhoc/home/view/'.$mamonhoc);
			
		}else redirect('daotao/monhoc/home');
	}
	function xoa($mamonhoc){
		$data = array();
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $this->monhoc_models->xoa($mamonhoc);
            $err = "Xoa thanh cong!";
            $this->session->set_flashdata('err',$err);
        	redirect('daotao/monhoc/home');
        }else redirect('daotao/home/login');

	}

}


 ?>