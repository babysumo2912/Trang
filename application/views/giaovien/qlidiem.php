<?php
if(isset($err)){
    echo $err;
    die();
}
include'header.php'
?>
<section class="max">
    <div style="max-width: 500px; border: 1px #ccc solid; margin: 0 auto;padding: 10px; margin-bottom: 10px">
        <?php
        if(isset($dssv)){
            foreach ($dssv as $row){

            }
        }
        ?>
        <?php
        $monhoc = $this->monhoc_models->getinfo($row->mamh);

        if($monhoc){
            foreach ($monhoc as $value){}
        }
        $magiaovien = $this->monhoc_models->get_allinfo($row->mamh,$row->nhommonhoc);
        if($magiaovien){
            foreach ($magiaovien as $gv){}
        }
        $tengiaovien = $this->monhoc_models->getgiaovien($gv->magiaovien);
        if($tengiaovien){
            foreach ($tengiaovien as $tgv) {}
        }
        ?>
        <label for="">Mã môn học:</label>&nbsp;<span> <?php echo $row->mamh?></span><br>
        <label for="">Nhóm môn học:</label>&nbsp;<span> <?php echo $row->nhommonhoc?></span><br>
        <label for="">Tên lớp:</label>&nbsp;<span><?php echo $value->tenmonhoc?></span><br>
        <label for="">Giáo viên:</label>&nbsp;<span><?php echo $tgv->tengiaovien?></span>
    </div>
    <table class="table table-bordered table-hover">
        <tr>
            <td>STT</td>
            <td>Mã sinh viên</td>
            <td>Tên sinh viên</td>
            <td>Lớp</td>
            <td>Điểm A (1)</td>
            <td>Điểm A(2)</td>
            <td>Điểm B</td>
            <td>Điểm C</td>
            <td>Tổng kết</td>
            <td>Tình trạng</td>
            <td>Đánh giá</td>
        </tr>
        <?php
        $style = array(
            'class' => 'form-group'
        );
        echo form_open('giaovien/diem/add/'.$row->mamh.'/'.$row->nhommonhoc);
        ?>
        <?php if(isset($dssv)){
            $i = 1;
            foreach ($dssv as $row){
                $sinhvien = $this->sinhvien_models->infomation($row->masinhvien);
                echo form_hidden('diem['.$row->masinhvien.'][masinhvien]', $row->masinhvien);
                echo form_hidden('diem['.$row->masinhvien.'][diemA]', $row->diemA);
                echo form_hidden('diem['.$row->masinhvien.'][diemA_2]', $row->diemA_2);
                echo form_hidden('diem['.$row->masinhvien.'][diemB]', $row->diemB);
                echo form_hidden('diem['.$row->masinhvien.'][diemC]', $row->diemC);
                if($sinhvien){
                    foreach ($sinhvien as $key){};
                }
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row->masinhvien?></td>
                    <td><?php echo $key->tensinhvien?></td>
                    <td><?php echo $key->malop?></td>
                    <td style="width:100px">
                        <?php
                        $data = array(
                        'type' => 'number',
                        'class' => 'form-control',
                        'min' => '0',
                        'name' => 'diem['.$row->masinhvien.'][diemA]',
                        'value' => $row->diemA,
                        );
                        echo form_input($data);
                        ?>
                    </td>
                    <td style="width:100px">
                        <?php
                         $data = array(
                        'type' => 'number',
                        'class' => 'form-control',
                        'min' => '0',
                         'name' => 'diem['.$row->masinhvien.'][diemA_2]',
                        'value' => $row->diemA_2,
                        );
                        echo form_input($data);
                        ?>
                    </td>
                    <td style="width:100px">
                        <?php
                         $data = array(
                        'type' => 'number',
                        'class' => 'form-control',
                        'min' => '0',
                         'name' => 'diem['.$row->masinhvien.'][diemB]',
                        'value' => $row->diemB,
                        );
                        echo form_input($data);
                        ?>
                    </td>
                    <td style="width:100px">
                        <?php
                         $data = array(
                        'type' => 'number',
                        'class' => 'form-control',
                        'min' => '0',
                         'name' => 'diem['.$row->masinhvien.'][diemC]',
                        'value' => $row->diemC,
                        );
                        echo form_input($data);
                        ?>
                    </td>
                    <td><?php
                        if($row->diemA_2 >= $row->diemA){
                            $diemA = $row->diemA_2;
                        }else $diemA = $row->diemA;
                        $kq = 0.6*$diemA + 0.3*$row->diemB + 0.1*$row->diemC;
                        echo $kq;
                        ?>
                    </td>
                    <td><?php
                        if($key->tinhtrang == 0){
                            echo "";
                        }
                        ?></td>
                    <td>
                    <?php
                    if($kq<4.0){
                        echo "F";
                    }
                    if($kq>=4.0 && $kq<5.5){
                        echo "D";
                    }

                    if($kq>=5.5 && $kq<7.0){
                        echo "C";
                    }
                    if($kq>=7.0 && $kq<8.5){
                        echo "C";
                    }
                    if($kq>=8.5){
                        echo "A";
                    }
                    ?>
                    </td>
                </tr>
                <?php
                $i++;
            }
        }?>
    </table>
    <div class="text-center">
        <input type="submit" class="btn btn-success" value="Save">
    </div>
    <?php echo form_close();?>
</section>
