 
<?php     
include'header.php';
 ?>
 <section class="row">
 	<div class="max">
		<div class="col-md-4">
			<div style="padding:10px; font-family: Times; font-size:20">
				<?php echo form_open('daotao/sinhvien/home/search') ?>
				<!-- <div class="input-group">
			      <input type="text" class="form-control" name="name" placeholder="Tên sinh viên..." required>
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="submit">Tìm kiếm</button>
			      </span>
			    </div> -->
			    <div class="text-center" style="font-family: Times; font-size:20">
			    	<p><b>Tìm kiếm</b></p>
			    </div>
			    <hr>
			    <div class="form-group">
			    	<p>Tên sinh viên:</p>
		    		<input type="text" name="name" required class="form-control">
			    </div>
			    <div class="form-group">
			    	<p>Chọn khoa:</p>
					<select class="form-control" id="khoa1" name="makhoa">
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
			    	<p>Chọn ngành:</p>
					<select class="form-control" disabled="" id="chuyennganh1" name="mabomon">
						<option value="0">Ngành</option>
					</select>
			    </div>
			    <div class="form-group">
			    	<p>Chọn lớp:</p>
		    		<select class="form-control" disabled="" id="lop1" name="malop">
						<option value="0">Lớp</option>
					</select>
			    </div>
			    <div class="text-center">
			    	<input type="submit" value="Lọc" class="btn btn-primary">
			    </div>
			    <?php 
			    if(isset($err)){
			    	echo $err;
			    }

			     ?>
				<?php echo form_close() ?>
			</div>
			 
			 
		</div>
		<!-- <div class="col-md-1"></div> -->
		<?php if(isset($sinhvien)){
			foreach ($sinhvien as $key){};
				// $lop1 = $this->home_models->get_info($key->malop,'malop','tb_lop');
			// if($lop1){
			// 	foreach ($lop1 as $l123) {};
			// 	$tenlop = $l123->tenlop;
			// 	$chuyennganh1 = $this->home_models->get_info($l123->mabomon,'mabomon','tb_bomon');
			// 	if($chuyennganh1){
			// 		foreach ($chuyennganh1 as $cn) {}
			// 		$tenchuyenganh1 = $cn->tenbomon;
			// 		$khoa1 = $this->home_models->get_info($cn->makhoa,'makhoa','tb_khoa');
			// 		if($khoa1){
			// 			foreach ($khoa1 as $kh1) {};
			// 			$tenkhoa = $kh1->tenkhoa;
			// 		}
			// 	}
			// }


				?>
		<div class="col-md-7">
			<?php 
			echo form_open('daotao/sinhvien/home/sua/'.$key->masinhvien);
			 ?>
			<div class="text-center">
				<p style="font-family: Times; font-size:20; font-weight: bold;">CẬP NHẬT THÔNG TIN SINH VIÊN</p>
				<hr>
				<?php 
				if(isset($add)){
					echo $add;
				}
				 ?>

			</div>
			<table>
			<tr> 
			<td>
			<div style="width: 350px;">			
			<div class="form-group">
				<p>Mã sinh viên: </p>
				<b><?php echo $key->masinhvien ?></b>
			</div>
			<div class="form-group">
				<p>Tên sinh viên: </p>
				<input type="text" name="tensinhvien" value="<?php echo $key->tensinhvien?>" required class="form-control">
			</div>
			<div class="form-group">
				<p>Phái: </p>
				<input type="radio" name="phai" value="Nam" checked> Nam
				<input type="radio" name="phai" value="Nữ" style="margin-left: 30px"> Nữ
			</div>
			<div class="form-group">
				<p> Ngày sinh: </p>
				<input type="date" name="ngaysinh" value="<?php echo $key->ngaysinh?>" required class="form-control">
			</div>
			</div>
			</td>
			</tr>
			<tr>
			<div style="width: 350px; float: right;">
			<div class="form-group">
				<p> Nơi sinh: <b><?php echo $key->quequan ?></b></p>
				<select class="form-control" name="quequan">
					<option value="Hà Nội">Hà Nội</option>
					<option value="Ninh Bình"  >Ninh Bình</option>
					<option value="Thái Bình"  >Thái Bình</option>
					<option value="Nam Định" >Nam Định</option>
					<option value="Hưng Yên" >Hưng Yên</option>
					<option value="Hải Dương" >Hải Dương</option>
					<option value="Hải Phòng" >Hải Phòng</option>
					<option value="Thanh Hóa" >Thanh Hóa</option>
					<option value="Thái Nguyên" >Thái Nguyên</option>
					<option value="Bắc Giang" >Bắc Giang </option>
					<option value="Bắc Ninh" >Bắc Ninh</option>
					<option value="Vĩnh Phúc" >Vĩnh Phúc</option>
					<option value="Nghệ An" >Nghệ An</option>
					<option value="Hòa Bình" >Hòa Bình</option>
					<option value="Cao Bằng" >Cao Bằng</option>
					<option value="Lào Cai" >Lào Cai</option>
					<option value="Yên Bái" >Yên Bái</option>
					<option value="Phú Thọ" >Phú Thọ</option>

				</select>
				<!-- <input type="text" name="noisinh" value="<?php echo $key->noisinh?>" required class="form-control"> -->
			</div>
			<div class="form-group">
				<p> Mật khẩu: </p>
				<input type="text" name="matkhau" value="<?php echo $key->matkhau?>" required class="form-control">
			</div>
			<div class="form-group">
				<p> Tình trạng:<b><?php echo $key->tinhtrang ?></b></p>
				<input type="text" name="tinhtrang" value="<?php echo $key->tinhtrang?>" required class="form-control">
			</div>
			<div class="form-group">
				<p>Chọn khoa: </p><!-- <b><?php echo $kh->tenkhoa ?></b> -->
				<select class="form-control" id="khoa2" name="makhoa">
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
			</div>
			</tr>
			</table>
			<div class="form-group">
				<p>Chọn ngành:</p>
				<select class="form-control" disabled="" id="chuyennganh2" name="mabomon">
					<option value="0">Ngành</option>
				</select>
			</div>
			<div class="form-group">
				<p> Lớp: </p>
				<select class="form-control" name="malop" id ="lop2" disabled="">
					<option value="a">Chọn Lớp</option>
				</select>
				<!-- <input type="text" name="malop" value="<?php echo $key->malop?>" required class="form-control"> -->
			</div>
			<!-- <div class="form-group">
				<p>Chủ nhiệm lớp:</p>
				<select class="form-control" disabled="" id="lop">
					<option value="0">Lớp</option>
				</select>
			</div> -->
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Lưu</button>
			</div>
			</div>
			 <?php echo form_close(); ?>
		</div>
			<?php
			}else{ ?>
		<div class="col-md-7" style="float: right; margin-right: 0px;">
			<?php 
			echo form_open('daotao/sinhvien/home/add');
			 ?>
			<div class="text-center">
				<p style="font-family: Times; font-size:20; font-weight: bold;">THÊM MỚI SINH VIÊN</p>
				<!-- <hr> -->
				<?php 
				if(isset($err_add)){
					?>
					<div class="alert alert-danger">
						<?php echo $err_add; ?>
					</div>
					<?php 
				}
				if(isset($add)){
					?>
					<div class="alert alert-success">
						<?php echo $add; ?>
					</div>
					<?php 
				}
				 ?>
				 <?php 
				 if(isset($err)){
				 	?>
				 	<div class="alert alert-danger">
				 		<?php echo $err; ?>
				 	</div>
				 	<?php
				 }

				  ?>
			</div>
			<table>
			<tr> 
			<td>
			<div style="width: 350px;">
			<div class="form-group">
				<p>Mã sinh viên: </p>
				<input type="number" name="masinhvien" required class="form-control" required>
			</div>
			<div class="form-group">
				<p>Tên sinh viên: </p>
				<input type="text" name="tensinhvien" required class="form-control" required>
			</div>
			<div class="form-group">
				<p>Phái: </p>
				<input type="radio" name="giotinh" value="Nam" checked> Nam
				<input type="radio" name="giotinh" value="Nữ" style="margin-left: 30px"> Nữ
			</div>
			<div class="form-group">
				<p>Ngày sinh: </p>
				<input type="date" name="ngaysinh" required class="form-control" required>
			</div>
			</div>
			<td>
			</tr>
			<tr>
			<div style="width: 350px; float: right;">
				<div class="form-group">
					<p>Nơi sinh: </p>
					<select class="form-control" name="quequan">
					<option value="Hà Nội" >Hà Nội</option>
					<option value="Ninh Bình"  >Ninh Bình</option>
					<option value="Thái Bình"  >Thái Bình</option>
					<option value="Nam Định" >Nam Định</option>
					<option value="Hưng Yên" >Hưng Yên</option>
					<option value="Hải Dương" >Hải Dương</option>
					<option value="Hải Phòng" >Hải Phòng</option>
					<option value="Thanh Hóa" >Thanh Hóa</option>
					<option value="Thái Nguyên" >Thái Nguyên</option>
					<option value="Bắc Giang" >Bắc Giang </option>
					<option value="Bắc Ninh" >Bắc Ninh</option>
					<option value="Vĩnh Phúc" >Vĩnh Phúc</option>
					<option value="Nghệ An" >Nghệ An</option>
					<option value="Hòa Bình" >Hòa Bình</option>
					<option value="Cao Bằng" >Cao Bằng</option>
					<option value="Lào Cai" >Lào Cai</option>
					<option value="Yên Bái" >Yên Bái</option>
					<option value="Phú Thọ" >Phú Thọ</option>
					</select>
					<!-- <input type="number" name="noisinh" required class="form-control"> -->
				</div>
				<div class="form-group">
					<p>Chọn lớp: </p>
					<select class="form-control" disabled="" id="lop" name="malop">
						<option value="0">Lớp</option>
					</select>
					<!-- <input type="text" name="malop" required class="form-control"> -->
				</div>
				<div class="form-group">
					<p>Mật khẩu: </p>
					<input type="text" name="matkhau" required class="form-control">
				</div>
				<div class="form-group">
					<p>Tình trạng: </p>
					<select name="tinhtrang" class="form-control">
						<option value="Đang học">Đang học</option>
						<option value="Bảo lưu">Bảo lưu</option>
						<option value="Nghỉ học">Nghỉ học</option>
						
					</select>
				</div>
			</div>
			</tr>
			</table>
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
				<p>Chọn ngành:</p>
				<select class="form-control" disabled="" id="chuyennganh" name="mabomon">
					<option value="0">Ngành</option>
				</select>
			</div>
			<!-- <div class="form-group">
				<p>Chủ nhiệm lớp:</p>
				<select class="form-control" disabled="" id="lop">
					<option value="0">Lớp</option>
				</select>
			</div> -->
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Thêm</button>
			</div>
			 <?php echo form_close(); ?>
		</div>
		<?php } ?>
 	</div>
 </section>
 <section class="row">
 <div class="max">
 	
 	<div  style="height: 500px; overflow-x: hidden;">
 	<?php 
			if(isset($search))
			{
				?>
				<table class="table table-bordered ">
					<tr>
						<td>STT</td>
						<td>Mã sinh viên </td>
						<td>Tên sinh viên</td>
						<td>Phái</td>
						<td>Ngày sinh</td>
						<td>Nơi sinh</td>
						<td>Lớp</td>
						<td>Mật khẩu</td>
						<td>Tình trạng</td>
						<td></td>
						<td></td>
					</tr>
				
				<?php
				$i = 0;
				foreach ($search as $key) {
					// $i++;
					// $lop = $this->home_models->get_info($key->malop,'malop','tb_lop');
					// $bomon = $this->home_models->get_info($key->mabomon,'mabomon','tb_bomon');
					// if($bomon){
					// 	foreach ($bomon as $bm) {}
					// }
					// $khoa = $this->home_models->get_info($bm->makhoa,'makhoa','tb_khoa');
					// if($khoa){
					// 	foreach ($khoa as $kh) {}
				?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $key->masinhvien ?></td>
					<td><?php echo $key->tensinhvien ?></td>
					<td><?php echo $key->phai ?></td>
					<td><?php echo $key->ngaysinh ?></td>
					<td><?php echo $key->quequan ?></td>					
					<td><?php echo $key->malop ?></td>
					<td><?php echo $key->matkhau ?></td>
					<td><?php echo $key->tinhtrang ?></td>
					<!-- <td><?php echo $bm->tenbomon ?></td>
					<td><?php echo $kh->tenkhoa ?></td> -->
					<td>
						<a href="<?php echo base_url() ?>daotao/sinhvien/home/view/<?php echo $key->masinhvien ?>"><i class="fa fa-search"></i></a>
					</td>
					<td>
						<a href="<?php echo base_url() ?>daotao/sinhvien/home/delete/<?php echo $key->masinhvien ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên <?php echo $key->tensinhvien ?> ?')"><i class="fa fa-remove"></i></a>
					</td>
				</tr>
				<?php } ?>
			 </table>
			<?php  }
			else{
			?>
			 <?php 
			 if(isset($sv_full))
			 {
			 	?>
			 	<table class="table table-bordered" style="font-family: Times; font-size: 16; text-align: center;">
			 		<tr style="font-weight: bold;">
			 			<td>STT</td>
						<td>Mã sinh viên </td>
						<td>Tên sinh viên</td>
						<td>Phái</td>
						<td>Ngày sinh</td>
						<td>Nơi sinh</td>
						<td>Lớp</td>
						<td>Mật khẩu</td>
						<td>Tình trạng</td>
						<!-- <td></td> -->
						<th colspan="2" style="text-align: center;">Thao tác</td>
			 		</tr>
			 		<?php 
			 		$i = 0;
			 		foreach ($sv_full as $key) {
			 			$i++;
			 			?>
			 			<tr>
			 				<td><?php echo $i ?></td>
							<td><?php echo $key->masinhvien ?></td>
							<td style="text-align: left; padding-left: 20px;"><?php echo $key->tensinhvien ?></td>
							<td><?php echo $key->phai ?></td>
							<td><?php echo $key->ngaysinh ?></td>
							<td><?php echo $key->quequan ?></td>					
							<td><?php echo $key->malop ?></td>
							<td><?php echo $key->matkhau ?></td>
							<td><?php echo $key->tinhtrang ?></td>
			 				<td><a href="<?php echo base_url() ?>daotao/sinhvien/home/view/<?php echo $key->masinhvien ?>"><i class="fa fa-search"></i></a>
			 				<td>
			 					<a href="<?php echo base_url() ?>daotao/sinhvien/home/delete/<?php echo $key->masinhvien ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sinhvien viên <?php echo $key->tensinhvien ?> ?')"><i class="fa fa-remove"></i></a>
			 				</td>
			 			</tr>
			 			<?php
			 		}

			 		 ?>
			 	</table>
			 	<?php
			 }
			}
			  ?> 
			 </div>
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
                        url:"<?php echo base_url() ?>daotao/sinhvien/home/list_chuyennganh",
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
                    // alert(mabomon);
                    $.ajax({
                        url:"<?php echo base_url() ?>daotao/sinhvien/home/list_lop",
                        type: "POST",
                        data: {'mabomon' : mabomon},
                        dataType: 'json',
                        success: function(data){
                           $('#lop').html(data);
                        },
                        error: function(){
                            $('#lop').prop('disabled', true);
                            // alert('err');
                        }
                    });
                }
           }); 
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
           $('#khoa1').on('change', function(){
                var makhoa1 = $(this).val();
                if(makhoa1 == '0')
                {
                    $('#chuyennganh1').prop('disabled', true);
                }
                else
                {
                    $('#chuyennganh1').prop('disabled', false);
                    // alert(makhoa);
                    $.ajax({
                        url:"<?php echo base_url() ?>daotao/sinhvien/home/list_chuyennganh1",
                        type: "POST",
                        data: {'makhoa1' : makhoa1},
                        dataType: 'json',
                        success: function(data){
                           $('#chuyennganh1').html(data);
                        },
                        error: function(){
                            $('#chuyennganh1').prop('disabled', true);
                        }
                    });
                }
           }); 
        });
        $(document).ready(function(){
           $('#chuyennganh1').on('change', function(){
                var mabomon1 = $(this).val();
                if(mabomon1 == '0')
                {
                    $('#lop1').prop('disabled', true);
                }
                else
                {
                    $('#lop1').prop('disabled', false);
                    // alert(mabomon);
                    $.ajax({
                        url:"<?php echo base_url() ?>daotao/sinhvien/home/list_lop1",
                        type: "POST",
                        data: {'mabomon1' : mabomon1},
                        dataType: 'json',
                        success: function(data){
                           $('#lop1').html(data);
                        },
                        error: function(){
                            $('#lop1').prop('disabled', true);
                            // alert('err');
                        }
                    });
                }
           }); 
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
           $('#khoa2').on('change', function(){
                var makhoa2 = $(this).val();
                if(makhoa2 == '0')
                {
                    $('#chuyennganh2').prop('disabled', true);
                }
                else
                {
                    $('#chuyennganh2').prop('disabled', false);
                    // alert(makhoa);
                    $.ajax({
                        url:"<?php echo base_url() ?>daotao/sinhvien/home/list_chuyennganh2",
                        type: "POST",
                        data: {'makhoa2' : makhoa2},
                        dataType: 'json',
                        success: function(data){
                           $('#chuyennganh2').html(data);
                        },
                        error: function(){
                            $('#chuyennganh2').prop('disabled', true);
                        }
                    });
                }
           }); 
        });
        $(document).ready(function(){
           $('#chuyennganh2').on('change', function(){
                var mabomon2 = $(this).val();
                if(mabomon2 == '0')
                {
                    $('#lop2').prop('disabled', true);
                }
                else
                {
                	// alert(mabomon2);
                    $('#lop2').prop('disabled', false);
                    // alert(mabomon);
                    $.ajax({
                        url:"<?php echo base_url() ?>daotao/sinhvien/home/list_lop2",
                        type: "POST",
                        data: {'mabomon2' : mabomon2},
                        dataType: 'json',
                        success: function(data){
                        	// alert(data);
                           $('#lop2').html(data);
                        },
                        error: function(){
                            $('#lop2').prop('disabled', true);
                            // alert('err');
                        }
                    });
                }
           }); 
        });
    </script>