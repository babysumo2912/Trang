  
<?php
class bomon extends CI_controller{
    public function view($makhoa){
        $data = array();
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $admin = $this->admin_models->infomation('tendangnhap',$session_admin);
            $bomon = $this->khoa_models->get_bomon($makhoa);
            switch($bomon){
                case 1:
                    $data['err_noselect'] = "Khoa của bạn vừa chọn không tồn tại! Vui lòng kiểm tra lại CSDL";
                    $this->load->view('daotao/khoa/bomon',$data);
                    break;
                case 2:
                    $err_nodata = "Khoa của bạn vừa chọn không có bộ môn nào! Hãy thêm bộ môn mới vào CSDL";
//                    $this->load->view('daotao/khoa/chuyennganh',$data);
                    break;
                default:
                    $data['bomon'] = $bomon;
            }
            foreach ($admin as $key) {
                $data['admin'] = $key->ten;
            }
            // $data['admin'] =
            $err = $this->session->flashdata('err');
            if(isset($err)){
                $data['err'] = $err;
            }
            $khoa = $this->khoa_models->getinfo($makhoa);
            foreach ($khoa as $item){};
            $data['khoa'] = $item->tenkhoa;
            $data['makhoa'] = $makhoa;
            $this->load->view('daotao/khoa/chuyennganh',$data);
        }else redirect('daotao/home/login');
    }
    public function add($makhoa){
        $tennganh = $this->input->post('tennganh');
        $manganh = $this->input->post('manganh');
        if(isset($tennganh) && isset($manganh)){
            $add_khoa = array(
                'manganh' => $manganh,
                'tennganh' => $tennganh,
                'makhoa' => $makhoa,
            );
            $check_add_khoa = $this->bomon_models->add($add_khoa);
            if($check_add_khoa == 0){
                $err = "Mã bộ môn đã tồn tại! Vui lòng nhập mã khác!";
                $this->session->set_flashdata('err',$err);
                redirect('daotao/khoa/chuyennganh/view/'.$makhoa);
            }else{

                redirect('daotao/khoa/chuyennganh/view/'.$makhoa);
                }
        }
    }
    public function update($manganh, $makhoa){
        $tenkhoa = $this->input->post('tenkhoa');
        if(isset($tenkhoa)){
            $data = array('tennganh'=>$tenkhoa);
            $update = $this->bomon_models->update($data,$manganh);
            redirect('daotao/khoa/chuyennganh/view/'.$makhoa);

        } 
    }
    public function delete($manganh,$makhoa){
        $this->bomon_models->delete($manganh);
        redirect('daotao/khoa/chuyennganh/view/'.$makhoa);
    }
    public function view_bomon($manganh,$makhoa){
        $data = array();
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $admin = $this->admin_models->infomation('tendangnhap',$session_admin);
            $khoa = $this->khoa_models->getinfo($makhoa);
            foreach ($khoa as $kh){};
            $data['khoa'] = $kh->tenkhoa;
            $data['makhoa'] = $makhoa;
            foreach ($admin as $key) {
                $data['admin'] = $key->ten;
            }

            // $data['admin'] =
            $err = $this->session->flashdata('err');
            if(isset($err)){
                $data['err'] = $err;
            }
            $view = $this->bomon_models->getinfo('manganh',$manganh);
            if($view){
                $data['manganh'] = $manganh;
            }
            $data['bomon'] = $this->khoa_models->get_bomon($makhoa);
            $this->load->view('daotao/khoa/chuyennganh',$data);
        }else redirect('daotao/home/login');
    }
}

?>