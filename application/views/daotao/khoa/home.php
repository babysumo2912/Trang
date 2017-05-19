<?php 
include 'header.php';
 ?>
 <div class = "row">
 <div class = "max">
 	<div class = "col-xs-8">
 		<h3>Danh sách các khoa</h3>
		<table class = "table table-bordered">
			<tr class = "text-center">
				<th>Mã khoa</th>
				<th>Danh Sách các khoa</th>
				<th>Chức năng</th>
			</tr>
			<?php 
			if(isset($khoa)){
				foreach ($khoa as $key) {
			?>
			<tr>
				<td><?php echo $key->makhoa?></td>
				<td><?php echo $key->tenkhoa?></td>
				<td>
					<a style="float: left" href="<?php echo base_url()?>khoa/home/update/<?php echo $key->makhoa?>"><i class = "fa fa-cog"></i>&nbsp;Sửa</a>
					<a href="<?php echo base_url()?>khoa/delete/<?php echo $key->makhoa?>" style = "float: right"><i class = "fa fa-close"></i>&nbsp;Xóa</a>
				</td>
			</tr>
			<?php
				}
			}

			 ?>
		</table>
	</div>
	<div class = "col-xs-4">
	<?php 
	if(isset($khoaup)){
		$style = array(
			'class' => 'form-group'
			);
		
		foreach ($khoaup as $row) {
			echo form_open('khoa/home/update/'.$row->makhoa);
		
		?>
		<fieldset>
			<legend>Form chức năng</legend>
			<div class="form-group">
				<label>Tên khoa</label>
				<input type="text" name="tenkhoa" class = "form-control" value="<?php echo $row->tenkhoa?>">
			</div>
			<div class="form-group text-center">
				<input type="submit" class = "btn btn-info" value="Lưu thay đổi">
			</div>
		</fieldset>

		<?php echo form_close();

		}
	}else{

	?>
		<?php
		$style = array(
			'class' => 'form-group'
			);
		echo form_open('khoa/add');
		?>
		<fieldset>
			<legend>Form chức năng</legend>
			<div class="form-group">
				<label>Tên khoa</label>
				<input type="text" name="tenkhoa" class = "form-control">
			</div>
			<div class="form-group text-center">
				<input type="submit" class = "btn btn-info" value="Thêm mới">
			</div>
		</fieldset>
		<?php echo form_close();
		}?>

	</div>
 </div>
 </div>