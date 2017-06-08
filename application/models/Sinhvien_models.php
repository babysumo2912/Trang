<?php 
class sinhvien_models extends CI_Model{
	public function login($data){
		$this->db->where('masinhvien',$data['user']);
		$check = $this->db->get('tb_sinhvien');
		if($check->num_rows() > 0){
			$this->db->where('matkhau',$data['password']);
			$login =$this->db->get('tb_sinhvien');
			if($login->num_rows() > 0){
				return 1;
			}else return 2;
		}else return 3;
	}
	public function infomation($masinhvien){
		$this->db->where('masinhvien',$masinhvien);
		$get  = $this->db->get('tb_sinhvien');
		if($get->num_rows() > 0){
			return $get->result();
		}else return false;
	}
	public function danhsachmonhoc($masinhvien){
		$this->db->where('masinhvien',$masinhvien);
		$danhsachmonhoc = $this->db->get('tb_danhsachsinhvien');
		if($danhsachmonhoc->num_rows() > 0){
			return $danhsachmonhoc->result();
		}else return false;
	}
	public function danhsachmonhoc_hk($masinhvien,$id_hocki){
		$this->db->where('masinhvien',$masinhvien);
		$this->db->where('id_hocki',$id_hocki);
		$danhsachmonhoc = $this->db->get('tb_danhsachsinhvien');
		if($danhsachmonhoc->num_rows() > 0){
			return $danhsachmonhoc->result();
		}else return false;
	}
	public function full_hocki($masinhvien){
		$this->db->group_by('id_hocki');
		$this->db->Order_by('id_hocki','DESC');
		$this->db->where('masinhvien',$masinhvien);
		$danhsachmonhoc = $this->db->get('tb_danhsachsinhvien');
		if($danhsachmonhoc->num_rows() > 0){
			return $danhsachmonhoc->result();
		}else return false;
	}
}

 ?>