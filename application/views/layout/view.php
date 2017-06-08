<?php include 'header.php'; ?>
<?php if(isset($tintuc)){
    foreach ($tintuc as $row){}
}?>
<div class="max hd2">
<div class="col-md-8 center">
    <div style="margin: 0 auto;padding: 20px;  background: white">
        <h2><?php echo $row->tieude?></h2>
        <p>
            <?php echo $row->noidung?>
        </p>
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
<?php include 'footer.php' ?>