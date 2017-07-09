<!DOCTYPE html>  
<html>
<head>
    <title></title>
    <style type="text/css">
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 2px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) { 
    background-color: #FF0000;
    }

    </style>
</head>
<body>

</body>
</html>
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
        <div style="max-width: 600px; margin-left: 50px; float: left;">
        <table class="table table-hover">
            <tr style="text-align: center;">
                <td style="text-align: center;">STT</td>
                <td style="text-align: center;">Tên chuyên ngành</td>
                <td style="text-align: center;">Mã chuyên ngành</td>
                <td>&nbsp;</td>
            </tr>
            <?php
            echo form_open('daotao/khoa/chuyennganh/add/'.$makhoa);
            ?>
            <tr style="text-align: center">
                <td></td>
                <td style="text-align: center;">
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
        <div style="max-width: 600px; float: right;">
        <table class="table table-hover">
            <tr style="text-align: center">
                <td style="text-align: center;">STT</td>
                <td style="text-align: center;">Tên bộ môn</td>
                <td style="text-align: center;">Mã bộ môn</td>
                <td>&nbsp;</td>
            </tr>
            <?php
            echo form_open('daotao/khoa/bomon/add/'.$makhoa);
            ?>
            <tr style="text-align: center">
                <td></td>
                <td>
                    <input type="text" class="form-control" required name="tennganh">
                </td>
                <td>
                    <input type="text" class="form-control" required name="manganh">
                </td>

                <td>
                    <button type="submit" class="btn btn-success" style="margin-bottom: 10px;">
                        <i class="fa fa-save"></i>
                        Thêm
                    </button>
                </td>
                <?php echo form_close();?>
            </tr>
            <?php if(isset($bomon)){
                $i = 1;
                foreach ($bomon as $row){
                    echo form_open('daotao/khoa/bomon/update/'.$row->manganh.'/'.$row->makhoa)
                    ?>
                    <tr style="text-align: center">
                        <td><?php echo $i;?></td>
                        <td>
                            <?php
                            if(isset($manganh) && $manganh == $row->manganh){
                                ?>
                                <input type="text" name="tenkhoa" value="<?php echo $row->tennganh?>" class="form-control">
                                <?php
                            }else{
                                ?>
                                <a href="<?php echo base_url()?>daotao/giaovien/view/<?php echo $row->manganh?>"><?php echo $row->tennganh;?></a> 
                                <?php
                            }
                            ?>
                        </td>
                        <td><?php echo $row->manganh?></td>
                        <td>
                            <?php echo form_close()?>
                            <a href="<?php echo base_url()?>daotao/khoa/chuyennganh/view_bomon/<?php echo $row->manganh?>/<?php echo $row->makhoa?>"><i class="fa fa-pencil"></i></a>
                            <a href="<?php echo base_url()?>daotao/khoa/bomon/delete/<?php echo $row->manganh?>/<?php echo $row->makhoa?>" onclick="return confirm('Bạn có chắc chắn muốn xóa bộ môn <?php echo $row->tennganh?> ?')"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
            }?>
        </table>
        </div>
    </div>
</div>
