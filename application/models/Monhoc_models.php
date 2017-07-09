<?php  
/**     
*  
*/
class monhoc_models extends CI_model
{
	function get_allinfo($mamonhoc,$nhommonhoc){
        $this->db->where('mamh',$mamonhoc);
        $this->db->where('nhommonhoc',$nhommonhoc);
        $getdanhsach = $this->db->get('tb_nhommonhoc');
        if($getdanhsach->num_rows() > 0){
            return $getdanhsach->result();
        }
    }
	function getinfo($mamonhoc){
		$this->db->where('mamh',$mamonhoc);
		$getinfo = $this->db->get('tb_monhoc');
		if($getinfo->num_rows() > 0){
			return $getinfo->result();
		}else return false;
	}
	function search($mamonhoc,$hocki){
		$this->db->where('mamh',$mamonhoc);
		$this->db->where('id_hocki',$hocki);
		$search = $this->db->get('tb_nhommonhoc');
		if($search->num_rows() > 0){
			return $search->result();
		}else return false;
	}
	function getdanhsach($mamonhoc,$nhommonhoc){
		$this->db->where('mamh',$mamonhoc);
		$this->db->where('nhommonhoc',$nhommonhoc);
		$getdanhsach = $this->db->get('tb_danhsachsinhvien');
		if($getdanhsach->num_rows() > 0){
			return $getdanhsach->result();
		}
	}
    function getdanhsach1($mamonhoc,$nhommonhoc,$id_hocki){
        $this->db->where('id_hocki',$id_hocki);
        $this->db->where('mamh',$mamonhoc);
        $this->db->where('nhommonhoc',$nhommonhoc);
        $getdanhsach = $this->db->get('tb_danhsachsinhvien');
        if($getdanhsach->num_rows() > 0){
            return $getdanhsach->result();
        }
    }
	function getgiaovien($maGV){
		$this->db->where('magiaovien',$maGV);
		$getgiaovien = $this->db->get('tb_giaovien');
		if($getgiaovien->num_rows() > 0){
			return $getgiaovien->result();
		}else return false;
	}
	function add($data_add){
        $this->db->where('id_hocki',$data_add['id_hocki']);
		$this->db->where('masinhvien',$data_add['masinhvien']);
		$this->db->where('mamh',$data_add['mamh']);
		$check = $this->db->get('tb_danhsachsinhvien');
		if($check->num_rows() > 0){
			return 0;
		}else{
			$add = $this->db->insert('tb_danhsachsinhvien',$data_add);
			if(isset($add)){
				return 1;
			}else return 2;
		}
	}
	function delete($mamonhoc,$nhommonhoc,$masinhvien){
	    $this->db->where('mamh',$mamonhoc);
        $this->db->where('nhommonhoc',$nhommonhoc);
        $this->db->where('masinhvien',$masinhvien);
        $query = $this->db->delete('tb_danhsachsinhvien');
        if(isset($query)){
            return true;
        }else return false;
    }
   	
 

   	// daotao

   	public function search1($name){
        $this->db->like('tenmonhoc',$name);
        $query = $this->db->get('tb_monhoc');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    public function add1($name){
        $this->db->insert('tb_monhoc',$name);
        return true;
    }
    function getall(){
        $giaovien = $this->db->get('tb_monhoc');
        if($giaovien->num_rows() > 0){
            return $giaovien->result();     
        }else return false;
    }
     public function infomation($mamonhoc){
        $this->db->where('mamh',$mamonhoc);
        $check = $this->db->get('tb_monhoc');
        if($check->num_rows()>0){
            return $check->result();
        }else{
            return false;
        }
    }
     public function sua($mamonhoc,$data){
        $this->db->where('mamh',$mamonhoc);
        $this->db->update('tb_monhoc',$data);
        return true;
    }
    public function xoa($mamonhoc){
        $this->db->where('mamh',$mamonhoc);
        $this->db->delete('tb_monhoc');
        return true;
    }

    public function add_nhom($name){
        $this->db->where('id_hocki',$name['id_hocki']);
        $this->db->where('mamh',$name['mamh']);
        $this->db->where('nhommonhoc',$name['nhommonhoc']);
        $check = $this->db->get('tb_nhommonhoc');
        if($check->num_rows() > 0){
            return false;
        }else{
            $this->db->insert('tb_nhommonhoc',$name);
            return true;
        }
    }
}
 ?>