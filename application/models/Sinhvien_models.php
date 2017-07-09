<?php     
class sinhvien_models extends CI_Model{
	public function login($data){
		$this->db->where('masinhvien',$data['user']);
		$check = $this->db->get('tb_sinhvien');
		if($check->num_rows() > 0){
			$this->db->where('matkhau',$data['password']);
			$login =$this->db->get('tb_sinhvien');
			if($login->num_rows() > 0){
				return 1;
			}else return 2;
		}else return 3;
	}
	public function infomation($masinhvien){
		$this->db->where('masinhvien',$masinhvien);
		$get  = $this->db->get('tb_sinhvien');
		if($get->num_rows() > 0){
			return $get->result();
		}else return false;
	}
	public function danhsachmonhoc($masinhvien){
		$this->db->where('masinhvien',$masinhvien);
		$danhsachmonhoc = $this->db->get('tb_danhsachsinhvien');
		if($danhsachmonhoc->num_rows() > 0){
			return $danhsachmonhoc->result();
		}else return false;
	}
	public function danhsachmonhoc_hk($masinhvien,$id_hocki){
		$this->db->where('masinhvien',$masinhvien);
		$this->db->where('id_hocki',$id_hocki);
		$danhsachmonhoc = $this->db->get('tb_danhsachsinhvien');
		if($danhsachmonhoc->num_rows() > 0){
			return $danhsachmonhoc->result();
		}else return false; 
	}
	public function full_hocki($masinhvien){
		$this->db->group_by('id_hocki');
		$this->db->Order_by('id_hocki','DESC');
		$this->db->where('masinhvien',$masinhvien);
		$danhsachmonhoc = $this->db->get('tb_danhsachsinhvien');
		if($danhsachmonhoc->num_rows() > 0){
			return $danhsachmonhoc->result();
		}else return false;
	}
	public function add($name){
		$this->db->where('masinhvien',$name['masinhvien']);
		$check = $this->db->get('tb_sinhvien');
		if($check->num_rows() > 0){
			return false;
		}else{
			$this->db->insert('tb_sinhvien',$name);
        	return true;
		}
    }
    public function sua($name, $id){
    	$this->db->where('masinhvien',$id);
    	$this->db->update('tb_sinhvien',$name);
    	return true;
    }
    public function delete($id){
    	$this->db->where('masinhvien',$id);
    	$this->db->delete('tb_sinhvien');
    	return true;
    }
    function hocki($hk,$year){
    	$this->db->where('tenhocki',$hk);
    	$this->db->where('nambatdau',$year);
    	$hocki = $this->db->get('tb_hocki');
    	if($hocki->num_rows() > 0){
    		return $hocki->result();
    	}else return false;
    }
    function getall(){
        $sinhvien = $this->db->get('tb_sinhvien');
        if($sinhvien->num_rows() > 0){
            return $sinhvien->result();     
        }else return false;
    }
    function search($name,$malop){
    	$this->db->like('tensinhvien',$name);
    	$this->db->where('malop',$malop);
    	$get = $this->db->get('tb_sinhvien');
    	if($get->num_rows() > 0){
    		return $get->result();
    	}else return false;
    }
    function gettinchi($id_hocki, $masinhvien){
    	$tongsotinchi = 0;
    	$this->db->where('id_hocki',$id_hocki);
    	$this->db->where('masinhvien',$masinhvien);
    	$monhoc = $this->db->get('tb_danhsachsinhvien');
    	if($monhoc->num_rows()>0){
    		$data_monhoc = $monhoc->result();
    		foreach($data_monhoc as $key){
    			$this->db->where('mamh',$key->mamh);
    			$tinchi = $this->db->get('tb_monhoc');
    			foreach ($tinchi->result() as $value) {
    				$tongsotinchi += $value->sotinchi;
    			}
    		}
    	}
    	return $tongsotinchi;
    }
    function get_tong($id_hocki,$masinhvien){
    	$sum = 0;
    	$this->db->where('id_hocki',$id_hocki);
    	$this->db->where('masinhvien',$masinhvien);
    	$get = $this->db->get('tb_danhsachsinhvien');
    	if($get->num_rows() > 0){
    		foreach ($get->result() as $key) {
    			switch ($key->TKCH) {
    				case 'A':
    					$heso = 4;
    					break;
    				case 'B+':
    					$heso = 3.5;
    					break;
					case 'B':
    					$heso = 3;
    					break;
					case 'C+':
    					$heso = 2.5;
    					break;
					case 'C':
    					$heso = 2;
    					break;
					case 'D+':
    					$heso = 1.5;
    					break;
					case 'D':
    					$heso = 1;
    					break;
					case 'F':
    					$heso = 0;
    					break;
    				default:
    					$heso = 0;
    					break;
    			}
    			$this->db->where('mamh',$key->mamh);
    			$tinchi = $this->db->get('tb_monhoc');
    			foreach ($tinchi->result() as $value) {
    				$sum += $heso*$value->sotinchi;
    			}
    		}
    	}
    	return $sum;
    }
    function get_drl($id_hocki,$masinhvien){
    	$drl = 0;
    	$this->db->where('id_hocki',$id_hocki);
    	$this->db->where('masinhvien',$masinhvien);
    	$get = $this->db->get('tb_diemrenluyen');
    	if($get->num_rows() > 0){
    		foreach ($get->result() as $key) {
				$drl+= $key->diemrl;
    		}
    	}
    	return $drl;
    }
} 

 ?>