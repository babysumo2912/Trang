<?php include "header.php" ?>
<div class = "row">
    <div class = "max">
    <?php 
    if(isset($thongbao)){
        echo $thongbao;
    }

     ?>
        <a href=""><img src="<?php echo base_url()?>public/img/style/banner_1.png" alt="" width = "100%"></a>
    </div>
</div>
<div class = "row">
    <div class = "max hd2">
        <div class = "col-md-8 center">
            <div class = "col-md-12 new-center">
                <div class = "col-md-12 head-title">
                    <a href = "" alt = "THông báo Humg">Thông báo mới</a>
                </div>
                <div class = "col-md-12 content-title">
                    <?php
                    if(isset($data_thongbao)){
                        foreach($data_thongbao as $row){
                            ?>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="<?php echo base_url()?>public/img/style/HUMG.jpg" alt="..." width="50px" height="50px">
                                </div>

                                <div class="media-body">
                                    <a href="<?php echo base_url()?>home/view/<?php echo $row->id_tintuc?>"><?php echo $row->tieude?></a><br>
                                    <p><i class = "fa fa-calendar">&nbsp;<?php echo $row->date?></i></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
            <div class = "col-md-12 new-center">
                <div class = "col-md-12 head-title">
                    <a href = "" alt = "Chương trình đào tạo">Chương trình đào tạo</a>
                </div>
                <div class = "col-md-12 content-title">
                    <div class="media">
                        <div class="media-left">
                            <img class="media-object" src="<?php echo base_url()?>public/img/style/HUMG.jpg" alt="..." width="50px" height="50px">
                        </div>
                        <div class="media-body">
                            <a href="">HUMG_TRường đại học số 1 Thế giới</a><br>
                            <p><i class = "fa fa-calendar">&nbsp;20/03/2017 15:30</i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "col-md-12 new-center">
                <div class = "col-md-12 head-title">
                    <a href = "" alt = "Xuất khẩu lao động">HUMG kết nối</a>
                </div>
                <div class = "col-md-12 content-title">
                    <div class="media">
                         <div class="media-left">
                            <img class="media-object" src="<?php echo base_url()?>public/img/style/HUMG.jpg" alt="..." width="50px" height="50px">
                        </div>
                        <div class="media-body">
                            <a href="">HUMG_TRường đại học số 1 Thế giới</a><br>
                            <p><i class = "fa fa-calendar">&nbsp;20/03/2017 15:30</i></p>
                        </div>
                    </div>
                </div>  
            </div>
            
        </div>
        <div class = "col-md-4">
            <div class = "new-right">
                <div class = "title">
                    <a href="" class = "title">Lịch công tác chính trị sinh viên</a>
                </div>
                <ul>
                    <li>
                        <i class = "fa fa-calendar">&nbsp;20/03/2017</i> <br>
                        <a href="" title="Thành phần bộ phận của công ty">Sinh hoạt lớp K57</a>
                    </li>
                    
                </ul>
            </div>
            <div class = "new-right">
                <div class = "title">
                    <a href="" class = "title">Humg Media</a>
                </div>
                <ul>
                    <li>
                        <i class="fa fa-play-circle-o" aria-hidden="true"></i>&nbsp;<a href="" title="Bài 1: Xin chào, tôi tên là ...">Hello Humg</a>
                    </li>

                </ul>
            </div>  
            
            <div class = "new-right">
                <div class = "title">
                    <a href="" class = "title">Tin tức trong ngày</a>
                </div>
                <ul>
                    <?php
                    if(isset($data_tintuc)){
                        foreach($data_tintuc as $key){
                    ?>
                    <li>
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;<a href="<?php echo base_url()?>home/view/<?php echo $key->id_tintuc?>"><?php echo $key->tieude?></a>
                    </li>
                    <?php
                        }
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
    </div>
<?php include "footer.php" ?>