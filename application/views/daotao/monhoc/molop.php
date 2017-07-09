<?php 
include'header.php';
?>
<section class="row">
	<div class="max">
		<div style="width:500px; margin: 0 auto;">
			<?php 
			if(isset($err)){
				echo $err;
			}
			 ?>
			<?php echo form_open('daotao/monhoc/home/dkmonhoc/'.$mamh) ?>
			<?php 
			if(isset($monhoc)){
				foreach ($monhoc as $mh) {
				}
			}

			?>
			<div>
				<p>Môn học: <b><?php echo $mh->tenmonhoc ?></b></p>
			</div>
			<div>
				<p>Mã môn học: <b><?php echo $mh->mamh ?></b></p>
			</div>
			<div class="form-group">
				<p>Chọn nhóm: </p>
				<input type="text" name="nhom" required class="form-control">
			</div>
			<div class="form-group">
				<p>Giáo viên: </p>
				<select class="form-control" name="magiaovien">
					<?php 
					if($giaovien){
						foreach ($giaovien as $gv) {
					?>
					<option value="<?php echo $gv->magiaovien ?>"><?php echo $gv->tengiaovien ?></option>
					<?php
						}
					}

					 ?>
				</select>
			</div>
			<div class="form-group">
				<p>Sĩ số:</p>
				<input type="number" min="15" name="siso" required class="form-control">
			</div>
			<div class="text-center">
				<input type="submit" value="Thêm nhóm" class="btn btn-success">
			</div>
			<?php echo form_close() ?>
		</div>
		
	</div>
</section>