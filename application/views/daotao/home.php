<?php 
include 'header.php';
 ?>
<section class="row">
    <div class="max">
    	<div style="max-width: 500px;margin: 0 auto;">
			<?php echo form_open('daotao/home/add_hocki') ?>
			<h3>Thêm học kì mới</h3>
			<br>
			Năm học : <input type="number" name="nambatdau" style="width: 90px"> - <input type="number" name="namketthuc" style="width:90px"><br><br>
			Học kì số : <input type="number" name="hocki"><br><br>
			<button class="btn btn-default" type="submit">Thêm</button>
			<?php echo form_close() ?>
			<!-- <div class="text-center"> -->
				
			<!-- </div> -->
    	</div>
        <div style="margin: 200px">
            <div class="text-center abc">
                <a href="<?php echo base_url() ?>daotao/khoa/home"><b>Hệ Đại Học</b></a>
                <a href="<?php echo base_url() ?>daotao/khoa/home"><b>Hệ Cao Đẳng</b></a>
            </div>    
        </div>
    </div>
</section>
