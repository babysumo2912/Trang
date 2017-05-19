<?php 
class chuyennganh_models extends CI_Model{
	public function get(){
		$get = $this->db->get('tb_chuyennganh');
		if($get->num_rows() > 0){
			return $get->result();
		}else return false;
	}
	public function add($data){
		$add = $this->db->insert('tb_chuyennganh',$data);
		return true;
	}
	public function getinfo($key,$id){
		$this->db->where($key,$id);
		$get = $this->db->get('tb_chuyennganh');
		if($get->num_rows() > 0){
			return $get->result();
		}else return false;
	}
	public function update($data){
		$this->db->where('machuyennganh',$data['machuyennganh']);
		$update = $this->db->update('tb_chuyennganh',$data);
		return true;
	}
	public function delete($machuyennganh){
		$this->db->where('machuyennganh',$machuyennganh);
		$delete = $this->db->delete('tb_chuyennganh');
		return true;
		
	}
}


 ?>