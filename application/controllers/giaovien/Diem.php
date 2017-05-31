<?php
class Diem extends CI_Controller{
    public function add($mamonhoc,$nhommonhoc){
        $add_diem = $this->input->post('diem');
        if(isset($add_diem)){
//            var_dump($add_diem);
            foreach ($add_diem as $row => $item){
                $masinhvien = $item['masinhvien'];
                $diemA = $item['diemA'];
                $diemA_2 = $item['diemA_2'];
                $diemB = $item['diemB'];
                $diemC = $item['diemC'];
                $update = array(
                    'masinhvien' => $masinhvien,
                    'diemA' => $diemA,
                    'diemA_2' => $diemA_2,
                    'diemB' => $diemB,
                    'diemC' => $diemC,
                );
//                var_dump($update);
    //                echo $mamonhoc;
    //                echo $nhommonhoc;
                $query = $this->giaovien_models->add_diem($mamonhoc,$nhommonhoc,$update);
            }
        }else echo 1;
        redirect('giaovien/home/diemsinhvien/'.$mamonhoc.'/'.$nhommonhoc);

    }
}

?>