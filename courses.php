<?php include('header.php');
$courses = dbSQL("SELECT * FROM  programs order by pid");
?>
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h3 class="text-white mb-4 animated slideInDown"> Our Courses </h3>
        </div>
    </div>
<div class="container-xxl py-5" style="background-color: #fff;">
        <div class="container">
            <div class="row gy-5 gx-4">
                    <?php foreach($courses as $row):?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative">
                                <a href="details?read-more=<?=base64_encode($row->pid);?>&content=<?=slugify($row->pg_name);?>" style="color:#ff7900;"><img class="img-fluid" src="uploads/<?=$row->pg_image;?>" 
                                style="width: 100%;height: 300px" alt=""> </a>
                            </div>
                            <div class="text-center p-4">
                                <h6> <?=$row->pg_name;?></h6>
                                <p> <?=truncate($row->description);?> </p>
                     <a href="details?read-more=<?=base64_encode($row->pid);?>&content=<?=slugify($row->pg_name);?>" style="color:#ff7900;"> Read More <i class="fa fa-angle-double-right"> </i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
<?php include('footer.php');?>