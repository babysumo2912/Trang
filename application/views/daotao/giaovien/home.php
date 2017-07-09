<?php     
include'header.php'; 
 ?>
 <section class="row">
 	<div class="max">
		<div class="col-md-6">
			<div style="padding:10px">
				<?php echo form_open('daotao/giaovien/home/search') ?>
				<div class="input-group">
			      <input type="text" class="form-control" name="name" placeholder="Tên giáo viên..." required>
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="submit">Tìm kiếm</button>
			      </span>
			    </div>
			    <?php 
			    if(isset($err)){
			    	echo $err;
			    } 

			     ?>
				<?php echo form_close() ?>
			</div> 
			<?php 
			if(isset($search)){
				?>
				<table class="table table-bordered ">
					<tr style="font-family: Times; font-size: 17; font-weight: bold; text-align: center;">
						<td>STT</td>
						<td>Mã giáo viên</td>
						<td>Tên giáo viên</td>
						<td>Mật khẩu</td>
						<td>Bộ môn</td>
						<th colspan="2">Thao tác</th>
						
					</tr> 
				
				<?php
				$i = 0;
				foreach ($search as $key) 
				{
					$i++;
					$nganh = $this->home_models->get_info($key->manganh,'manganh','tb_nganh');
					if($nganh){
						foreach ($nganh as $ng) {}
					}
					$khoa = $this->home_models->get_info($ng->makhoa,'makhoa','tb_khoa');
					if($khoa){
						foreach ($khoa as $kh) {}
					}  
				?>
				<tr style="font-family: Times; font-size: 17">
					<td><?php echo $i ?></td>
					<td><?php echo $key->magiaovien ?></td>
					<td><?php echo $key->tengiaovien ?></td>
					<td><?php echo $key->matkhau ?></td>
					<td><?php echo $ng->tennganh ?></td>
					<td>
						<a href="<?php echo base_url() ?>daotao/giaovien/home/view/<?php echo $key->magiaovien ?>"><i class="fa fa-search"></i></a>
					</td>
					<td>
						<a href="<?php echo base_url() ?>daotao/giaovien/home/delete/<?php echo $key->magiaovien ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa giáo viên <?php echo $key->tengiaovien ?> ?')"><i class="fa fa-remove"></i></a>
					</td>
				</tr>
				<?php
				}
				?>
			</table>
				<?php
			}else{

			 ?>
			 <div  style="height: 500px; overflow-x: hidden;">
			 <?php 
			 if(isset($gv_full))
			 {
			 	?>
			 	<table class="table table-bordered">
			 		<tr style="font-family: Times; font-size: 17; font-weight: bold; text-align: center;">
			 			<td>STT</td>
			 			<td>Mã giáo viên</td>
			 			<td>Tên giáo viên</td>
			 			<td>Mật khẩu</td>
			 			<td>Bộ môn</td>
			 			<td>Thao tác</td>
			 		</tr>
			 		<?php 
			 		$i = 0;
			 		foreach ($gv_full as $key) {
			 			$i++;
			 			?>
			 			<tr style="font-family: Times; font-size: 17">
			 				<td><?php echo $i ?></td>
			 				<td><?php echo $key->magiaovien ?></td>
			 				<td><a href="<?php echo base_url() ?>daotao/giaovien/home/view/<?php echo $key->magiaovien ?>"><?php echo $key->tengiaovien ?></a></td>
			 				<td><?php echo $key->matkhau ?></td>
			 				<td style="text-align: center;"><?php echo $key->manganh ?></td>
			 				<td>
			 					<a href="<?php echo base_url() ?>daotao/giaovien/home/delete/<?php echo $key->magiaovien ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa giáo viên <?php echo $key->tengiaovien ?> ?')"><i class="fa fa-remove" style="padding-left: 20px;"></i></a>
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
			 <?php } ?>
		</div>
		<div class="col-md-1"></div>
		<?php 
		if(isset($giaovien))
		{
			foreach ($giaovien as $key){}
				$nganh1 = $this->home_models->get_info($key->manganh,'manganh','tb_nganh');
					if($nganh1)
					 {
						foreach ($nganh1 as $ng1) {}
					 }
				$khoa1 = $this->home_models->get_info($ng1->makhoa,'makhoa','tb_khoa');
				foreach ($khoa1 as $kh1) {} 
		?>
		<div class="col-md-4">
			<?php 
			echo form_open('daotao/giaovien/home/sua/'.$key->magiaovien);
			 ?>
			<div class="text-center">
				<h2 style="font-family: Times; font-size:20;font-weight: bold;">CẬP NHẬT THÔNG TIN </h2>
				<hr>
				<?php 
				if(isset($add)){
					echo $add;
				}
				 ?>
			</div>
			<div class="form-group">
				<p>Mã giáo viên: </p>
				<b><?php echo $key->magiaovien ?></b>
			</div>
			<div class="form-group">
				<p>Tên giáo viên: </p>
				<input type="text" name="tengiaovien" value="<?php echo $key->tengiaovien?>" required class="form-control">
			</div>
			<div class="form-group">
				<p>Mật khẩu: </p>
				<input type="text" name="matkhau" value="<?php echo $key->matkhau?>" required class="form-control">
			</div>
			<div class="form-group">
				<p>Chọn khoa: <b><?php echo $kh1->tenkhoa ?></b></p>
				<select class="form-control" id="khoa" name="makhoa">
					<option value="0">Chọn khoa</option>
					<?php 
					if(isset($khoa)){
						foreach ($khoa as $kh) {
					?>
					<option value="<?php echo $kh->makhoa ?>"><?php echo $kh->tenkhoa ?></option>
					<?php
						}
					}

					 ?>
				</select>
			</div>
			<div class="form-group">
				<p>Chọn bộ môn: <b><?php echo $ng1->tennganh ?></b></p>
				<select class="form-control" disabled="" id="chuyennganh" name="manganh">
					<option value="0">Bộ môn</option>
				</select>
			</div>
			<!-- <div class="form-group">
				<p>Chủ nhiệm lớp:</p>
				<select class="form-control" disabled="" id="lop">
					<option value="<?php echo $key->lop ?>"><?php echo $key->lop ?></option>
				</select> -->
			<!-- </div> -->
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Lưu</button>
			</div>
			 <?php echo form_close(); ?>
		</div>
			<?php
		}
		else{ ?>
		<div class="col-md-4">
			<?php 
			echo form_open('daotao/giaovien/home/add');
			 ?>
			<div class="text-center">
				<h2 style="font-family: Times; font-size:20; font-weight: bold;">THÊM MỚI GIÁO VIÊN</h2>
				<hr>
				<?php 
				if(isset($err_add)){
					echo $err_add;
				}
				if(isset($add)){
					echo $add;
				}
				 ?>
			</div>
			<div class="form-group">
				<p>Mã giáo viên: </p>
				<input type="number" name="magiaovien" required class="form-control">
			</div>
			<div class="form-group">
				<p>Tên giáo viên: </p>
				<input type="text" name="tengiaovien" required class="form-control">
			</div>
			<div class="form-group">
				<p>Mật khẩu: </p>
				<input type="text" name="matkhau" required class="form-control">
			</div>
			<div class="form-group">
				<p>Chọn khoa:</p>
				<select class="form-control" id="khoa" name="makhoa">
					<option value="0">Chọn khoa</option>
					<?php 
					if(isset($khoa)){
						foreach ($khoa as $kh) {
					?>
					<option value="<?php echo $kh->makhoa ?>"><?php echo $kh->tenkhoa ?></option>
					<?php
						}
					}

					 ?>
				</select>
			</div>
			<div class="form-group">
				<p>Chọn bộ môn:</p>
				<select class="form-control" disabled="" id="chuyennganh" name="manganh">
					<option value="0">Bộ môn</option>
				</select>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Thêm</button>
			</div>
			 <?php echo form_close(); ?>
		</div>
		<?php } ?>
 	</div>
 </section>
 <script type="text/javascript"> //chon cbb 
        $(document).ready(function(){
           $('#khoa').on('change', function(){
                var makhoa = $(this).val();
                if(makhoa == '0')
                {
                    $('#chuyennganh').prop('disabled', true);
                }
                else
                {
                    $('#chuyennganh').prop('disabled', false);
                    // alert(makhoa);
                    $.ajax({
                        url:"<?php echo base_url() ?>daotao/giaovien/home/list_bomon",
                        type: "POST",
                        data: {'makhoa' : makhoa},
                        dataType: 'json',
                        success: function(data){
                           $('#chuyennganh').html(data);
                        },
                        error: function(){
                            $('#chuyennganh').prop('disabled', true);
                        }
                    });
                }
           }); 
        });
        $(document).ready(function(){
           $('#chuyennganh').on('change', function(){
                var mabomon = $(this).val();
                if(mabomon == '0')
                {
                    $('#lop').prop('disabled', true);
                }
                else
                {
                    $('#lop').prop('disabled', false);
                    // alert(makhoa);
                    $.ajax({
                        url:"<?php echo base_url() ?>daotao/giaovien/home/list_lop",
                        type: "POST",
                        data: {'mabomon' : mabomon},
                        dataType: 'json',
                        success: function(data){
                           $('#lop').html(data);
                        },
                        error: function(){
                            $('#lop').prop('disabled', true);
                        }
                    });
                }
           }); 
        });
    </script>