<?php
include'header.php';
?>
<section class="max">
    <div class="col-md-6">
        
    
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
        if(isset($class)){
            $i = 0;
            foreach ($class as $key){
                $i++;
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
            }
        }
        ?>
    </table>
    </div>
    <?php 
    if(isset($chunhiem)){
        echo form_open('giaovien/Diem/add_drl/');
        foreach ($chunhiem as $key){}
     ?>
    
    <div class="col-md-6">
    <div class="text-center">
        <h2>Danh sách sinh viên</h2>
    </div>
    <caption>Lớp: <?php echo $key->tenlop ?></caption>
    <table class="table table-bordered">
        <tr>
            <td>STT</td>
            <td>Mã Sinh viên</td>
            <td>Tên sinh viên</td>
            <td>Điểm rèn luyện</td>
        </tr>
        <?php
        
            $i = 0;
                
            $sinhvien = $this->giaovien_models->get_chunhiem($key->malop);
            if($sinhvien){
                foreach ($sinhvien as $sv){;
                    $diemrenluyen = $this->giaovien_models->get_info1($sv->masinhvien,'masinhvien','tb_diemrenluyen');
                    foreach ($diemrenluyen as $drl) {};
                    echo form_hidden('diem['.$drl->masinhvien.'][masinhvien]', $drl->masinhvien);
                    echo form_hidden('diem['.$drl->masinhvien.'][diemrl]', $drl->diemrl);
                    $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $sv->masinhvien?></td>
            <td><?php echo $sv->tensinhvien ?></td>
            <td style="width:100px">
                <?php
                $data = array(
                'type' => 'number',
                'class' => 'form-control',
                'min' => '0',
                'max' => '100',
                'name' => 'diem['.$drl->masinhvien.'][diemrl]',
                'value' => $drl->diemrl,
                );
                echo form_input($data);
                ?>
            </td>
        </tr>

        <?php
            }
        }
        
        ?>
    </table>
    <div class="text-center">
        <input type="submit" value="Lưu" class="btn btn-primary">
    </div>
    </div>
<?php echo form_close(); ?>
    <?php } ?>
</section>
<?php
//include'footer.php';
//?>
