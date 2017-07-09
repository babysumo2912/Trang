<?php 
include'header.php';
$masinhvien = $this->session->userdata('masinhvien');
?>
<section class="row">
    <div class="max">
        <div style="max-width: 500px; border: 1px #ccc solid; margin: 0 auto;padding: 10px; margin-bottom: 10px; margin-top: 20px">
            <?php if(isset($sinhvien)){
                foreach ($sinhvien as $row){
                    ?>
                    <div style="font-family: Times; font-size: 17; line-height: 0.7;">
                    <p>Mã sinh viên:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> <?php echo $row->masinhvien?></b></p>
                    <p>Tên sinh viên:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $row->tensinhvien?></b></p>
                    <p>Phái:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $row->phai?></b></p>
                    <p>Ngày sinh:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $row->ngaysinh?></b></p>
                    <p>Nơi sinh:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $row->quequan?></b></p>
                    <p>Hệ đào tạo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Đại học chính quy</b></p>
                    <p>Lớp:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>DCCTKT57</b></p>
                    <p>Khoa: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Công nghệ thông tin</b></p> 
                    <p>Chuyên ngành:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Tin học kinh tế</b></p> 
                    </div>
                    <?php
                }
            }?>
            <hr> 
             <?php 
            $danhsachsinhvien_hk = $this->sinhvien_models->danhsachmonhoc($masinhvien);
             // $danhsachsinhvien_hk = $this->sinhvien_models->danhsachmonhoc_hk($masinhvien,'1');
            if($danhsachsinhvien_hk && $danhsachsinhvien_hk!=''){
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

            }else{
                $sotinchidat = 0;
            $tongdiem = 0;
            $tongdiem10 = 0;
            }
            
             ?>
             <?php 
             if($danhsachsinhvien_hk==false){
                ?>
            <div style="font-family: Times; font-size: 17; line-height: 0.7;">
             <p>Số tín chỉ đạt: <b>0</b><br></p>
             <p>Điểm trung bình tích lũy (hệ 4): <b>0</b><br></p>
             <p>Điểm trung bình tích lũy (hệ 10): <b>0</b><br></p>
             </div>
                <?php
             }else{

              ?>
              <?php 
              if($sotinchidat == 0){
            ?>
            <div style="font-family: Times; font-size: 17; line-height: 0.7;">
             <p>Số tín chỉ đạt: <b><?php echo $sotinchidat; ?></b><br></p>
             <p>Điểm trung bình tích lũy (hệ 4): <b>0</b><br></p>
             <p>Điểm trung bình tích lũy (hệ 10): <b>0</b><br></p>
             </div>
            <?php
              }else{

               ?>
             <div style="font-family: Times; font-size: 17; line-height: 0.7;">
             <p>Số tín chỉ đạt: <b><?php echo $sotinchidat; ?></b><br></p>
             <p>Điểm trung bình tích lũy (hệ 4): <b><?php echo round($tongdiem/$sotinchidat,2) ?></b><br></p>
             <p>Điểm trung bình tích lũy (hệ 10): <b><?php echo round($tongdiem10/$sotinchidat,2) ?></b><br></p>
             </div>
             <?php } ?>
             <?php } ?>
        </div>
        <div class="text-center" style="font-family: Times;font-size: 18;">
            <a href="<?php echo base_url() ?>sinhvien/xemdiem/full">Xem tất cả các kì học</a>
        </div>
        <div style="max-width: 300px; margin: 0 auto">
        <?php 
        echo form_open('sinhvien/xemdiem/hocki');
         ?>
         <div class="input-group">

          <input type="text" name="hocki" class="form-control" placeholder="(VD: 20061)...">
          <span class="input-group-btn">
            <button class="btn btn-info form-control" type="submit">Xem điểm</button>
          </span>
        </div>
         <?php 
         echo form_close();

          ?>
        </div>
        <div>
            <?php 

            if($danhsachmonhoc_sinhvien && $danhsachmonhoc_sinhvien!=''){
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
                <tr style="font-family: times; font-size: 18;font-weight: bold; text-align: center;">
                    <td>
                        Mã môn học
                    </td>
                    <td>Tên môn học</td>
                    <td>Số tín chỉ</td>
                    <td>Điểm A(1)</td>
                    <td>Điểm A(2)</td>
                    <td>Điểm B</td>
                    <td>Điểm C</td>
                    <td>TK(10)</td>
                    <td>TK(CH)</td>
                </tr>
                <?php  $danhsachsinhvien_hk = $this->sinhvien_models->danhsachmonhoc_hk($masinhvien,$key->id_hocki);
                    foreach ($danhsachsinhvien_hk as $svhk) {
                        $monhoc = $this->monhoc_models->getinfo($svhk->mamh);
                        foreach($monhoc as $mh){};
                ?>
                <tr style="font-family: times; font-size: 18; ">
                    <td>
                        <?php echo $svhk->mamh ?>
                    </td>
                    <td><?php echo $mh->tenmonhoc ?></td>
                    <td style="text-align: center";><?php echo $mh->sotinchi ?></td>
                    <td style="text-align: center";><?php echo $svhk->diemA ?></td>
                    <td style="text-align: center";><?php echo $svhk->diemA_2 ?></td>
                    <td style="text-align: center";><?php echo $svhk->diemB ?></td>
                    <td style="text-align: center";><?php echo $svhk->diemC ?></td>
                    <td style="text-align: center";><?php echo $svhk->TK10 ?></td>
                    <td style="text-align: center";><?php echo $svhk->TKCH ?></td>
                </tr>
                <?php
                    }
                 ?>
            </table>
            <?php 
            $session_login = $this->session->userdata('masinhvien');
            $diemrl = $this->sinhvien_models->get_drl($hk->id_hocki,$session_login);
            echo "Điểm rèn luyện: ".$diemrl;
            $tinchi_1ki = $this->sinhvien_models->gettinchi($hk->id_hocki,$session_login);
            $sum = $this->sinhvien_models->get_tong($hk->id_hocki,$session_login);
            echo '<br>';
            echo "Điểm trung bình học kì: ".round($sum/$tinchi_1ki,2);
             ?>
        </div>
            <?php
                }
            }
             ?>
        </div>
    </div>
</section>
