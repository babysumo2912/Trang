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
    <body class= "body">
    <header>
        <div class = "text-center logo" style="margin: 0;">
            <img src="<?php echo base_url()?>public/img/style/HUMG.png" alt="">
            <h1 style = "margin: -30px 0 50px 0; padding: 0;">HUMG Connection</h1>
        </div>
        <nav class="hd">
            <div class = "max">
                <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                       <i class = "fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand home" href="#"><i class = "fa fa-home"></i></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Giới Thiệu <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Tin Tức</a></li>
                        <li><a href="<?php echo base_url()?>sinhvien/dangkimonhoc">Đăng kí môn học</a></li>
                        <li><a href="<?php echo base_url()?>sinhvien/xemhocphi">Xem học phí</a></li>
                        <li><a href="#">Xem điểm</a></li>
                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <input type="submit" class = "btn btn-default" value="Tìm kiếm">
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                    <?php 
                    if(isset($sinhvien)){
                        foreach ($sinhvien as $row) {
                    ?>
                    <li><a href="<?php echo base_url()?>sinhvien/"><?php echo $row->tensinhvien ?></a></li>
                    <li><a href="<?php echo base_url()?>home/logout">Thoát</a></li>
                    <?php     
                        }
                    }else{
                     ?>
                        <li><a href="<?php echo base_url()?>sinhvien/sinhvien/login">Đăng nhập</a></li>
                    <?php } ?>
<!--                        <li class="dropdown">-->
<!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li><a href="#">Action</a></li>-->
<!--                                <li><a href="#">Another action</a></li>-->
<!--                                <li><a href="#">Something else here</a></li>-->
<!--                                <li role="separator" class="divider"></li>-->
<!--                                <li><a href="#">Separated link</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
            </div>
        </nav>
    </header>
