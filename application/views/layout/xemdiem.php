<?php
include'header.php';
$masinhvien = $this->session->userdata('masinhvien');
?>
<section class="row">
    <div class="max">
        <div class="text-center" style="max-width: 500px; border: 1px #ccc solid; margin: 0 auto;padding: 10px; margin-bottom: 10px">
            <?php if(isset($sinhvien)){
                foreach ($sinhvien as $row){
                    ?>
                    <label for="">Mã sinh viên:</label>&nbsp;<span> <?php echo $row->masinhvien?></span><br>
                    <label for="">Tên sinh viên:</label>&nbsp;<span> <?php echo $row->tensinhvien?></span><br>
                    <label for="">Lớp sinh viên:</label>&nbsp;<span> <?php echo $row->malop?></span><br>
                    <?php
                }
            }?>
             <?php 
            $danhsachsinhvien_hk = $this->sinhvien_models->danhsachmonhoc($masinhvien);
             // $danhsachsinhvien_hk = $this->sinhvien_models->danhsachmonhoc_hk($masinhvien,'1');
            $sotinchidat = 0;
            $tongdiem = 0;
            $tongdiem10 = 0;
                foreach ($danhsachsinhvien_hk as $svhk) {
                    if($svhk->TK10 >=4.0){
                        if($svhk->TKCH == "A"){
                            $heso = 4;
                        }
                        if($svhk->TKCH == "B+"){
                            $heso = 3.5;
                        }
                        if($svhk->TKCH == "B"){
                            $heso = 3;
                        }
                        if($svhk->TKCH == "C+"){
                            $heso = 2.5;
                        }
                        if($svhk->TKCH == "C"){
                            $heso = 2;
                        }
                        if($svhk->TKCH == "D+"){
                            $heso = 1.5;
                        }
                        if($svhk->TKCH == "D"){
                            $heso = 1;
                        }
                        if($svhk->TKCH == "F"){
                            $heso = 0;
                        }
                         $monhoc = $this->monhoc_models->getinfo($svhk->mamh);
                        foreach($monhoc as $mh){};
                        $sotinchidat += $mh->sotinchi;
                        $tongdiem += ($heso*$mh->sotinchi);
                        $tongdiem10+=($svhk->TK10*$mh->sotinchi);
                    }
                }

             ?>
             <!-- <?php echo $tongdiem; ?> -->
             Số tín chỉ đạt <b><?php echo $sotinchidat; ?></b><br>
             Điểm trung bình tích lũy (hệ 4): <b><?php echo round($tongdiem/$sotinchidat,2) ?></b><br>
             Điểm trung bình tích lũy (hệ 10): <b><?php echo round($tongdiem10/$sotinchidat,2) ?></b><br>
        </div>
        <div>
            <?php 

            if($danhsachmonhoc_sinhvien){
                foreach ($danhsachmonhoc_sinhvien as $key) {
                    $hocki = $this->home_models->get_info($key->id_hocki,'id_hocki','tb_hocki');
                    foreach ($hocki as $hk) {}
                    // $danhsachsinhvien_hk = $this->sinhvien_models->danhsachmonhoc_hk($masinhvien,$key->id_hocki);
                    // echo '<pre>';
                    // var_dump($danhsachsinhvien_hk);
                    // echo '<pre>';
            ?>
        <div style="border: 1px white solid; box-shadow: 5px 5px 15px #ccc; padding:20px; margin-bottom: 30px">
            <table class="table table-bordered">
            <caption>Học kì <?php echo $hk->tenhocki?> Năm học: <?php echo $hk->nambatdau ?> - <?php echo $hk->namketthuc ?></caption>
                <tr>
                    <td>
                        Mã môn học
                    </td>
                    <td>Tên môn học</td>
                    <td>Số tín chỉ</td>
                    <td>Điểm A(lần 1)</td>
                    <td>Điểm A(lần 2)</td>
                    <td>Điểm B</td>
                    <td>Điểm C</td>
                    <td>Điểm Tổng kết</td>
                    <td>Đánh giá</td>
                </tr>
                <?php  $danhsachsinhvien_hk = $this->sinhvien_models->danhsachmonhoc_hk($masinhvien,$key->id_hocki);
                    foreach ($danhsachsinhvien_hk as $svhk) {
                        $monhoc = $this->monhoc_models->getinfo($svhk->mamh);
                        foreach($monhoc as $mh){};
                ?>
                <tr>
                    <td>
                        <?php echo $svhk->mamh ?>
                    </td>
                    <td><?php echo $mh->tenmonhoc ?></td>
                    <td><?php echo $mh->sotinchi ?></td>
                    <td><?php echo $svhk->diemA ?></td>
                    <td><?php echo $svhk->diemA_2 ?></td>
                    <td><?php echo $svhk->diemB ?></td>
                    <td><?php echo $svhk->diemC ?></td>
                    <td><?php echo $svhk->TK10 ?></td>
                    <td><?php echo $svhk->TKCH ?></td>
                </tr>
                <?php
                    }
                 ?>
            </table>
        </div>
            <?php
                }
            }
             ?>
        </div>
    </div>
</section>
