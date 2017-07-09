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
            $giaovien = $this->session->flashdata('giaovien');
            if($giaovien){
            	$data['giaovien'] = $giaovien;
            }
            if(isset($add)){
            	$data['add'] = $add;
         	}
         	$giaovien_full = $this->giaovien_models->getall();
         	if($giaovien_full){
         		$data['gv_full'] = $giaovien_full;
         	}
        	$this->load->view('daotao/giaovien/home',$data);    
        }else redirect('daotao/home/login');
	}
	function search(){
		$name = $this->input->post('name');
		if(isset($name)){
			$check = $this->giaovien_models->search($name);
			if($check){
				$this->session->set_flashdata('check',$check);
				redirect('daotao/giaovien/home');
			}else{
				$err = "Không tìm thấy trong CSDL";
				$this->session->set_flashdata('err',$err);
				redirect('daotao/giaovien/home');
			}
		}else redirect('daotao/giaovien/home');
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

	function list_bomon(){
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

	function list_lop(){
		$mabomon = $this->input->post('mabomon');
		$lop = $this->home_models->get_info($mabomon,'mabomon','tb_lop');
		if(count($lop)>0)
		{
			$pro_select_box1 = '';
			$pro_select_box1 .= '<option value="">Chọn chuyên ngành</option>';
			foreach ($lop as $province) {
				$pro_select_box1 .='<option value="'.$province->malop.'">'.$province->tenlop.'</option>';
			}
			echo json_encode($pro_select_box1);
		}
	}
	function add(){
		$magiaovien = $this->input->post('magiaovien');
		$tengiaovien = $this->input->post('tengiaovien');
		$mabomon = $this->input->post('manganh');
		$matkhau= $this ->input->post('matkhau');
		if(isset($magiaovien)&&isset($tengiaovien)&&isset($mabomon)&&isset($matkhau)){
			$data_add = array(
				'magiaovien'=>$magiaovien,
				'tengiaovien'=>$tengiaovien,
				'manganh'=>$mabomon,
				'matkhau'=>$matkhau,
			);
			$add = $this->giaovien_models->add($data_add);
			if($add == false){
				$err_add = "Mã giáo viên bị trùng";
				$this->session->set_flashdata('err_add',$err_add);
				redirect('daotao/giaovien/home');
			}else{
				$add = "Thêm dữ liệu thành công!";
				$this->session->set_flashdata('add',$add);
				redirect('daotao/giaovien/home');
			}
		}
	}
	function view($magiaovien){
		 $data = array();
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $admin = $this->admin_models->infomation('tendangnhap',$session_admin);
            foreach ($admin as $key) {
                $data['admin'] = $key->ten;
            }
            $err = $this->session->flashdata('err_add');
            if(isset($err)){
            	$err_add = "Vui lòng điền đầy đủ thông tin";
				$this->session->set_flashdata('err_add',$err_add);
            }
            $giaovien = $this->giaovien_models->infomation($magiaovien);
            if($giaovien){
            	$this->session->set_flashdata('giaovien',$giaovien);
            }
        	redirect('daotao/giaovien/home');
        }else redirect('daotao/home/login');
	}
	function sua($magiaovien){
		// $magiaovien = $this->input->post('magiaovien');
		$tengiaovien = $this->input->post('tengiaovien');
		$mabomon = $this->input->post('manganh');
		$matkhau= $this->input->post('matkhau');
		if(isset($tengiaovien)&&isset($mabomon)){ 
			$data_add = array(
				'tengiaovien'=>$tengiaovien,
				'manganh'=>$mabomon,
				'matkhau'=>$matkhau,
			);
			$add = $this->giaovien_models->sua($magiaovien,$data_add);
			redirect('daotao/giaovien/home/view/'.$magiaovien);
			
		}else{
			$err_add = "Vui lòng điền đầy đủ thông tin";
			$this->session->set_flashdata('err_add',$err_add);
			redirect('daotao/giaovien/home/view/'.$magiaovien);
			 
		}
	}
	function delete($magiaovien){
		$data = array();
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $this->giaovien_models->delete($magiaovien);
            $err = "Xoa thanh cong!";
            $this->session->set_flashdata('err',$err);
        	redirect('daotao/giaovien/home');
        }else redirect('daotao/home/login');

	}
}



 ?>
