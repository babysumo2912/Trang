<?php    
class bomon_models extends CI_Model{
	public function get(){
		$get = $this->db->get('tb_nganh');
		if($get->num_rows() > 0){
			return $get->result();
		}else return false;
	}
	public function add($data){
        $this->db->where('manganh',$data['manganh']);
        $check= $this->db->get('tb_nganh');
        if($check->num_rows() > 0){
            return 0;
        }else{
            $add = $this->db->insert('tb_nganh',$data);
            if(isset($add)){
                return 1;
            }else return false;
        }
	}
	public function getinfo($key,$id){
		$this->db->where($key,$id);
		$get = $this->db->get('tb_nganh');
		if($get->num_rows() > 0){
			return $get->result();
		}else return false;
	}
	public function update($data,$manganh){
		$this->db->where('manganh',$manganh);
		$update = $this->db->update('tb_nganh',$data);
		return true;
	}
	public function delete($manganh){
		$this->db->where('manganh',$manganh);
		$delete = $this->db->delete('tb_nganh');
		return true;
		
	}
	
	public function get_bomon($makhoa){
        $this->db->where('makhoa',$makhoa);
        $query = $this->db->get('tb_nganh');
        return $query->result();

    }
}


 ?>