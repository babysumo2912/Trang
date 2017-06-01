<?php 
class admin_models extends CI_Model{
	public function login($data){
			$this->db->where('tendangnhap',$data['user']);
			$check = $this->db->get('tb_admin');
			if($check->num_rows() > 0){
				$this->db->where('matkhau',$data['password']);
				$login =$this->db->get('tb_admin');
				if($login->num_rows() > 0){
					return 1;
				}else return 2;
			}else return 3;
		}
	public function infomation($key,$id_admin){
		$this->db->where($key,$id_admin);
		$get  = $this->db->get('tb_admin');
		if($get->num_rows() > 0){
			return $get->result();
		}else return false;
	}
	public function themtintuc($data){
	    $query = $this->db->insert('tb_tintuc',$data);
	    if(isset($query)){
	        return true;
        }else return false;
    }
}

 ?>