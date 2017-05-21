<?php
include'header.php';

 ?>
 <section class="row">
     <div class="max">
         <div style="max-width: 500px; border: 1px #ccc solid; margin: 0 auto;padding: 10px; margin-bottom: 10px">
             <?php if(isset($danhsachsinhvien)) {
                 foreach ($danhsachsinhvien as $item) {
                 }
             }
                 ?>
             <?php
             $monhoc = $this->monhoc_models->getinfo($mamh);

             if($monhoc){
                 foreach ($monhoc as $value){}
             }
             $magiaovien = $this->monhoc_models->get_allinfo($mamh,$nhommonhoc);
             if($magiaovien){
                 foreach ($magiaovien as $gv){}
             }
             $tengiaovien = $this->monhoc_models->getgiaovien($gv->magiaovien);
             if($tengiaovien){
                 foreach ($tengiaovien as $tgv) {}
             }
             ?>
             <label for="">Mã môn học:</label>&nbsp;<span> <?php echo $mamh?></span><br>
             <label for="">Mã môn học:</label>&nbsp;<span> <?php echo $nhommonhoc?></span><br>
             <label for="">Tên lớp:</label>&nbsp;<span><?php echo $value->tenmonhoc?></span><br>
             <label for="">Giáo viên:</label>&nbsp;<span><?php echo $tgv->tengiaovien?></span>
         </div>
         <table class="table table-bordered">
            <tr>
                <td>Mã sinh viên</td>
                <td>Tên sinh viên</td>
                <td>Lớp</td>
                <td>Tình trạng</td>
            </tr>
             <?php if(isset($danhsachsinhvien)){
                 foreach ($danhsachsinhvien as $row){
                  $sinhvien = $this->sinhvien_models->infomation($row->masinhvien);
                    if($sinhvien){
                        foreach ($sinhvien as $key){};
                    }else{echo 1;}
             ?>
             <tr <?php if($row->masinhvien == $session_sv){ ?>style="background: #a6e1ec" <?php } ?> >
                 <td><?php echo $row->masinhvien?></td>
                 <td><?php echo $key->tensinhvien?></td>
                 <td><?php echo $key->malop?></td>
                 <td><?php
                 if($key->tinhtrang == 0){
                     echo "";
                 }
                     ?></td>
             </tr>
             <?php
                  }
             }?>
         </table>
     </div>
 </section>