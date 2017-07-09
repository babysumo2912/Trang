<?php
include'header.php';
?>
<section class="max">
    <div class="col-md-6">
        
    
    <div class="text-center">
        <p style="font-family: Times;font-size: 20;font-weight: bold;">DANH SÁCH LỚP GIẢNG DẠY TRONG KỲ</p>
    </div>
    <table class="table table-bordered table-hover">
        <tr style="font-family: times;text-align: center;font-size: 17; font-weight: bold;">
            <td>STT</td>
            <td>Mã môn học</td>
            <td>Tên môn học</td>
            <td>Tên nhóm</td>
        </tr>
        <?php
        if(isset($class) && $class!=''){
            $i = 0;
            foreach ($class as $key){
                $i++;
            $tenmonhoc = $this->monhoc_models->getinfo($key->mamh);
            if($tenmonhoc){
                foreach ($tenmonhoc as $monhoc){};
            }
        ?>
        <tr style="font-family: times;text-align: center;font-size: 17"> 
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
    if(isset($chunhiem) && $chunhiem!=''){
        echo form_open('giaovien/Diem/add_drl/');
        foreach ($chunhiem as $key){}
     ?>
    
    <div class="col-md-6">
    <div class="text-center">
        <p style="font-family: Times;font-size: 20;font-weight: bold;">DANH SÁCH LỚP CHỦ NHIỆM</p>
    </div>
    <p style="font-family: Times;">Lớp: <?php echo $key->tenlop ?></p>
    <table class="table table-bordered">
        <tr style="font-family: times;text-align: center;font-size: 17">
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
                    if($diemrenluyen == false){
                        $diemrenluyen = 0;
                    }else{
                        foreach ($diemrenluyen as $drl) {};
                        echo form_hidden('diem['.$drl->masinhvien.'][masinhvien]', $drl->masinhvien);
                        echo form_hidden('diem['.$drl->masinhvien.'][diemrl]', $drl->diemrl);
                        $i++;
                        $diemrenluyen = $drl->diemrl;
                    }
                    
        ?>
        <tr style="font-family: times;font-size: 17">
            <td style="text-align: center;"><?php echo $i ?></td>
            <td style="text-align: center;"><?php echo $sv->masinhvien?></td>
            <td><?php echo $sv->tensinhvien ?></td>
            <td style="width:100px; text-align: center;">
                <?php
                $data = array(
                'type' => 'number',
                'class' => 'form-control',
                'min' => '0',
                'max' => '100',
                'name' => 'diem['.$drl->masinhvien.'][diemrl]',
                'value' => $diemrenluyen,
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
