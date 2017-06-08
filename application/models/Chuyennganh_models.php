<?php 
class chuyennganh_models extends CI_Model{
	public function get(){
		$get = $this->db->get('tb_bomon');
		if($get->num_rows() > 0){
			return $get->result();
		}else return false;
	}
	public function add($data){
        $this->db->where('mabomon',$data['mabomon']);
        $check= $this->db->get('tb_bomon');
        if($check->num_rows() > 0){
            return 0;
        }else{
            $add = $this->db->insert('tb_bomon',$data);
            if(isset($add)){
                return 1;
            }else return false;
        }
	}
	public function getinfo($key,$id){
		$this->db->where($key,$id);
		$get = $this->db->get('tb_bomon');
		if($get->num_rows() > 0){
			return $get->result();
		}else return false;
	}
	public function update($data,$mabomon){
		$this->db->where('mabomon',$mabomon);
		$update = $this->db->update('tb_bomon',$data);
		return true;
	}
	public function delete($machuyennganh){
		$this->db->where('mabomon',$machuyennganh);
		$delete = $this->db->delete('tb_bomon');
		return true;
		
	}
	public function get_chuyennganh($mabomon,$makhoa){
        $this->db->where('mabomon',$mabomon);
        $this->db->where('makhoa',$makhoa);
        $query = $this->db->get('tb_bomon');
        return $query->result();

    }
}


 ?>