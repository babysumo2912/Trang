<?php
$masinhvien = $this->session->userdata('masinhvien');
?>
<?php
include'header.php';
?>
<section class="row">
    <div class="max">
        <div style="max-width: 500px; border: 1px #ccc solid; margin: 0 auto;padding: 10px; margin-bottom: 10px; margin-top: 20px">
            <?php if(isset($sinhvien)){
                foreach ($sinhvien as $row){
            ?>
            <div style="font-family: Times; font-size: 17; line-height: 0.7;">
                    <p>Mã sinh viên:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> <?php echo $row->masinhvien?></b></p>
                    <p>Tên sinh viên:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $row->tensinhvien?></b></p>
                   <p>Phái:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $row->phai?></b></p>
                    <p>Ngày sinh:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $row->ngaysinh?></b></p>
                    <p>Nơi sinh:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $row->quequan?></b></p>
                    <p>Hệ đào tạo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <p>Lớp:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <p>Khoa: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <p>Chuyên ngành:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    </div>

            <?php
                }
            }?>
        </div>
    </div>
</section>
<section class="row">
    <div class="max">
        <table class="table table-hover table-bordered">
            <caption style="font-family: Times; font-size: 18">Danh sách môn học đã chọn</caption>
            <tr style="font-family: Times; font-size: 18; font-weight: bold;">
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