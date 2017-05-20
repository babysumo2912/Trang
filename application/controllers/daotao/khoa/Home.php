
<?php
/**
 * Created by PhpStorm.
 * User: DucAnn
 * Date: 2017-05-20
 * Time: 3:51 PM
 */
class home extends CI_Controller{
    public function index(){
        $data = array();
        $err = $this->session->flashdata('err');
        if(isset($err)){
            $data['err'] = $err;
        }
        $data['khoa'] = $this->khoa_models->get();
        $this->load->view('daotao/khoa/home',$data);
    }
    public function add(){
    $tenkhoa = $this->input->post('tenkhoa');
    $kihieuso = $this->input->post('kihieuso');
    $makhoa = $this->input->post('makhoa');
        if(isset($tenkhoa) && isset($kihieuso) && isset($makhoa)){
            $add_khoa = array(
                'makhoa' => $makhoa,
                'tenkhoa' => $tenkhoa,
                'kihieu' => $kihieuso,
            );
            $check_add_khoa = $this->khoa_models->add($add_khoa);
            if($check_add_khoa == 0){
                $err = "Mã khoa đã tồn tại! Vui lòng nhập mã khoa khác!";
                $this->session->set_flashdata('err',$err);
                redirect('daotao/khoa/home');
            }else{
                if($check_add_khoa == 2){
                    $err = "Kí tự số đã bị trùng!";
                    $this->session->set_flashdata('err',$err);
                    redirect('daotao/khoa/home');
                }else{
                    redirect('daotao/khoa/home');
                }
            }
        }
    }
    public function update($makhoa){
        $tenkhoa = $this->input->post('tenkhoa');
        if(isset($tenkhoa)){
            $data = array('tenkhoa'=>$tenkhoa);
            $update = $this->khoa_models->update($data,$makhoa);
            if($update == 0){
                redirect('daotao/khoa/home');
            }else echo 4;
            if($update == 1){
                $err = "Không tìm thấy khoa cần thay đổi";
                $this->session->set_flashdata('err',$err);
                redirect('daotao/khoa/home');
            }else echo 2;

        }
    }
}
?>