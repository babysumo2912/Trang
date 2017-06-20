<?php 
include'header.php';;

 ?>
 
 <?php 
 if(isset($tenlop)){
 	foreach ($tenlop as $key) {
 		
 	}
 }
  ?>
 <section class="row">
 	<div class="max">
 		<h2>Danh sách sinh viên lớp <?php echo $key->tenlop ?></h2>
 	
 	<?php 
 	if(isset($data1)){
 		?>
 		<table class="table table-bordered">
 			<tr>
 				<td>STT</td>
 				<td>Tên sinh viên</td>
 				<td>Mã sinh viên</td>
 				<td>Điểm tổng kết</td>
 				<td>Điểm rèn luyện</td>
 				<td>Học bổng</td>
 			</tr>
 		
 		<?php

 		$i = 0;
 		foreach ($data1 as $value) {
 			$i++;
 			$hocki = $this->home_models->hocki();
	        foreach ($hocki as $hk) {};
	        $diemrenluyen = $this->giaovien_models->get_info1($value->masinhvien,'masinhvien','tb_diemrenluyen');
	        foreach ($diemrenluyen as $drl) {};
	        $danhsachmonhoc_sinhvien = $this->sinhvien_models->danhsachmonhoc_hk($value->masinhvien,$hk->id_hocki);
            if($danhsachmonhoc_sinhvien){
	            $tongdiem = 0;
        		$tongdiem10 = 0;
        		$sotinchidat = 0;
                foreach ($danhsachmonhoc_sinhvien as $svhk) {
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
            }else $data['danhsachmonhoc_sinhvien'] = '';
 			?>
 			<tr 
 			<?php if(round($tongdiem/$sotinchidat,2)>=3.2 && $drl->diemrl >=75){
			?>
			style="background: #ccc";
			<?php
			} ?>
 			>
 				<td><?php echo $i; ?></td>
 				<td><?php echo $value->tensinhvien ?></td>
 				<td><?php echo $value->masinhvien ?></td>
 				<td><?php echo round($tongdiem/$sotinchidat,2) ?></td>
 				<td><?php echo $drl->diemrl ?></td>
 				<td>
 					<?php if(round($tongdiem/$sotinchidat,2)>=3.2 && $drl->diemrl >=75){
 						?>
 						<i class="fa fa-check"></i>
 						<?php
 						} ?>
 				</td>
 			</tr>
 			<?php
 		}
 		?>
 		</table>
 		<?php
 	}

 	 ?>
 	 </div>
 </section>