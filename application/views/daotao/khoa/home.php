<?php 
include 'header.php';
 ?>

 <div class = "row">
 <div class = "max">
<!--     <div class="col-xs-3" style="border: 1px solid #ccc" >-->
<!--         <ul style = "list-style: none;">-->
<!--             <li style = "line-height: 50px">-->
<!--                 <a href="" style = "display: block">Hệ đào tạo</a>-->
<!--             </li>-->
<!--             <li style = "line-height: 50px">-->
<!--                 <a href="--><?php //echo base_url()?><!--daotao/khoa/home" style = "display: block">Quản lí khoa</a>-->
<!--             </li>-->
<!--             <li style = "line-height: 50px">-->
<!--                 <a href="" style = "display: block">Quản lí chuyên ngành</a>-->
<!--             </li>-->
<!--         </ul>-->
<!--     </div>-->
<!--     <div class="col-xs-9">-->
     <div class="text-center">
         <h3><b>DANH SÁCH CÁC KHOA</b></h3>
     </div>
     <?php
     $style = array(
         'class' => 'form-group'
     );
     echo form_open('daotao/khoa/home/add')
     ?>
     <div style="margin-bottom: 20px">
         <?php
         if(isset($err)){
             echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp'.$err;
         }
         ?>
     </div>
 	<table class="table table-hover">
        <tr style="text-align: center">
            <td>STT</td>
            <td>Tên khoa</td>
            <td>Kí hiệu số</td>
            <td>Kí hiệu chữ</td>
            <td>&nbsp;</td>
        </tr>
        <tr style="text-align: center">
            <td></td>
            <td>
                <input type="text" class="form-control" required name="tenkhoa">
            </td>
            <td>
                <input type="text" class="form-control" required name="kihieuso">
            </td>
            <td>
                <input type="text" class="form-control" required name="makhoa">
            </td>

            <td><input type ="submit" class="btn btn-default" value="Thêm khoa mới"></td>
            <?php echo form_close();?>
        </tr>
        <?php if(isset($khoa)){
            $i = 1;
            foreach ($khoa as $row){
                echo form_open('daotao/khoa/home/update/'.$row->makhoa)
        ?>
            <tr>
                <td><?php echo $i;?></td>
                <td>
                    <?php
                    if(isset($makhoa) && $makhoa == $row->makhoa){
                        ?>
                        <input type="text" name="tenkhoa" value="<?php echo $row->tenkhoa?>" class="form-control">
                        <?php
                    }else{
                        ?>
                        <a href="<?php echo base_url()?>daotao/khoa/chuyennganh/view/<?php echo $row->makhoa?>"><?php echo $row->tenkhoa;?></a>
                        <?php
                    }
                    ?>
                </td>
                <td><?php echo $row->kihieu?></td>
                <td><?php echo $row->makhoa?></td>
                <td>
                    <?php echo form_close()?>
                    <a href="<?php echo base_url()?>daotao/khoa/home/view/<?php echo $row->makhoa?>"><i class="fa fa-pencil"></i></a>
                    <a href="<?php echo base_url()?>daotao/khoa/home/delete/<?php echo $row->makhoa?>" onclick="return confirm('Bạn có chắc chắn muốn xóa khoa <?php echo $row->tenkhoa?> ?')"><i class="fa fa-remove"></i></a>
                </td>
            </tr>
        <?php
                $i++;
            }
        }?>
    </table>
     </div>
 </div>