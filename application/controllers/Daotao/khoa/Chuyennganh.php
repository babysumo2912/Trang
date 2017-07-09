
<?php
class chuyennganh extends CI_controller{
    public function view($makhoa){
        $data = array();
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $admin = $this->admin_models->infomation('tendangnhap',$session_admin);
            $chuyennganh = $this->khoa_models->get_chuyennganh($makhoa);
            switch($chuyennganh){
                case 1:
                    $data['err_noselect'] = "Khoa của bạn vừa chọn không tồn tại! Vui lòng kiểm tra lại CSDL";
                    $this->load->view('daotao/khoa/chuyennganh',$data);
                    break;
                case 2:
                    $err_nodata = "Khoa của bạn vừa chọn không có chuyên ngành nào! Hãy thêm chuyên ngành mới vào CSDL";
//                    $this->load->view('daotao/khoa/chuyennganh',$data);
                    break; 
                default:
                    $data['chuyennganh'] = $chuyennganh;
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

            $bomon =  $this->bomon_models->get_bomon($makhoa);
            $data['bomon'] = $bomon;
            // foreach ($bomon as $item1){};
            // $data['nganh'] = $item1->tennganh;
            // $data['makhoa'] = $makhoa;

            $this->load->view('daotao/khoa/chuyennganh',$data);
        }else redirect('daotao/home/login');
    }
    public function add($makhoa){
        $tenchuyennganh = $this->input->post('tenchuyennganh');
        $machuyennganh = $this->input->post('machuyennganh');
        if(isset($tenchuyennganh) && isset($machuyennganh)){
            $add_khoa = array(
                'mabomon' => $machuyennganh,
                'tenbomon' => $tenchuyennganh,
                'makhoa' => $makhoa,
            );
            $check_add_khoa = $this->chuyennganh_models->add($add_khoa);
            if($check_add_khoa == 0){
                $err = "Mã chuyên ngành đã tồn tại! Vui lòng nhập mã khác!";
                $this->session->set_flashdata('err',$err);
                redirect('daotao/khoa/chuyennganh/view/'.$makhoa);
            }else{

                redirect('daotao/khoa/chuyennganh/view/'.$makhoa);
                }
        }
    }
    public function update($mabomon, $makhoa){
        $tenkhoa = $this->input->post('tenkhoa');
        if(isset($tenkhoa)){
            $data = array('tenbomon'=>$tenkhoa);
            $update = $this->chuyennganh_models->update($data,$mabomon);
            redirect('daotao/khoa/chuyennganh/view/'.$makhoa);

        }
    }
    public function delete($mabomon,$makhoa){
        $this->chuyennganh_models->delete($mabomon);
        redirect('daotao/khoa/chuyennganh/view/'.$makhoa);
    }
    public function view_chuyennganh($mabomon,$makhoa){
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
            $view = $this->chuyennganh_models->getinfo('mabomon',$mabomon);
            if($view){
                $data['mabomon'] = $mabomon;
            }
            $data['chuyennganh'] = $this->khoa_models->get_chuyennganh($makhoa);
            $bomon =  $this->bomon_models->get_bomon($makhoa);
            $data['bomon'] = $bomon;
            $this->load->view('daotao/khoa/chuyennganh',$data);
        }else redirect('daotao/home/login');
    }
    public function view_bomon($mabomon,$makhoa){
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
            $view = $this->bomon_models->getinfo('manganh',$mabomon);
            if($view){
                $data['manganh'] = $mabomon;
            }
            $data['bomon'] = $this->khoa_models->get_bomon($makhoa);
            $chuyennganh =  $this->chuyennganh_models->get_chuyennganh($makhoa);
            $data['chuyennganh'] = $chuyennganh;
            $this->load->view('daotao/khoa/chuyennganh',$data);
        }else redirect('daotao/home/login');
    }
}
 
?>