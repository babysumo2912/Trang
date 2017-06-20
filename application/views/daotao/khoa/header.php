<html>
<head>
    <title>Phòng Đào Tạo - Trường Đại Học Mỏ Địa Chất</title>
    <meta charset = "utf-8">
    <meta property = "og:title" content = "Xuất khẩu lao động Nhật Bản 2017 | Không phí môi giới">
    <meta property = "og:url" content = "<?php echo base_url()?>">
    <meta property = "og:description" content = "Công ty Xuất khẩu lao động Nhật Bản duy nhất nói không môi giới, tư vấn chính xác tổng phí, cam kết lương và xuất cảnh đúng hợp đồng, xkld Nhật Bản 2017">
    <meta name="keywords" content="xuat khau lao dong nhat ban; lao dong nhat ban xuat khau lao dong; xuất khẩu lao động nhật bản; xkld nhat; xkld 2017; xuat khau lao dong nhat ban 2016">
    <meta peoperty = "og:img" content = "<?php echo base_url()?>public/img/style/logottc.png">
    <link rel="icon" href="<?php echo base_url()?>public/img/style/favicon.png">
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
    <nav class="hd">
        <div class = "max">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <i class = "fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand home" href="<?php echo base_url()?>daotao"><i class = "fa fa-home"></i></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url()?>daotao/khoa/home">Đào tạo<span class="sr-only">(current)</span></a></li>
                        <li><a href="<?php echo base_url() ?>daotao/giaovien/home">Giáo viên</a></li>
                        <li><a href="<?php echo base_url()?>khoa">Sinh viên</a></li>
                        <li><a href="<?php echo base_url()?>chuyennganh">Môn học</a></li>
                        <li><a href="#">Quản lí điểm</a></li>
                        <li><a href="<?php echo base_url() ?>daotao/tintuc/baivietmoi">Tin tức</a></li>
                    </ul>
                    <!-- <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <input type="submit" class = "btn btn-default" value="Tìm kiếm">
                        </div>
                    </form> -->
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(isset($admin)){
                            ?>
                            <li><a href="<?php echo base_url()?>"><?php echo $admin ?></a></li>
                            <li><a href="<?php echo base_url()?>daotao/home/logout">Đăng xuất</a></li>
                            <?php
                        }
                        ?>
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
