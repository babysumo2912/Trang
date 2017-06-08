<?php 
class khoa_models extends CI_Model{
	public function get(){
		$get = $this->db->get('tb_khoa');
		if($get->num_rows() > 0){
			return $get->result();
		}else return false;
	}
	public function add($data){
	    $this->db->where('makhoa',$data['makhoa']);
	    $check = $this->db->get('tb_khoa');
        $this->db->where('kihieu',$data['kihieu']);
        $check_kihieu = $this->db->get(tb_khoa);

        if($check_kihieu->num_rows()>0){
            return 2;
        }
	    if($check->num_rows() > 0){
                return 0;
        }else{
            $add = $this->db->insert('tb_khoa',$data);
            if(isset($add)){
                return 1;
            }else return false;
        }
	}
	public function update($data,$makhoa){
	    $this->db->where('makhoa',$makhoa);
	    $query = $this->db->get('tb_khoa');
	    if($query->num_rows() > 0){
            $this->db->where('makhoa',$makhoa);
	        $update = $this->db->update('tb_khoa',$data);
	        if(isset($update)){
	            return 0;
            }else return 2;
        }else return 1;
    }
	public function getinfo($makhoa){
		$this->db->where('makhoa',$makhoa);
		$get = $this->db->get('tb_khoa');
		if($get->num_rows() > 0){
			return $get->result();
		}else return false;
	}
	public function delete($makhoa){
		$this->db->where('makhoa',$makhoa);
		$delete = $this->db->delete('tb_khoa');
		return true;
		
	}
	public function get_chuyennganh($makhoa){
        $this->db->where('makhoa',$makhoa);
        $khoa = $this->db->get('tb_khoa');
        if($khoa->num_rows() > 0){
            $this->db->where('makhoa',$makhoa);
            $chuyennganh = $this->db->get('tb_bomon');
            if($chuyennganh->num_rows() > 0){
                return $chuyennganh->result();
            }else return 2 ;
        }else return 1;
    }
    public function get_khoa($mabomon){
        $this->db->where('mabomon',$mabomon);
        $query = $this->db->get('tb_bomon');
        if($query->num_rows() > 0){
            return $query->result();
        }
    }
}


 ?>