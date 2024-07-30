<?php include('header.php');
$pid = base64_decode($_REQUEST['activate']);
$rows = dbRow("SELECT * FROM programs WHERE pid='$pid' ");
$outline = dbSQL("SELECT * FROM programs order by pid ");
if(isset($_POST['confirm'])){
    trim(extract($_POST)); 
    $check = dbRow("SELECT * FROM enrollments WHERE program='".$program."' AND phone='".$phone."' ");
    if(!$check){
                $sql = $dbh->query("INSERT INTO enrollments VALUES('','$program','$firstname', '$lastname', '$phone', 
                    '$whatsapp','$gender','$country','$today','$occupation','$field_of_study','$company','$mode_of_class','$time_for_class')");
                if($sql){
                      echo "<script>
                            alert('Hello $firstname, you have successfully enrolled for this course');
                            window.location = '".SITE_URL."';
                            </script>";
                }else{
                    echo "<script>
                            alert(' Course enrolment not successful');
                            window.location = '".SITE_URL."';
                            </script>";
                }
    }else{
             echo "<script>
            alert('Hello $firstname, you have already enrolled for this course');
            window.location = '".SITE_URL."';
            </script>";
    }
}
?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
	<div class="container text-center py-5">
		<h3 class="text-white mb-4 animated slideInDown"><?=$rows->pg_name;?></h3>
	</div>
</div>
    <div class="container-xxl py-5" style="background-color:#fff">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
               <!--  <p class="section-title bg-white text-center text-primary px-3">Contact Us</p>
                <h1 class="mb-5">If You Have Any Query, Please Contact Us</h1> -->
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <img src="uploads/<?=$rows->pg_image;?>" style="width: 80%"; /> 
                     <p style="text-align: justify;"> <?=$rows->description;?> </p>
                    <b> Software used; </b> <br/>
                    <?php foreach(explode('#', $rows->software) as $st):?>
                      <p style="line-height: 1em"><i class="fa fa-angle-right"> </i> <?=$st;?> </p>
                  <?php endforeach;?>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h2 class="mb-4">Enrol for <b style="color:#ff7900;"><?=$rows->pg_name;?> </b></h2>
                    <form method="post" action="" role="form">
                        <input type="hidden" name="program" value="<?=$pid;?>">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="firstname" placeholder="Your Name" required>
                                    <label for="name">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="lastname" placeholder="Your Name" required>
                                    <label for="name">Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="phone" placeholder="Your Contact Number" required>
                                    <label for="email">Contact Number</label>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-floating">
                                <input type="text" class="form-control" name="whatsapp" placeholder="Your Whatsapp Number">
                                    <label for="email">Whatsapp Number</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select type="text" name="gender" class="form-control" required>
                                        <option value=""> --- Gender --- </option>
                                        <option value="Male"> Male </option>
                                        <option value="Female"> Female </option>
                                    </select>
                                 <label for="subject">Your Gender</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                     <select type="text" name="country" class="form-control" required>
                                        <option value=""> --- Nationality --- </option>
                                            <?php foreach(get_countries($countries) as $val){?>
                                                <option value="<?=$val;?>"> <?=$val;?> </option>
                                            <?php }?>
                                        </select>
                                    <label for="message">Your Nationality</label>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="occupation" placeholder="Your Occupation">
                                    <label for="occupation">Occupation</label>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="field_of_study" placeholder="Field of Study">
                                    <label for="study">Field of Study</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="company" placeholder="Company /University" required>
                                    <label for="email">Company / University (State year of study if student)</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select type="text" name="mode_of_class" class="form-control" required>
                                        <option value=""> --- Select --- </option>
                                        <option value="Virtual"> Virtual </option>
                                        <option value="Physical"> Physical </option>
                                    </select>
                                 <label for="subject">Mode of Class</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select type="text" name="time_for_class" class="form-control" required>
                                        <option value=""> --- Select --- </option>
                                        <option value="Week days"> Week days </option>
                                        <option value="Weekends"> Weekends </option>
                                    </select>
                                 <label for="subject">Time for Class</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="confirm" class="btn btn-secondary py-3 px-5" >
                                    Submit</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
<?php include('footer.php');?>