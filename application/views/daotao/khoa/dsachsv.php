<?php  
include'header.php';
 ?>
 <section class="row">
    <div class="max">
        <p style="text-align: center;font-family: Times; font-size: 26">Danh sách Sinh viên lớp <?php 
        if(isset($tenlop)){
            foreach ($tenlop as $tl) {
                echo $tl->tenlop;
            }
        }

         ?></p>
         <a href="<?php echo base_url() ?>report/report_ds/<?php echo $malop ?>" class="btn btn-success">In Danh Sách</a>
         <hr>
         <div>
             <table class="table table-bordered">
                 <tr style="text-align: center;font-weight: bold; font-family: Times; font-size: 18">
                     <td>STT</td>
                     <td>Mã sinh viên</td>
                     <td>Tên sinh viên</td>
                     <td>Giới tính</td>
                     <td>Ngày sinh</td>
                     <td>Nơi sinh</td>
                     <td>Điểm TB hệ 4</td>
                     <td>Điểm rèn luyện</td>
                 </tr>

                 <?php 
                 $hocki = $this->home_models->hocki();
                 foreach ($hocki as $hk) {};
                 if(isset($data1)){
                    $i = 0;
                    foreach($data1 as $row){
                        $tinchi_1ki = $this->sinhvien_models->gettinchi($hk->id_hocki,$row->masinhvien);
                        $sum = $this->sinhvien_models->get_tong($hk->id_hocki,$row->masinhvien);
                        $diemrl = $this->sinhvien_models->get_drl($hk->id_hocki,$row->masinhvien);
                        $i ++;
                        // $this->

                ?>
                <tr
                <?php 
                if($tinchi_1ki != 0){
                    if(round($sum/$tinchi_1ki,2) >= 3.6 && $diemrl >= 85){
                ?> 
                style="background: red;color: white";
                <?php
                    }else{
                    if(round($sum/$tinchi_1ki,2) >= 3.2 && $diemrl >= 80){
                    ?> 
                    style="background: yellow";
                    <?php
                    }}
                }

                 ?>

                >
                    <td><?php echo $i ?></td>
                    <td><?php echo $row->masinhvien ?></td>
                    <td><?php echo $row->tensinhvien ?></td>
                    <td style="text-align: center;"><?php echo $row->phai ?></td>
                    <td style="text-align: center;"><?php echo $row->ngaysinh ?></td>
                    <td ><?php echo $row->quequan ?></td>
                    <td style="text-align: center;">
                        <?php 
                        if($tinchi_1ki == 0){
                            echo 0;
                        }else{
                            echo round($sum/$tinchi_1ki,2);
                        }

                         ?>
                    </td>
                    <td style="text-align: center;"><?php echo $diemrl ?></td>
                    
                    
                </tr>
                <?php
                    }
                 }


                ?>
             </table>
         </div>
    </div>
 </section>
