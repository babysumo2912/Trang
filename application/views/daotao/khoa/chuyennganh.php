<?php
include'header.php'

?>
<div class="row">
    <div class="max">
        <div class="text-center">
            <?php
            if(isset($err_noselect)){
                echo '<h3>'.$err_noselect.'</h3>';
                die();
            }
            ?>
        </div>
        <div class="text-center">
            <h3>
                <?php if(isset($khoa)){
                    echo 'Khoa '.$khoa;
                }?>
            </h3>
            <br>
            <p><?php
                if(isset($err_nodata)){
                    echo $err_nodata;
                }
                if(isset($err)){
                    echo $err;
                }
                ?></p>
        </div>
        <table class="table table-hover">
            <tr style="text-align: center">
                <td>STT</td>
                <td>Tên chuyên ngành</td>
                <td>Mã chuyên ngành</td>
                <td>&nbsp;</td>
            </tr>
            <?php
            echo form_open('daotao/khoa/chuyennganh/add/'.$makhoa);
            ?>
            <tr style="text-align: center">
                <td></td>
                <td>
                    <input type="text" class="form-control" required name="tenchuyennganh">
                </td>
                <td>
                    <input type="text" class="form-control" required name="machuyennganh">
                </td>

                <td>
                    <button type="submit" class="btn btn-success" style="margin-bottom: 10px;">
                        <i class="fa fa-save"></i>
                        Thêm
                    </button>
                </td>
                <?php echo form_close();?>
            </tr>
            <?php if(isset($chuyennganh)){
                $i = 1;
                foreach ($chuyennganh as $row){
                    echo form_open('daotao/khoa/chuyennganh/update/'.$row->mabomon.'/'.$row->makhoa)
                    ?>
                    <tr style="text-align: center">
                        <td><?php echo $i;?></td>
                        <td>
                            <?php
                            if(isset($mabomon) && $mabomon == $row->mabomon){
                                ?>
                                <input type="text" name="tenkhoa" value="<?php echo $row->tenbomon?>" class="form-control">
                                <?php
                            }else{
                                ?>
                                <a href="<?php echo base_url()?>daotao/khoa/lop/view/<?php echo $row->mabomon?>"><?php echo $row->tenbomon;?></a>
                                <?php
                            }
                            ?>
                        </td>
                        <td><?php echo $row->mabomon?></td>
                        <td>
                            <?php echo form_close()?>
                            <a href="<?php echo base_url()?>daotao/khoa/chuyennganh/view_chuyennganh/<?php echo $row->mabomon?>/<?php echo $row->makhoa?>"><i class="fa fa-pencil"></i></a>
                            <a href="<?php echo base_url()?>daotao/khoa/chuyennganh/delete/<?php echo $row->mabomon?>/<?php echo $row->makhoa?>" onclick="return confirm('Bạn có chắc chắn muốn xóa chuyên ngành <?php echo $row->tenbomon?> ?')"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
            }?>
        </table>
    </div>
</div>
