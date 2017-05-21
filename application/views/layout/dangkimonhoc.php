<?php 
$masinhvien = $this->session->userdata('masinhvien');
?>
<?php 
include'header.php';
 ?>
 <section class="row">
 	<div class="max">
 		<?php 
 			$style = array(
 				'class' => 'form-group col-md-5 col-sm-6 col-xs-12'
 				);
 			echo form_open('sinhvien/dangkimonhoc/search',$style);
 			 ?>
		<!-- <fieldset> -->
			<!-- <legend>Tìm kiếm môn học</legend> -->
			<div class="form-group">
 				<table>
 					<tr>
 						<td>Tìm kiếm theo mã:&nbsp;</td>
 						<td>
 							<input type="text" name="mamonhoc" class="form-control" value="<?php if(isset($mamonhoc)){echo $mamonhoc;} ?>" required>
 						</td>
 						<td>
 							<input type="submit" value="Tìm kiếm" class="btn btn-info form-control">
 						</td>
 					</tr>
 				</table>
 			</div>
		<!-- </fieldset> -->
 		<?php
 		echo form_close();
 		?>
 		<?php 
 		if(isset($err)){
 			echo $err;
 		}

 		 ?>
 		 <div class="col-md-12 col-sm-12 col-xs-12">
	 		 <!-- <fieldset> -->
 		 	<!-- <legend>Danh sách nhóm môn học</legend> -->
 		 	<table class="table table-hover">
 		 		<tr>
 		 			<td></td>
 		 			<td>Mã môn học</td>
 		 			<td>Tên môn học</td>
 		 			<td>Giáo viên</td>
 		 			<td>NMH</td>
 		 			<td>STC</td>
 		 			<td>Sĩ số</td>
 		 			<td>CL</td>
 		 		</tr>
 		 		<?php 
 		 		if(isset($search)) {
                    foreach ($search as $key) {
                        $danhsach = $this->monhoc_models->getdanhsach($key->mamh, $key->nhommonhoc);
                        $getinfo = $this->monhoc_models->getinfo($key->mamh);
                        if ($getinfo) {
                            foreach ($getinfo as $row) {
                            };
                            $giaovien = $this->monhoc_models->getgiaovien($key->magiaovien);
                            if (isset($giaovien)) {
                                foreach ($giaovien as $title) {
                                };
                            }
                        }
                        ?>
                        <tr
                            <?php
                            if (isset($danhsach)) {
                                if ($key->siso - count($danhsach) <= 0) {
                            ?>
                            style="background: #ccc"
                            <?php }
                            }?>
                        >
                            <td>
                                <?php
                                if (isset($danhsach)) {
                                    if ($key->siso - count($danhsach) <= 0) {
                                        echo "";
                                    } else{
                                ?>
                                <a href="<?php echo base_url() ?>sinhvien/dangkimonhoc/add/<?php echo $masinhvien ?>/<?php echo $key->nhommonhoc ?>/<?php echo $key->mamh ?>"
                                   title="thêm vào danh sách môn học"><i class="fa fa-plus"></i></a>
                                <?php
                                    }

                                }else{
                                ?>
                                    <a href="<?php echo base_url() ?>sinhvien/dangkimonhoc/add/<?php echo $masinhvien ?>/<?php echo $key->nhommonhoc ?>/<?php echo $key->mamh ?>"
                                       title="thêm vào danh sách môn học"><i class="fa fa-plus"></i></a>
                                <?php
                                }?>
                            </td>
                            <td>
                                <?php echo $key->mamh ?>
                            </td>
                            <td>
                                <a target="_blank"
                                   href="<?php echo base_url() ?>sinhvien/danhsachlophoc/view/<?php echo $key->mamh ?>/<?php echo $key->nhommonhoc ?>">
                                    <?php echo $row->tenmonhoc ?>
                                </a>
                            </td>
                            <td><?php echo $title->tengiaovien ?></td>
                            <td><?php echo $key->nhommonhoc ?></td>
                            <td><?php echo $row->sotinchi ?></td>
                            <td><?php echo $key->siso ?></td>
                            <td>
                                <?php
                                if (isset($danhsach)) {
                                    if ($key->siso - count($danhsach) <= 0) {
                                        echo "Full";
                                    } else echo $key->siso - count($danhsach);

                                } else echo $key->siso; ?>
                            </td>
                        </tr>
                        <?php

                    }
                }

 		 		 ?>
 		 	</table>
 		 <!-- </fieldset> -->
 		</div>
 	</div>

 </section>
 <section class="row">
 	<div class="max">
 		<table class="table table-hover table-bordered">
 		<caption>Danh sách môn học đã chọn</caption>
			<tr>
				<td>STT</td>
				<td>Mã môn học</td>
				<td>Tên môn học</td>
				<td>Nhóm môn học</td>
				<td>STC</td>
				<td>Học phí</td>
			</tr>
			<?php 
			if(isset($danhsachmonhoc_sinhvien)){
				$i = 1;
				foreach ($danhsachmonhoc_sinhvien as $key) {
					$getinfo = $this->monhoc_models->getinfo($key->mamh);
					if($getinfo){
						foreach ($getinfo as $row) {};
					}
			 ?>
			 <tr>
			 	<td><?php echo $i ?></td>
			 	<td><?php echo $key->mamh ?></td>
			 	<td>
                    <a target="_blank" href="<?php echo base_url()?>sinhvien/danhsachlophoc/view/<?php echo $key->mamh ?>/<?php echo $key->nhommonhoc?>">
                        <?php echo $row->tenmonhoc ?>
                    </a>
                </td>
			 	<td><?php echo $key->nhommonhoc?></td>
			 	<td><?php echo $row->sotinchi ?></td>
			 	<td><?php echo number_format($row->sotinchi * 300000);?></td>
			 	<td>
			 		<a href="<?php echo base_url()?>sinhvien/dangkimonhoc/delete/<?php echo $key->mamh?>/<?php echo $key->nhommonhoc?>/<?php echo $key->masinhvien ?>" title="Xóa"> <i class = "fa fa-remove"></i></a>
			 	</td>
			 </tr>
			 <?php
			 $i++;
			 	}
			}
			?>
 		</table>
 	</div>
 </section>