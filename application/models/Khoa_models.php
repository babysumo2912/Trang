<?php 
class khoa_models extends CI_Model{
	public function get(){
		$get = $this->db->get('tb_khoa');
		if($get->num_rows() > 0){
			return $get->result();
		}else return false;
	}
	public function add($data){
		$add = $this->db->insert('tb_khoa',$data);
		return true;
	}
	public function getinfo($makhoa){
		$this->db->where('makhoa',$makhoa);
		$get = $this->db->get('tb_khoa');
		if($get->num_rows() > 0){
			return $get->result();
		}else return false;
	}
	public function update($data){
		$this->db->where('makhoa',$data['makhoa']);
		$update = $this->db->update('tb_khoa',$data);
		return true;
	}
	public function delete($makhoa){
		$this->db->where('makhoa',$makhoa);
		$delete = $this->db->delete('tb_khoa');
		return true;
		
	}
}


 ?>