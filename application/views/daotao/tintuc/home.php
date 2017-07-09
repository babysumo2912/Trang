<?php
include'header.php';
?>

<section class="row">
    <div class="max">
        <div class="col-xs-3" style="border: 1px solid #ccc" >
            <ul style = "list-style: none;">
                <li style = "line-height: 50px">
                    <a href="" style = "display: block">Viết bài</a>
                </li>
                <li style = "line-height: 50px">
                    <a href="<?php echo base_url()?>daotao/khoa/home" style = "display: block">Thông báo</a>
                </li>
                <li style = "line-height: 50px">
                    <a href="" style = "display: block">Danh sách bài viết</a>
                </li>
            </ul>
        </div>
        <div class="col-xs-8">
            <?php
            if(isset($err)){
                echo $err;
            }
            ?>
            <?php echo form_open('Daotao/Tintuc/baivietmoi/add');?>
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Tiêu đề cho bài viết ...">
            </div>
            <div class="form-group col-md-6">
                <label for="">Chọn danh mục</label>
                <select name="catalog" id="" class="form-control">
                    <option value="1">Thông báo</option>
                    <option value="2">Bản tin</option>
                    <option value="3">Chương trình đào tạo</option>
                    <option value="4">Humg media</option>


                </select>
            </div>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-success"  style="float: right">
                    <i class="fa fa-save"></i>
                    &nbsp;Lưu
                </button>
            </div>
            <div  class="col-md-12">
                <textarea class="tinymce" name="tintuc" id=""rows="20"></textarea>
            </div>
            <?php echo form_close()?>
        </div>
    </div>
</section>

