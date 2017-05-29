<?php
class giaovien_models extends CI_Model {
    public function login($data){
        $this->db->where('magiaovien',$data['magiaovien']);
        $check = $this->db->get('tb_giaovien');
        if($check->num_rows() > 0){
            $this->db->where('matkhau',$data['matkhau']);
            $login =$this->db->get('tb_giaovien');
            if($login->num_rows() > 0){
                return 1;
            }else return 2;
        }else return 3;
    }
    public function infomation($magiaovien){
        $this->db->where('magiaovien',$magiaovien);
        $check = $this->db->get('tb_giaovien');
        if($check->num_rows()>0){
            return $check->result();
        }else{
            return false;
        }
    }
    public function getclass($magiaovien){
        $this->db->where('magiaovien',$magiaovien);
        $class = $this->db->get('tb_nhommonhoc');
        if($class->num_rows()>0){
            return $class->result();
        }else return false;
    }
}

?>