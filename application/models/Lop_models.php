<?php
class lop_models extends CI_model{
    public function get($mabomon){
        $this->db->where('mabomon',$mabomon);
        $check = $this->db->get('tb_bomon');
        if($check->num_rows() <= 0){
            return "err";
        }
        $this->db->where('mabomon',$mabomon);
        $query = $this->db->get('tb_lop');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    public function add($data){
        $this->db->where('malop',$data['malop']);
        $check = $this->db->get('tb_lop');
        if($check->num_rows() > 0){
            return false;
        }else{
            $this->db->insert('tb_lop',$data);
            return true;
        }
    }
    public function delete($malop){
        $this->db->where('malop',$malop);
        $this->db->delete('tb_lop');
        return true;
    }
}


?>