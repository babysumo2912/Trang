<?php
class Diem extends CI_Controller{
    public function add($mamonhoc,$nhommonhoc){
        $add_diem = $this->input->post('diem');
        if(isset($add_diem)){
//            var_dump($add_diem);die();
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
        // in file excel
//        require_once 'PHPExcel/PHPExcel.php';
//        $objPHPExcel = new PHPExcel();
//
//        $objPHPExcel->setActiveSheetIndex(0)
////            ->setCellValue('A1', 'STT')
//            ->setCellValue('B1', 'Mã sinh viên')
//            ->setCellValue('C1', 'Tên sinh viên')
//            ->setCellValue('D1', 'Lớp')
//            ->setCellValue('E1', 'Điểm A(1)')
//            ->setCellValue('F1', 'Điểm A(2)')
//            ->setCellValue('G1', 'Điểm B')
//            ->setCellValue('H1', 'Điểm C');
//            ->setCellValue('I1', 'Tổng kết')
//            ->setCellValue('J1', 'Tình trạng')
//            ->setCellValue('K1', 'Đánh giá');
            require_once 'PHPExcel/PHPExcel.php';
            $objPHPExcel = new PHPExcel();

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Mã học phần')
                ->setCellValue('A2', 'Nhóm học phần')
                ->setCellValue('A3', ' Tên học phần')
                ->setCellValue('A4', ' Tên giáo viên')
                ->setCellValue('A6', 'STT')
                ->setCellValue('B6', 'Mã sinh viên')
                ->setCellValue('C6', 'Tên sinh viên')
                ->setCellValue('D6', 'Lớp')
                ->setCellValue('E6', 'Điểm A(1)')
                ->setCellValue('F6', 'Điểm A(2)')
                ->setCellValue('G6', 'Điểm B')
                ->setCellValue('H6', 'Điểm C')
                ->setCellValue('I6', 'TK(10)')
                ->setCellValue('J6', 'TK(CH)');

            $lists = $add_diem;
            $i = 7;
            foreach ($lists as $row)
            {
                if($row['diemA_2'] > $row['diemA']){
                    $row['diemAcc'] = $row['diemA_2'];
                }else $row['diemAcc'] = $row['diemA'];
                $row['tk'] = 0.6*$row['diemAcc'] + 0.3*$row['diemB'] + 0.1 * $row['diemC'];
                if($row['tk']<4.0){
                    $row['tkch'] =  "F";
                }
                if($row['tk']>=4.0 && $row['tk']<5.0){
                    $row['tkch'] =  "D";
                }
                if($row['tk']>=5.0 && $row['tk']<5.5){
                    $row['tkch'] =  "D+";
                }

                if($row['tk']>=5.5 && $row['tk']<6.5){
                    $row['tkch'] =  "C";
                }
                if($row['tk']>=6.5 && $row['tk']<7.0){
                    $row['tkch'] =  "C+";
                }
                if($row['tk']>=7.0 && $row['tk']<8.){
                    $row['tkch'] =  "B";
                }
                if($row['tk']>=8.0 && $row['tk']<8.5){
                    $row['tkch'] =  "B+";
                }
                if($row['tk']>=8.5){
                    $row['tkch'] =  "A";
                }
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B1', $row['mamonhoc'])
                    ->setCellValue('B2', $row['nhommonhoc'])
                    ->setCellValue('B3', $row['tenmonhoc'])
                    ->setCellValue('B4', $row['tengiaovien'])
                    ->setCellValue('A'.$i, $i-1)
                    ->setCellValue('B'.$i, $row['masinhvien'])
                    ->setCellValue('C'.$i, $row['tensinhvien'])
                    ->setCellValue('D'.$i, $row['lopsinhvien'])
                    ->setCellValue('E'.$i, $row['diemA'])
                    ->setCellValue('F'.$i, $row['diemA_2'])
                    ->setCellValue('G'.$i, $row['diemB'])
                    ->setCellValue('H'.$i, $row['diemC'])
                    ->setCellValue('I'.$i, $row['tk'])
                    ->setCellValue('J'.$i, $row['tkch']);
                $i++;
            }
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $full_path = 'data_diem.xlsx';//duong dan file
            $objWriter->save($full_path);
//        $lists = array(
//            array(
//                'name' => 'Nobita',
//                'email' => 'nobitacnt@gmail.com',
//                'phone' => '0123.456.789',
//            ),
//            array(
//                'name' => 'Xuka',
//                'email' => 'xuka@gmail.com',
//                'phone' => '0222.333.444',
//            ),
//            array(
//                'name' => 'Chaien',
//                'email' => 'chaien@gmail.com',
//                'phone' => '0111.333.444',
//            ),
//        );

//set gia tri cho cac cot du lieu
//        $i = 2;
//        foreach ($lists as $row)
//        {
//            $objPHPExcel->setActiveSheetIndex(0)
//                ->setCellValue('A'.$i, $row['name'])
//                ->setCellValue('B'.$i, $row['email'])
//                ->setCellValue('C'.$i, $row['phone']);
//            $i++;
//        }
//ghi du lieu vao file,định dạng file excel 2007
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//        $full_path = 'data_diem.xlsx';//duong dan file
//        $objWriter->save($full_path);
        //end file excel
        redirect('giaovien/home/diemsinhvien/'.$mamonhoc.'/'.$nhommonhoc);
    }
}

?>