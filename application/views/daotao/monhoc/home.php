<?php   
include'header.php';
 ?>
 <section class="row">
 	<div class="max">
		<div class="col-md-6">
			<div style="padding:10px">
				<?php echo form_open('daotao/monhoc/home/search') ?>
				<div class="input-group">
			      <input type="text" class="form-control" name="name" placeholder="Tên môn học..." required>
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
				<div style="width: 700px;">
				<table class="table table-bordered ">
					<tr style="font-family: Times; font-size: 17; font-weight: bold; text-align: center;">
						<td>STT</td>
						<td>Mã môn học </td>
						<td>Tên môn học</td>
						<td>Số tín chỉ</td>
						<td>Bộ Môn</td>
						<td>Loại</td>
						<th colspan="2" style="text-align: center;">Thao tác</th>
					</tr>
				
				<?php
				$i = 0;
				foreach ($search as $key) {
					$i++;
				?>
				<tr style="font-family: Times; font-size: 17">
					<td><?php echo $i ?></td>
					<td><?php echo $key->mamh ?></td>
					<td><a href="<?php echo base_url() ?>daotao/monhoc/home/molop/<?php echo $key->mamh ?>"><?php echo $key->tenmonhoc ?></a></td>
					<td><?php echo $key->sotinchi ?></td>
					<td><?php echo $key->manganh ?></td>
					<td><?php echo $key->loai ?></td>
					<!-- <td><?php echo $bm->tenbomon ?></td>
					<td><?php echo $kh->tenkhoa ?></td> -->
					<td>
						<a href="<?php echo base_url() ?>daotao/monhoc/home/view/<?php echo $key->mamh ?>"><i class="fa fa-search"></i></a>
					</td>
					<td>
						<a href="<?php echo base_url() ?>daotao/monhoc/home/xoa/<?php echo $key->mamh ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa môn học <?php echo $key->tenmonhoc ?> ?')"><i class="fa fa-remove"></i></a>
					</td>
				</tr>
				<?php 
				}
                ?>
                </table>
                </div>
                <?php
			} else{
				?>
			<div  style="height: 500px; overflow-x: hidden; width: 700px;">
			 <?php 
			 if(isset($mh_full)){
			 	?>
			 	<table class="table table-bordered" >
			 		<tr style="font-family: Times; font-size: 17; font-weight: bold; text-align: center;">
			 			<td>STT</td>
						<td>Mã môn học </td>
						<td>Tên môn học</td>
						<td>Số tín chỉ</td>
						<td>Bộ môn</td>
						<td>Loại</td>
						<th colspan="2"> Thao tác</th>
						
			 		</tr>
			 		<?php 
			 		$i = 0;
			 		foreach ($mh_full as $key) {
			 			$i++;
			 			?>
			 			<tr style="font-family: Times; font-size: 17" >
			 				<td><?php echo $i ?></td>
			 				<td><?php echo $key->mamh ?></td>
			 				<td><a href="<?php echo base_url() ?>daotao/monhoc/home/molop/<?php echo $key->mamh ?>"><?php echo $key->tenmonhoc ?></a></td>
			 				<td><?php echo $key->sotinchi ?></td>
			 				<td><?php echo $key->manganh ?></td>
							<td><?php echo $key->loai ?></td>
			 				<td>
								<a href="<?php echo base_url() ?>daotao/monhoc/home/view/<?php echo $key->mamh ?>"><i class="fa fa-search"></i></a>
							</td>
							<td>
								<a href="<?php echo base_url() ?>daotao/monhoc/home/xoa/<?php echo $key->mamh ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa môn học <?php echo $key->tenmonhoc ?> ?')"><i class="fa fa-remove"></i></a>
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
		if(isset($monhoc))
		{
			foreach ($monhoc as $key){}
				$nganh1 = $this->home_models->get_info($key->manganh,'manganh','tb_nganh');
					if($nganh1){
						foreach ($nganh1 as $ng1) {}
					}
				$khoa1 = $this->home_models->get_info($ng1->makhoa,'makhoa','tb_khoa');
				foreach ($khoa1 as $kh1) {				
				}
				?>
		<div class="col-md-4">
			<?php 
			echo form_open('daotao/monhoc/home/sua/'.$key->mamh);
			 ?>
			<div class="text-center">
				<h2 style="font-family: Times; font-weight: bold;font-size: 20;">CẬP NHẬT THÔNG TIN MÔN HỌC</h2>
				<hr>
				<?php 
				if(isset($add)){ 
					echo $add;
				}
				 ?>
			</div>
			<div style="font-family: Times; font-size: 18;">
			<div class="form-group">
				<p>Mã môn học: </p>
				<b><?php echo $key->mamh ?></b>
			</div>
			<div class="form-group">
				<p>Tên môn học: </p>
				<input type="text" name="tenmonhoc" value="<?php echo $key->tenmonhoc?>" required class="form-control">
			</div>
			<div class="form-group"> 
				<p> Số tín chỉ: </p>
				<input type="text" name="sotinchi" value="<?php echo $key->sotinchi?>" required class="form-control">
			</div>
			<div class="form-group">
				<p> Loại:<b> <?php echo $key->loai ?></b></p>
				<select class="form-control" name="loai">
					<option value="TCA">Tự chọn A</option>
					<option value="TCB"  >Tự chọn B</option>
					<option value="TCC"  >Tự chọn C</option>
					<option value="BB" >Bắt buộc</option>	
				</select>
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
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Lưu</button>
			</div>
			 <?php echo form_close(); ?>
			 </div>
		</div>
			<?php
		}
		else{ ?>
		<div class="col-md-4">
			<?php 
			echo form_open('daotao/monhoc/home/add');
			 ?>
			<div class="text-center" >
				<h2 style="font-family: Times; font-weight: bold;font-size: 20;">THÊM MỚI MÔN HỌC</h2>
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
			<div style="font-family: Times; font-size: 17;">
			<div class="form-group" >
				<p>Mã môn học: </p>
				<input type="number" name="mamh" required class="form-control">
			</div>
			<div class="form-group">
				<p>Tên môn học: </p>
				<input type="text" name="tenmonhoc" required class="form-control">
			</div>
			<div class="form-group">
				<p>Số tín chỉ: </p>
				<input type="text" name="sotinchi" required class="form-control">
			</div>
			<div class="form-group">
				<p>Loại: </p>
				<select class="form-control" name="loai">
					<option value="TCA">Tự chọn A</option>
					<option value="TCB"  >Tự chọn B</option>
					<option value="TCC"  >Tự chọn C</option>
					<option value="BB" >Bắt buộc</option>	
				</select>
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
		</div>
		<?php } ?>
 	</div>
 </section>
 <script type="text/javascript">
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
                        url:"<?php echo base_url() ?>daotao/monhoc/home/list_chuyennganh",
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
        
    </script>