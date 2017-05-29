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
            <caption>Học kì 1 năm 2016</caption>
            <tr>
                <td>STT</td>
                <td>Mã môn học</td>
                <td>Tên môn học</td>
                <td>STC</td>
                <td>Điểm A (lần 1)</td>
                <td>Điểm A (lần 2)</td>
                <td>Điểm B</td>
                <td>Điểm C</td>
                <td>Tổng kết</td>
                <td>Đánh giá</td>
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
                        <td><?php echo $row->sotinchi ?></td>
                        <td><?php echo $key->diemA?></td>
                        <td><?php echo $key->diemA_2?></td>
                        <td><?php echo $key->diemB?></td>
                        <td><?php echo $key->diemC?></td>
                        <td>F</td>
                        <td>Trượt</td>
                    </tr>

                    <?php
                    $i++;
                }
            }
            ?>

        </table>
    </div>
</section>