<?php 
/**
* 
*/
class monhoc_models extends CI_model
{
	
	function getinfo($mamonhoc){
		$this->db->where('mamh',$mamonhoc);
		$getinfo = $this->db->get('tb_monhoc');
		if($getinfo->num_rows() > 0){
			return $getinfo->result();
		}else return false;
	}
	function search($mamonhoc){
		$this->db->where('mamh',$mamonhoc);
		$search = $this->db->get('tb_nhommonhoc');
		if($search->num_rows() > 0){
			return $search->result();
		}else return false;
	}
	function getdanhsach($mamonhoc,$nhommonhoc){
		$this->db->where('mamh',$mamonhoc);
		$this->db->where('nhommonhoc',$nhommonhoc);
		$getdanhsach = $this->db->get('tb_danhsachsinhvien');
		if($getdanhsach->num_rows() > 0){
			return $getdanhsach->result();
		}
	}
	function getgiaovien($maGV){
		$this->db->where('magiaovien',$maGV);
		$getgiaovien = $this->db->get('tb_giaovien');
		if($getgiaovien->num_rows() > 0){
			return $getgiaovien->result();
		}else return false;
	}
	function add($data_add){
		$this->db->where('masinhvien',$data_add['masinhvien']);
		$this->db->where('mamh',$data_add['mamh']);
		$check = $this->db->get('tb_danhsachsinhvien');
		if($check->num_rows() > 0){
			return 0;
		}else{
			$add = $this->db->insert('tb_danhsachsinhvien',$data_add);
			if(isset($add)){
				return 1;
			}else return 2;
		}
	}
}


 ?>