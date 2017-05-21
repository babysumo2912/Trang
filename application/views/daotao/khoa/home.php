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
         <h4>Danh sách khoa, mã số khoa</h4>
     </div>
     <?php
     $style = array(
         'class' => 'form-group'
     );
     echo form_open('daotao/khoa/home/add')
     ?>
     <div style="margin-bottom: 20px">
         <input type ="submit" class="btn btn-default" value="Thêm khoa mới">
         <?php
         if(isset($err)){
             echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp'.$err;
         }
         ?>
     </div>
 	<table class="table table-hover">
        <tr style="text-align: center">
            <td>Tên khoa</td>
            <td>Kí hiệu số</td>
            <td>Kí hiệu chữ</td>
            <td>&nbsp;</td>
        </tr>
        <tr style="text-align: center">
            <td>
                <input type="text" class="form-control" required name="tenkhoa">
            </td>
            <td>
                <input type="text" class="form-control" required name="kihieuso">
            </td>
            <td>
                <input type="text" class="form-control" required name="makhoa">
            </td>
            <?php echo form_close();?>
            <td></td>
        </tr>
        <?php if(isset($khoa)){
            foreach ($khoa as $row){
                echo form_open('daotao/khoa/home/update/'.$row->makhoa)
        ?>
            <tr style="text-align: center">
                <td><input type="text" value="<?php echo $row->tenkhoa?>" class="form-control" name="tenkhoa" required ></td>
                <td><?php echo $row->kihieu?></td>
                <td><?php echo $row->makhoa?></td>
                <td>
                    <button type="submit" style="border:none; background: inherit"><i class="fa fa-pencil"></i></button>
                    <?php echo form_close();?>
                    <a href="<?php echo base_url()?>"><i class="fa fa-remove"></i></a>
                </td>
            </tr>
        <?php
            }
        }?>
    </table>
     </div>
 </div>
<!-- </div>-->