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
    public function add_diem($mamonhoc,$nhommonhoc,$data){
//        echo $data['masinhvien'];
        $this->db->where('mamh',$mamonhoc);
        $this->db->where('nhommonhoc',$nhommonhoc);
        $this->db->where('masinhvien',$data['masinhvien']);
        $query = $this->db->update('tb_danhsachsinhvien',$data);
//        if(isset($query)){
//            return true;
//        }return false;
    }
}

?>