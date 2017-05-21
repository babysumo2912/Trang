<?php
$masinhvien = $this->session->userdata('masinhvien');
?>
<?php
include'header.php';
?>
<section class="row">
    <div class="max">
        <div class="text-center" style="max-width: 500px; border: 1px #ccc solid; margin: 0 auto;padding: 10px; margin-bottom: 10px">
            <?php if(isset($sinhvien)){
                foreach ($sinhvien as $row){
            ?>
            <label for="">Mã sinh viên:</label>&nbsp;<span> <?php echo $row->masinhvien?></span><br>
            <label for="">Tên sinh viên:</label>&nbsp;<span> <?php echo $row->tensinhvien?></span><br>
            <label for="">Lớp sinh viên:</label>&nbsp;<span> <?php echo $row->malop?></span><br>
            <?php
                }
            }?>
        </div>
    </div>
</section>
<section class="row">
    <div class="max">
        <table class="table table-hover table-bordered">
            <caption>Danh sách môn học đã chọn</caption>
            <tr>
                <td>STT</td>
                <td>Mã môn học</td>
                <td>Tên môn học</td>
                <td>Nhóm môn học</td>
                <td>STC</td>
                <td>Học phí</td>
            </tr>
            <?php
            if(isset($danhsachmonhoc_sinhvien)){
                $i = 1;
                $money = 0;
                foreach ($danhsachmonhoc_sinhvien as $key) {
                    $getinfo = $this->monhoc_models->getinfo($key->mamh);
                    if($getinfo){
                        foreach ($getinfo as $row) {};
                    }
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $key->mamh ?></td>
                        <td>
                            <a target="_blank" href="<?php echo base_url()?>sinhvien/danhsachlophoc/view/<?php echo $key->mamh ?>/<?php echo $key->nhommonhoc?>">
                                <?php echo $row->tenmonhoc ?>
                            </a>
                        </td>
                        <td><?php echo $key->nhommonhoc?></td>
                        <td><?php echo $row->sotinchi ?></td>
                        <td><?php echo number_format($row->sotinchi * 300000); $money += ($row->sotinchi * 300000);?></td>
                    </tr>

                    <?php
                    $i++;
                }
            }
            ?>
            <tr>
                <td colspan="5" class="text-right">
                    <label for="">Tổng cộng:</label>
                </td>
                <td>
                    <span style="color: red"><?php if(isset($money) && ($money > 0)){echo number_format($money);}else echo 0?><sup>đ</sup></span>
                </td>
            </tr>
        </table>
    </div>
</section>