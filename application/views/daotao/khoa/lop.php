<?php
include'header.php'
?>
<div class="row">
    <div class="max">
        <div class="text-center">
            <h3>
                <?php
                if(isset($err))
                {
                    echo $err;
                    die();
                }

                ?>
                <?php
                if(isset($bomon)){
                    echo 'Bộ môn'.$bomon;
                }
                ?>
            </h3>
            <?php
            if(isset($err_add)){
                echo '<p>'.$err_add.'</p>';
            }
            ?>
        </div>
        <div style="margin-bottom: 10px;">
            <table class="text-center table table-hover">
                <tr>
                    <td>STT</td>
                    <td>Mã lớp</td>
                    <td>Tên lớp</td>
                    <td>Khóa</td>
                    <td>Giáo viên chủ nhiệm</td>
                    <td></td>
                </tr>
                <?php
                echo form_open('daotao/khoa/lop/add/'.$mabomon)
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>

                    </td>
                    <td>
                        <input type="text" class="form-control" name="k" required>
                    </td>
                    <td>
                        <select name="magiaovien" id="" class="form-control">
                            <option value="0">Chọn giáo viên</option>
                            <?php
                            if(isset($giaovien)){
                                foreach ($giaovien as $row){
                            ?>
                            <option value="<?php echo $row->magiaovien?>"><?php echo $row->tengiaovien?></option>
                            <?php
                                }
                            }
                            ?>
                        </select> 
                    </td>
                    <td><input type="submit" value="Thêm mới" class="btn btn-success"></td>
                </tr> 
                <?php
                echo form_close();
                ?>
                <?php
                if(isset($lop)){
                    $i = 1;
                    foreach($lop as $row){ 
                        ?>
                <tr>
                    <td>
                         <?php echo $i;?>
                    </td>
                    <td>
                        <?php echo $row->malop?>
                    </td>
                    <td>
                        <a href="<?php echo base_url() ?>daotao/khoa/lop/dsach/<?php echo $row->malop ?>"><?php echo $row->tenlop?></a>
                    </td>
                    <td>
                        <?php echo "K ".$row->k ?>
                    </td>
                    <td>
                        <?php
                        $giaovien = $this->giaovien_models->infomation($row->magiaovien);
                        if($giaovien){
                            foreach ($giaovien as $gv){}
                            echo $gv->tengiaovien;
                        }

                        ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url()?>daotao/khoa/lop/delete/<?php echo $row->malop?>/<?php echo $row->mabomon?>" onclick="return confirm('Bạn có muốn xóa <?php echo $row->malop?>')"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>
