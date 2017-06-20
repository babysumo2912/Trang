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
					<tr>
						<td>STT</td>
						<td>Mã giáo viên</td>
						<td>Tên giáo viên</td>
						<td>Bộ môn</td>
						<td>Khoa</td>
						<td></td>
						<td></td>
					</tr>
				
				<?php
				$i = 0;
				foreach ($search as $key) {
					$i++;
					$bomon = $this->home_models->get_info($key->mabomon,'mabomon','tb_bomon');
					if($bomon){
						foreach ($bomon as $bm) {}
					}
					$khoa = $this->home_models->get_info($bm->makhoa,'makhoa','tb_khoa');
					if($khoa){
						foreach ($khoa as $kh) {}
					}
				?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $key->magiaovien ?></td>
					<td><?php echo $key->tengiaovien ?></td>
					<td><?php echo $bm->tenbomon ?></td>
					<td><?php echo $kh->tenkhoa ?></td>
					<td>
						<a href="<?php echo base_url() ?>daotao/giaovien/home/view/<?php echo $key->magiaovien ?>"><i class="fa fa-search"></i></a>
					</td>
					<td>
						<a href="<?php echo base_url() ?>daotao/giaovien/home/delete/<?php echo $key->magiaovien ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa giáo viên <?php echo $key->tengiaovien ?> ?')"><i class="fa fa-remove"></i></a>
					</td>
				</tr>
				<?php
				}

			}

			 ?>
			 </table>
		</div>
		<div class="col-md-1"></div>
		<?php if(isset($giaovien)){
			foreach ($giaovien as $key){}
				$bomon1 = $this->home_models->get_info($key->mabomon,'mabomon','tb_bomon');
					if($bomon1){
						foreach ($bomon1 as $bm1) {}
					}
				$khoa1 = $this->home_models->get_info($bm1->makhoa,'makhoa','tb_khoa');
				foreach ($khoa1 as $kh1) {
					
				}
				?>
		<div class="col-md-4">
			<?php 
			echo form_open('daotao/giaovien/home/sua/'.$key->magiaovien);
			 ?>
			<div class="text-center">
				<h2>Cập nhâp giáo viên</h2>
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
				<p>Chọn chuyên ngành: <b><?php echo $bm1->tenbomon ?></b></p>
				<select class="form-control" disabled="" id="chuyennganh" name="mabomon">
					<option value="0">Chuyên ngành</option>
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
			}else{ ?>
		<div class="col-md-4">
			<?php 
			echo form_open('daotao/giaovien/home/add');
			 ?>
			<div class="text-center">
				<h2>Thêm mới giáo viên</h2>
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
				<p>Chọn chuyên ngành:</p>
				<select class="form-control" disabled="" id="chuyennganh" name="mabomon">
					<option value="0">Chuyên ngành</option>
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
                        url:"<?php echo base_url() ?>daotao/giaovien/home/list_chuyennganh",
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