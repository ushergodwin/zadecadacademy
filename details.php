<?php include('header.php');
if(isset($_REQUEST['read-more'])){
    $pid = base64_decode($_REQUEST['read-more']);
    $row = dbRow("SELECT * FROM programs WHERE pid='$pid' ");
    $outline = dbSQL("SELECT * FROM programs order by pid ");
}elseif(isset($_REQUEST['activate'])){
 $pid = $_REQUEST['activate'];
 $dbh->query("INSERT INTO enrollments VALUES(NULL, '".$_SESSION['userid']."', '".$pid."', '".$today."' )");
 $val = dbRow("SELECT * FROM programs WHERE pid='$pid' ");
 redirect_page('?read-more='.base64_encode($pid).'&content='.slugify($val->pg_name));
}
?>
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h2 class="text-white mb-4 animated slideInDown"><?=$row->pg_name;?></h2>
        </div>
    </div>
    <div class="container-xxl py-8" style="background-color: #fff;">
        <div class="row">
                <div class="col-md-8">
                <br>
                <p> <img src="uploads/<?=$row->pg_image;?>" title="<?=$row->pg_name;?>" style="width:100%" /> </p>
                <p style="text-align: justify;"> <?=$row->description;?> </p>
                <b> Software used; </b> <br/>
                <?php foreach(explode('#', $row->software) as $st):?>
                  <p style="line-height: 1em"><i class="fa fa-angle-right"> </i> <?=$st;?> </p>
            <?php endforeach;?>
               <h2 style="font-weight: bold;">
                <a href="enrol?activate=<?=base64_encode($row->pid);?>&description=<?=base64_encode($row->pg_name);?>" class="btn btn-secondary py-3 px-5"> <i class="fa fa-pencil"> </i> ENROL NOW </a>
                </h2>
                </div>
                <div class="col-md-4">
                    <br>
                    <h4> Courses Outline </h4>
                    <?php foreach($outline as $val):?>
                        <p style="line-height: 1em"><i class="fa fa-angle-right"> </i> 
                            <a href="details?read-more=<?=base64_encode($val->pid);?>&content=<?=slugify($val->pg_name);?>" style="<?php echo($row->pid == $val->pid)?'color:#ff7900;':'';?>"> 
                                <?=$val->pg_name;?> </a> </p>
                    <?php endforeach;?> 
                </div>
        </div>
    </div>
<?php include('footer.php');?>