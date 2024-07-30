<?php include('header.php');
$res = dbSQL("SELECT * FROM courses order by code ");
?>
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h3 class="text-white mb-4 animated slideInDown"> Course Outline Downloads </h3>
        </div>
    </div>
<div class="container-xxl py-5" style="background-color: #fff;">
    <div class="container">
        <div class="row g-5 align-items-end">
            <div class="col-lg-12">
                <?php foreach($res as $val):?>
                <p> <i class="fa fa-file-pdf fa-fw"> </i><a href="uploads/<?=$val->attachment;?>" target="_blank" style="color:blue">Course Outline-<?=$val->cs_name;?> [<?=getSize(filesize("uploads/".$val->attachment));?>]</a> </p>
            <?php endforeach;?>
            </div>
            </div>
        </div>
    </div>
    <!-- About End -->
<?php include('footer.php');?>