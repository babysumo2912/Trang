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
            $monhoc = $this->session->flashdata('monhoc');
            if($monhoc){
            	$data['monhoc'] = $monhoc;
            }
            if(isset($add)){
            	$data['add'] = $add;
         	}
         	$mh_full = $this->monhoc_models->getall();
         	if($mh_full){
         		$data['mh_full'] = $mh_full;
         	}
        	$this->load->view('daotao/monhoc/home',$data);     
        }else redirect('daotao/home/login');
	}
	function search(){
		$name = $this->input->post('name');
		if(isset($name)){
			$check = $this->monhoc_models->search1($name);
			if($check){
				$this->session->set_flashdata('check',$check);
				redirect('daotao/monhoc/home');
			}else{
				$err = "Không tìm thấy trong CSDL";
				$this->session->set_flashdata('err',$err);
				redirect('daotao/monhoc/home');
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
	// function list_lop(){
	// 	$mabomon = $this->input->post('mabomon');
	// 	$lop = $this->home_models->get_info($mabomon,'mabomon','tb_lop');
	// 	if(count($lop)>0)
	// 	{
	// 		$pro_select_box1 = '';
	// 		$pro_select_box1 .= '<option value="">Chọn chuyên ngành</option>';
	// 		foreach ($lop as $province) {
	// 			$pro_select_box1 .='<option value="'.$province->malop.'">'.$province->tenlop.'</option>';
	// 		}
	// // 		echo json_encode($pro_select_box1);
	// 	}
	// }
	function add(){
		$mamh = $this->input->post('mamh');
		$tenmonhoc = $this->input->post('tenmonhoc');
		$manganh = $this->input->post('manganh');
		$sotinchi = $this ->input ->post('sotinchi');
		$maloai = $this ->input ->post('loai');
		// echo $sotinchi;die();
		if(isset($mamh)&&isset($tenmonhoc)&&isset($manganh)&&isset($maloai)&&isset($sotinchi)){
			$data_add = array(
				'mamh'=>$mamh,
				'tenmonhoc'=>$tenmonhoc,
				'sotinchi'=>$sotinchi,
				'manganh'=>$manganh,
				'loai'=>$maloai,
			);
			$add = $this->monhoc_models->add1($data_add);
			if($add == false){
				$err_add = "Mã môn học bị trùng";
				$this->session->set_flashdata('err_add',$err_add);
				redirect('daotao/monhoc/home');
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
            $monhoc = $this->monhoc_models->infomation($mamonhoc); 
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
	function molop($mamh){
		
		$data = array();
		$err = $this->session->flashdata('err');
		if($err){
			$data['err'] = $err;
		}
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $admin = $this->admin_models->infomation('tendangnhap',$session_admin);
            foreach ($admin as $key) {
                $data['admin'] = $key->ten;
            } 
            
         	$monhoc = $this->monhoc_models->infomation($mamh); 
            if($monhoc){
            	foreach ($monhoc as $key) {};
            	$data['monhoc'] = $monhoc;
            }
            $manganh = $key->manganh;
            $giaovien = $this->home_models->get_info($manganh,'manganh','tb_giaovien');
            if($giaovien){
            	$data['giaovien'] = $giaovien;
            }
            $data['mamh']=$mamh;
	     	$this->load->view('daotao/monhoc/molop',$data);
        }else redirect('daotao/home/login');
	}
	function dkmonhoc($mamh){
		$data = array();
		$hocki = $this->home_models->hocki();
        foreach ($hocki as $hk) {};
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
        	$id_hocki = $hk->id_hocki;
        	$nhom = $this->input->post('nhom');
        	$magiaovien = $this->input->post('magiaovien');
        	$siso = $this->input->post('siso');
            $add = array(
            	'id_hocki' => $id_hocki,
            	'nhommonhoc' => $nhom,
            	'mamh' => $mamh,
            	'magiaovien' => $magiaovien,
            	'siso'=> $siso,
            	);
            $add = $this->monhoc_models->add_nhom($add);
            if($add){
            	redirect('daotao/monhoc/home/molop/'.$mamh);
            }else{
            	$err = "Nhóm môn học đã tồn tại!";
            	$this->session->set_flashdata('err',$err);
            	redirect('daotao/monhoc/home/molop/'.$mamh);
            }
        	
        }else redirect('daotao/home/login');
	}
}



 ?>
