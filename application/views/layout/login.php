<!DOCTYPE html>
<html>
<head>
	<title>Trường Đại Học Mỏ Địa Chất - Hà Nội</title>
        <meta charset = "utf-8">
        <meta property = "og:title" content = "Trường Đại Học Mỏ - Địa Chất">
        <meta property = "og:url" content = "<?php echo base_url()?>">
        <meta property = "og:description" content = "TRường ĐẠi Học số 1 Việt Nam">
        <link rel="stylesheet" href="<?php echo base_url()?>public/style/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url()?>public/style/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>public/style/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>public/style/css/font-awesome.min.css">
        <script src="<?php echo base_url()?>public/style/js/jquery-3.1.0.js"></script>
        <script src="<?php echo base_url()?>public/style/js/jquery.cycle2.min.js"></script>
        <script src="<?php echo base_url()?>public/style/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>public/style/js/filejs.js"></script>
        <link rel="stylesheet" href="<?php echo base_url()?>public/style/css/w3school.css">
</head>
<body>
<section class = "wapper_login">
	<?php 
	$style = array(
		'class' => 'form-group form-login'
		);
	echo form_open('sinhvien/taikhoan/login',$style);
	 ?>

	 <div class="text-center">
	 	<img class="text-center" src="<?php echo base_url()?>public/img/style/HUMG.png" alt="">
	 </div>
	 <div class="form-group">
	 	<?php if(isset($err)){
	 		echo $err;
	 	} ?>
	 </div>
	 <div class = "form-group">
	 	<div class="input-group">
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-user"></span>
			</span>
			<input class="form-control" name="user" required="" placeholder="Tên đăng nhập" type="text">
		</div>
	</div>	
	<div class = "form-group">
		<div class="input-group">
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-lock"></span>
			</span>
			<input class="form-control" name="password" required="" placeholder="Mật khẩu" type="password">
		</div>
	</div>
	<input name="login" value="ĐĂNG NHẬP" class="btn btn-success form-control" type="submit">
	 <?php 
	 echo form_close()
	 ?>
</section>

</body>
</html>