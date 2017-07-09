<?php    
include 'header.php';
 ?>
<section class="row">
    <div class="max">
    	<div style="max-width: 500px;margin: 0 auto;">
        <?php 
        if(isset($err)){
            ?>
            <div class="alert alert-danger">
                <?php echo $err ?>
            </div>
            <?php
        }

         ?>
			<?php echo form_open('daotao/home/add_hocki') ?>
			<h3>Thêm học kì mới</h3>
			<br>
			Năm học : <input type="number" name="nambatdau" style="width: 90px"> - <input type="number" name="namketthuc" style="width:90px"><br><br>
			Học kì số : <input type="number" name="hocki" max="2" min="1"><br><br>
			<button class="btn btn-default" type="submit">Thêm</button>
			<?php echo form_close() ?>
			<!-- <div class="text-center"> -->
				
			<!-- </div> --> 
    	</div>
        
        <div class="text-center abc">
            <table style="width: auto; margin: 100px;">
            <tr>
            <td> <a href="<?php echo base_url() ?>daotao/khoa/home"><b>Hệ Đại Học</b></a></td>
            <td> <a href="<?php echo base_url() ?>daotao/khoa/home"><b>Hệ Cao Đẳng</b></a></td>
            <td> <a href="<?php echo base_url() ?>daotao/khoa/home"><b>Hệ Liên Thông</b></a></td>
            </tr>
           </table>
        </div>       
        <!--  
        <div class="text-center abc" style="margin: center">
            <table style="width: auto; margin: 100px;">
            <tr>
            <td><a href="<?php echo base_url() ?>daotao/khoa/home"><b>Hệ Sau Đại Học</b></a></td>
            <td><a href="<?php echo base_url() ?>daotao/khoa/home"><b>Hệ Đào Tạo Tiến Sĩ</b></a></td>
            </tr>
            </table>    
        </div>     -->
    </div>
</section>
