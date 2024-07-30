<?php include('header.php');
$rows = dbSQL("SELECT * FROM images WHERE status='Yes' ");
?>
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h2 class="text-white mb-4 animated slideInDown">Gallery</h2>
        </div>
    </div>
    <div class="container-xxl py-5" style="background-color: #fff;">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            </div>
            <?php if(sizeof($rows) > 0){?>
                <div class="row" id="lightgallery">
                    <?php foreach($rows as $val):
                        $caption = '';
                        ?>
                        <div class="col-md-4 col-sm-4" data-aos="fade" data-src="uploads/<?=$val->image;?>" data-sub-html="<h2>
                        <?=$caption;?></h2>">
                        <a href="#"><img src="uploads/<?=$val->image;?>" alt="<?=$caption;?>" class="img-fluid" 
                            style="margin-bottom: 10px;"></a>
                      </div>
                  <?php endforeach;?>
                </div>
                <?php }?>
        </div>
    </div>
<?php include('footer.php');?>