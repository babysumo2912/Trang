<?php include 'layout/header.php' ?> 
<?php if(isset($tintuc)){
    foreach ($tintuc as $row){}
}?>
<section style="background: white; width:100%">
    <div style="max-width: 1100px;margin: 0 auto;padding: 20px;  background: white">
        <h2><?php echo $row->tieude?></h2>
        <p>
            <?php echo $row->noidung?>
        </p>
    </div>


</section>
<?php include 'layout/footer.php' ?>