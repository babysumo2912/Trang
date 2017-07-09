<?php 
class home extends CI_Controller{
    function index(){
        
         $data = array();
        $session_admin = $this->session->userdata('id_admin');
        if(isset($session_admin)){
            $admin = $this->admin_models->infomation('tendangnhap',$session_admin);
            foreach ($admin as $key) {
                $data['admin'] = $key->ten;
            } 
            
            $this->load->view('daotao/quanlidiem/home',$data);     
        }else redirect('daotao/home/login');
    }
}

?>