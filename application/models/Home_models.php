<?php   
class home_models extends CI_Model{
    function login($account,$password,$table){
        $this->db->where('name',$account);
        $this->db->where('password',$password);
        $check = $this->db->get($table);
        if($check->num_rows() > 0){
            return $check->result();
        }else return false;
    }
    function get_info($search, $key, $table){
        $this->db->where($key, $search);
        $get_info = $this->db->get($table);
        if($get_info->num_rows() > 0){
            return $get_info->result();
        }else return false;
    }
    function add($data){
        $add = $this->db->insert('tb_hocki',$data);
        if($add){
            $this->db->select_max('id_hocki');
            $abc = $this->db->get('tb_hocki');
            if($abc->num_rows() > 0){
                return $abc->result();
            }else return false;
        }else return false;
    }
    function hocki(){
        $this->db->select_max('id_hocki');
        $abc = $this->db->get('tb_hocki');
        if($abc->num_rows() > 0){
            return $abc->result();
        }else return false;

    }
    function add_diemrl($data){
        $add = $this->db->insert('tb_diemrenluyen',$data);
        return true;
    }

}
?> 