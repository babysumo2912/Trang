<?php
/**  
* 
*/
class home extends CI_Controller
{
	
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
            $sinhvien = $this->session->flashdata('sinhvien');
            if($sinhvien){
            	$data['sinhvien'] = $sinhvien;
            }
            if(isset($add)){
            	$data['add'] = $add;
         	}
         	$sinhvien_full = $this->sinhvien_models->getall();
         	if($sinhvien_full){
         		$data['sv_full'] = $sinhvien_full;
         	}
         	$err = $this->session->flashdata('err');
         	if(isset($err)){
         		$data['err'] = $err;
         	}
        	$this->load->view('daotao/sinhvien/home',$data);    
        }else redirect('daotao/home/login');
	}
	function search(){
		$name = $this->input->post('name');
		$malop = $this->input->post('malop');
		// echo $malop;die();	
		if(isset($name) && $malop!=''){
			// echo $malop;
			$check = $this->sinhvien_models->search($name,$malop);
			if($check){
				$this->session->set_flashdata('check',$check);
				redirect('daotao/sinhvien/home');
			}else{
				$err = "Không tìm thấy trong CSDL";
				$this->session->set_flashdata('err',$err);
				redirect('daotao/sinhvien/home');
			}
		}else redirect('daotao/sinhvien/home');
	}
	function list_chuyennganh(){
		$makhoa = $this->input->post('makhoa');
		$chuyennganh = $this->home_models->get_info($makhoa,'makhoa','tb_bomon');
		if(count($chuyennganh)>0)
		{
			$pro_select_box = '';
			$pro_select_box .= '<option value="">Chọn chuyên ngành</option>';
			foreach ($chuyennganh as $province) {
				$pro_select_box .='<option value="'.$province->mabomon.'">'.$province->tenbomon.'</option>';
			}
			echo json_encode($pro_select_box);
		}
	}
	function list_lop(){
		$mabomon = $this->input->post('mabomon');
		$lop = $this->home_models->get_info($mabomon,'mabomon','tb_lop');
		if(count($lop)>0)
		{
			$pro_select_box1 = '';
			$pro_select_box1 .= '<option value="">Chọn lớp</option>';
			foreach ($lop as $province) {
				$pro_select_box1 .='<option value="'.$province->malop.'">'.$province->tenlop.'</option>';
			}
			echo json_encode($pro_select_box1);
		}
	}
	function list_chuyennganh1(){
		$makhoa = $this->input->post('makhoa1');
		$chuyennganh = $this->home_models->get_info($makhoa,'makhoa','tb_bomon');
		if(count($chuyennganh)>0)
		{
			$pro_select_box = '';
			$pro_select_box .= '<option value="">Chọn chuyên ngành</option>';
			foreach ($chuyennganh as $province) {
				$pro_select_box .='<option value="'.$province->mabomon.'">'.$province->tenbomon.'</option>';
			}
			echo json_encode($pro_select_box);
		}
	}
	function list_lop1(){
		$mabomon = $this->input->post('mabomon1');
		$lop = $this->home_models->get_info($mabomon,'mabomon','tb_lop');
		if(count($lop)>0)
		{
			$pro_select_box1 = '';
			$pro_select_box1 .= '<option value="">Chọn lớp</option>';
			foreach ($lop as $province) {
				$pro_select_box1 .='<option value="'.$province->malop.'">'.$province->tenlop.'</option>';
			}
			echo json_encode($pro_select_box1);
		}
	}
	function list_chuyennganh2(){
		$makhoa = $this->input->post('makhoa2');
		$chuyennganh = $this->home_models->get_info($makhoa,'makhoa','tb_bomon');
		if(count($chuyennganh)>0)
		{
			$pro_select_box = '';
			$pro_select_box .= '<option value="">Chọn chuyên ngành</option>';
			foreach ($chuyennganh as $province) {
				$pro_select_box .='<option value="'.$province->mabomon.'">'.$province->tenbomon.'</option>';
			}
			echo json_encode($pro_select_box);
		}
	}
	function list_lop2(){
		$mabomon = $this->input->post('mabomon2');
		$lop = $this->home_models->get_info($mabomon,'mabomon','tb_lop');
		if(count($lop)>0)
		{
			$pro_select_box1 = '';
			$pro_select_box1 .= '<option value="">Chọn lớp</option>';
			foreach ($lop as $province) {
				$pro_select_box1 .='<option value="'.$province->malop.'">'.$province->tenlop.'</option>';
			}
			echo json_encode($pro_select_box1);
		}
	}
	function add(){
		$msv = $this->input->post('masinhvien');
		$tensv = $this->input->post('tensinhvien');
		$gioitinh = $this->input->post('giotinh');
		$mk= $this->input->post('matkhau');
		$malop = $this->input->post('malop');
		$ngaysinh = $this ->input ->post('ngaysinh');
		$quequan =$this->input->post('quequan');
		$tinhtrang=$this->input->post('tinhtrang');
		// echo $sotinchi;die();
		if(isset($msv)&&isset($tensv)&&isset($malop)&&isset($mk)&&isset($gioitinh)&&isset($ngaysinh)&&isset($quequan)&&isset($tinhtrang)){
			$data_add = array(
				'masinhvien'=>$msv,
				'tensinhvien'=>$tensv,
				'matkhau'=>$mk,
				'phai'=>$gioitinh,
				'ngaysinh'=>$ngaysinh,
				'quequan'=>$quequan,
				'malop'=>$malop,
				'tinhtrang'=>$tinhtrang,
			);
			$add = $this->sinhvien_models->add($data_add);
			if($add == false){
				$err_add = "Mã sinh viên bị trùng";
				$this->session->set_flashdata('err_add',$err_add);
				redirect('daotao/sinhvien/home');
			}else{
				$add = "Thêm mới sinh viên thành công!";
				$this->session->set_flashdata('add',$add);
				redirect('daotao/sinhvien/home');
			}
		}else echo 2;
	}
	function view($masinhvien){
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
            $sinhvien = $this->sinhvien_models->infomation($masinhvien);
            if($sinhvien){
            	$this->session->set_flashdata('sinhvien',$sinhvien);
            }
        	redirect('daotao/sinhvien/home');
        }else redirect('daotao/home/login');
	}
	function sua($masinhvien){
		
		$tensv = $this->input->post('tensinhvien');
		$mk=$this->input->post('matkhau');
		$malop=$this->input->post('malop');
		$phai = $this->input->post('phai');
		$ngaysinh = $this->input->post('ngaysinh');
		$quequan = $this->input->post('quequan');
		$tinhtrang = $this->input->post('tinhtrang');
		// echo $malop;die();
		if(isset($tensv)&&isset($mk)&&isset($phai)&&isset($ngaysinh)&&isset($quequan)&&isset($tinhtrang) && $malop!=''){
			$data_add = array(
				'tensinhvien'=>$tensv,
				'matkhau'=>$mk,
				'malop'=>$malop,
				'phai'=>$phai,
				'ngaysinh'=>$ngaysinh,
				'quequan'=>$quequan,
				'tinhtrang'=>$tinhtrang,
			);
			$add = $this->sinhvien_models->sua($data_add,$masinhvien);
			$err ="Sửa thông tin sinh viên thành công!";
			$this->session->set_flashdata('err',$err);
			redirect('daotao/sinhvien/home');
			
		}else 
		{
			$err = "Sửa thất bại";
			$this->session->set_flashdata('err',$err);
		redirect('daotao/sinhvien/home');
		}
	}
	function delete($masinhvien){
		$data = array();
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $this->sinhvien_models->delete($masinhvien);
            $err = "Xoa thanh cong!";
            $this->session->set_flashdata('err',$err);
        	redirect('daotao/sinhvien/home');
        }else redirect('daotao/home/login');

	}
  }
 ?> 
