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
        $hocki = $this->home_models->get_info($row->id_hocki,'id_hocki','tb_hocki');
        if($hocki){
            foreach($hocki as $hk){}
        }
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
        <label for="">Năm học:</label>&nbsp;<span> <?php echo $hk->nambatdau?> - <?php echo $hk->namketthuc?></span><br>
        <label for="">Học kì:</label>&nbsp;<span> <?php echo $hk->tenhocki?></span><br>
        <label for="">Mã học phần:</label>&nbsp;<span> <?php echo $row->mamh?></span><br>
        <label for="">Nhóm học phần:</label>&nbsp;<span> <?php echo $row->nhommonhoc?></span><br>
        <label for="">Tên học phần:</label>&nbsp;<span><?php echo $value->tenmonhoc?></span><br>
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
        echo form_open('giaovien/diem/add/'.$row->mamh.'/'.$row->nhommonhoc.'/'.$row->id_hocki);
        ?>
        <?php if(isset($dssv)){
            $i = 1;
            foreach ($dssv as $row){
                $sinhvien = $this->sinhvien_models->infomation($row->masinhvien);
                if($sinhvien){
                    foreach ($sinhvien as $sv){};
                }
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
                echo form_hidden('diem['.$row->masinhvien.'][hocki]', $hk->tenhocki);
                echo form_hidden('diem['.$row->masinhvien.'][nambatdau]', $hk->nambatdau);
                echo form_hidden('diem['.$row->masinhvien.'][namketthuc]', $hk->namketthuc);
                echo form_hidden('diem['.$row->masinhvien.'][mamonhoc]', $row->mamh);
                echo form_hidden('diem['.$row->masinhvien.'][nhommonhoc]', $row->nhommonhoc);
                echo form_hidden('diem['.$row->masinhvien.'][tenmonhoc]',$value->tenmonhoc);
                echo form_hidden('diem['.$row->masinhvien.'][tengiaovien]', $tgv->tengiaovien);
                echo form_hidden('diem['.$row->masinhvien.'][masinhvien]', $row->masinhvien);
                echo form_hidden('diem['.$row->masinhvien.'][tensinhvien]', $sv->tensinhvien);
                echo form_hidden('diem['.$row->masinhvien.'][lopsinhvien]', $sv->malop);
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
                        'max' => '10',
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
                         'max' => '10',
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
                         'max' => '10',
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
                         'max' => '10',
                         'name' => 'diem['.$row->masinhvien.'][diemC]',
                        'value' => $row->diemC,
                        );
                        echo form_input($data);
                        ?>
                    </td>
                    <td><?php echo $row->TK10?></td>
                    <td><?php
                        if($key->tinhtrang == 0){
                            echo "";
                        }
                        ?></td>
                    <td><?php echo $row->TKCH?></td>
                </tr>
                <?php
                $i++;
            }
        }?>
    </table>
    <div class="text-center">
        <input type="submit" class="btn btn-success" value="Save">
        <a href="<?php echo base_url()?>data.xlsx" class="btn btn-info"><i class="fa fa-print"></i>&nbsp;In ra file excel</a>
    </div>
    <?php echo form_close();?>
</section>
