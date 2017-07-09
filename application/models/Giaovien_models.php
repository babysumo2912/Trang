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
    public function get_bomon($mabomon){
        $this->db->where('mabomon',$mabomon);
        $query = $this->db->get('tb_giaovien');
        if($query->num_rows() > 0){
            return $query->result();
        }
    }
    public function getclass($magiaovien,$id_hocki){
        $this->db->where('id_hocki',$id_hocki);
        $this->db->where('magiaovien',$magiaovien);
        $class = $this->db->get('tb_nhommonhoc');
        if($class->num_rows()>0){
            return $class->result();
        }else return false;
    }
    public function add_diem($mamonhoc,$nhommonhoc,$id_hocki,$data){
//        echo $data['masinhvien'];
        $this->db->where('mamh',$mamonhoc);
        $this->db->where('nhommonhoc',$nhommonhoc);
        $this->db->where('id_hocki',$id_hocki);
        $this->db->where('masinhvien',$data['masinhvien']);
        $query = $this->db->update('tb_danhsachsinhvien',$data);
       if(isset($query)){
           return true;
       }return false;
    }
    public function add_diemrl($id_hocki,$masinhvien,$data){
//        echo $data['masinhvien'];
        $this->db->where('id_hocki',$id_hocki);
        $this->db->where('masinhvien',$masinhvien);
        $query = $this->db->update('tb_diemrenluyen',$data);
       if(isset($query)){
           return true;
       }return false;
    }
    public function search($name){
        $this->db->like('tengiaovien',$name);
        $query = $this->db->get('tb_giaovien');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    public function add($data){
        $this->db->where('magiaovien',$data['magiaovien']);
        $check = $this->db->get('tb_giaovien');
        if($check->num_rows() > 0){
            return false;
        }else{
            $this->db->insert('tb_giaovien',$data);
            return true;
        }
    }
    public function sua($magiaovien,$data){
        $this->db->where('magiaovien',$magiaovien);
        $this->db->update('tb_giaovien',$data);
        return true;
    }
    public function delete($magiaovien){
        $this->db->where('magiaovien',$magiaovien);
        $this->db->delete('tb_giaovien');
        return true;
    }
     function chunhiem($magiaovien){
        $this->db->where('magiaovien',$magiaovien);
        $chunhiem = $this->db->get('tb_lop');
        if($chunhiem->num_rows() > 0){
            return $chunhiem->result();
        }else return false;
    }
    function get_chunhiem($malop){
        $this->db->where('malop',$malop);
        $query = $this->db->get('tb_sinhvien');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    function get_info1($masinhvien){
        $this->db->select_max('id_hocki');
        $query = $this->db->get('tb_hocki');
        $abc = $query->result();
        foreach ($abc as $key) {;
        $id_hocki = $key->id_hocki;
        }
        $this->db->where('masinhvien',$masinhvien);
        $this->db->where('id_hocki',$id_hocki);
        $query = $this->db->get('tb_diemrenluyen');
        if($query->num_rows()>0){
            return $query->result();
        }else return false;
    }
    function getall(){
        $giaovien = $this->db->get('tb_giaovien');
        if($giaovien->num_rows() > 0){
            return $giaovien->result();     
        }else return false;
        
    }
}

?>