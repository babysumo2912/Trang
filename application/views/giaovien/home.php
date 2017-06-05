<?php
include'header.php';
?>
<section class="max">
    <div class="text-center">
        <h2>Danh sách lớp học</h2>
    </div>
    <table class="table table-bordered table-hover">
        <tr>
            <td>STT</td>
            <td>Mã môn học</td>
            <td>Tên môn học</td>
            <td>Tên nhóm</td>
        </tr>
        <?php
        $i = 1;
        if(isset($class)){
            foreach ($class as $key){
            $tenmonhoc = $this->monhoc_models->getinfo($key->mamh);
            if($tenmonhoc){
                foreach ($tenmonhoc as $monhoc){};
            }
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $key->mamh?></td>
            <td><a href="<?php echo base_url()?>giaovien/home/diemsinhvien/<?php echo $key->mamh?>/<?php echo $key->nhommonhoc?>/<?php echo $key->id_hocki?>" style="display: block"><?php echo $monhoc->tenmonhoc?></a></td>
            <td><?php echo $key->nhommonhoc?></td>
        </tr>
        <?php
            $i++;
            }
        }
        ?>
    </table>
</section>
<?php
//include'footer.php';
//?>
