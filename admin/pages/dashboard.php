<?php 
require_once("../includes/config.php");// calls the connection script
if(empty($_SESSION['userid'])) // checks if there is no logged in user
{
	echo "<script>
	alert('*** Please login to access this page ***');
	window.location = '../';
	</script>";
}else{ // stores the login information in user session
	$lname = $_SESSION['last'];
	$fname = $_SESSION['first'];
	$names = $fname.'&nbsp;'.$lname;
	$logged_in = $fname. " " .$lname;
	$email = $_SESSION['email'];
	$userid = $_SESSION['userid'];
	$role = $_SESSION['interface'];
}
if(isset($_REQUEST['logout'])){
  session_start();
  unset($_SESSION['email']);
  header("Location:../");
  session_destroy();
}elseif(isset($_POST['update_profile'])){
	extract($_POST);
	$chk = $dbh->query("SELECT password from users where user_id='$userid'")->fetchColumn();
	if(md5($oldpass) == $chk ){
		$new = md5($newpass);
		$upt = $dbh->query("UPDATE users set firstName='$first',lastName='$last',
		email='$new_email',password='$new' WHERE user_id='$userid'");
		if($upt){
			header("Location:?logout");
		}else{
			header("Location:?profile");
		}
	}else{
		  echo "<script>
		  alert('*** Old password is incorrect.***');
		  window.location = '?profile';
		</script>";
	} 
}elseif(isset($_POST['register'])){
	trim(extract($_POST));
	$uname = $dbh->query("SELECT email from users WHERE email='$email'")->fetchColumn();
	if($password == $confirm){
		if(!$uname){
			$dbh->query("INSERT INTO users VALUES('','$first','$last','$email','".md5($password)."','$email','user','$dept','')");
			echo "<script>
			alert('You have successfully registered the user');
			window.location = '?users';
			</script>";	
		}else{
			echo "<script>
			alert('Email is already registered');
			window.location = '?users';
			</script>";		
		}
	}else{
		echo "<script>
			alert('Passwords do not match.. Please try again..');
			window.location = '?users';
			</script>";	
	}
	
}elseif(isset($_POST['add_program'])){
	extract($_POST);
	$filename=  $_FILES["imgfile"]["name"];
	$chk = rand(111111111,999999999);
	$ext = strrchr($filename, ".");
	$apfile = $chk.$ext;
	$chk = $dbh->query("SELECT pg_name FROM programs WHERE pg_name='$cs_name' ")->fetchColumn();
	if(!$chk){
		if(!empty($filename)){
		 if($_FILES["imgfile"]["type"] == "image/jpg" || $_FILES["imgfile"]["type"] == "image/png"
			|| $_FILES["imgfile"]["type"] == "image/jpeg")
		  {
			if(file_exists($_FILES["imgfile"]["name"]))
			{
			  echo "File name exists.";
			}
			else
			{
			$desc = $con->real_escape_string($editor);
			$var = $dbh->query("INSERT INTO programs VALUES('','$pg_name','$apfile','$desc','$software')");  
			
			if($var){
				move_uploaded_file($_FILES["imgfile"]["tmp_name"],"../../uploads/$apfile");
				header("Location:?prview");
			}else{
					echo "<script>
					alert('Image not added. Try again');
					window.location = '?prg';
					</script>";
					}
			}
		  }else{
			echo "<script>
				alert('Please choose avalid image with small size!!!');
				window.location='?prg';
				</script>";
		  }
		}
	}else{
		echo "<script>
		alert('Program already exists!!!');
		window.location='?prg';
		</script>";
	}	  
}elseif(isset($_POST['add_course'])){
	extract($_POST);
	$filename=  $_FILES["imgfile"]["name"];
	$chk = rand(111111111,999999999);
	$ext = strrchr($filename, ".");
	$apfile = $chk.$ext;
	$chk = $dbh->query("SELECT cs_name FROM courses WHERE cs_name='$cs_name' ")->fetchColumn();
	if(!$chk){
		if(!empty($filename)){
		 if($_FILES["imgfile"]["type"] == "application/pdf")
		  {
			if(file_exists($_FILES["imgfile"]["name"]))
			{
			  echo "File name exists.";
			}
			else
			{
			
			$var = $dbh->query("INSERT INTO courses VALUES('','$cs_name','$apfile')");  
			
			if($var){
				move_uploaded_file($_FILES["imgfile"]["tmp_name"],"../../uploads/$apfile");
				header("Location:?courses");
			}else{
					echo "<script>
					alert('Image not added. Try again');
					window.location = '?courses';
					</script>";
					}
			}
		  }else{
			echo "<script>
				alert('Please choose avalid image with small size!!!');
				window.location='?courses';
				</script>";
		  }
		}
	}else{
		echo "<script>
		alert('Course already exists!!!');
		window.location='?courses';
		</script>";
	}	  
}elseif(isset($_POST['add_image'])){
	extract($_POST);
	$filename=  $_FILES["imgfile"]["name"];
	$chk = rand(111111111,999999999);
	$ext = strrchr($filename, ".");
	$apfile = $chk.$ext;
		  if(!empty($filename)){
		 if($_FILES["imgfile"]["type"] == "image/jpg" || $_FILES["imgfile"]["type"] == "image/png"
			|| $_FILES["imgfile"]["type"] == "image/jpeg")
		  {
			if(file_exists($_FILES["imgfile"]["name"]))
			{
			  echo "File name exists.";
			}
			else
			{
			$var = $dbh->query("INSERT INTO gallery VALUES('','$apfile','$caption','$status')");  
			if($var){
				move_uploaded_file($_FILES["imgfile"]["tmp_name"],"../../uploads/$apfile");
				header("Location:?add");
			}else{
					echo "<script>
					alert('Image not updated. Try again');
					window.location = '?add';
					</script>";
					}
			}
		  }else{
			echo "<script>
				alert('Please choose avalid image with small size!!!');
				window.location='?add';
				</script>";
		  }
		}
}elseif(isset($_POST['next_image'])){
	extract($_POST);
	$filename=  $_FILES["imgfile"]["name"];
	$chk = rand(111111111,999999999);
	$ext = strrchr($filename, ".");
	$apfile = $chk.$ext;
		  if(!empty($filename)){
		 if($_FILES["imgfile"]["type"] == "image/jpg" || $_FILES["imgfile"]["type"] == "image/png"
			|| $_FILES["imgfile"]["type"] == "image/jpeg")
		  {
			if(file_exists($_FILES["imgfile"]["name"]))
			{
			  echo "File name exists.";
			}
			else
			{
			$var = $dbh->query("INSERT INTO images VALUES('','$apfile','$caption','Yes')");  
			if($var){
				move_uploaded_file($_FILES["imgfile"]["tmp_name"],"../../uploads/$apfile");
				header("Location:?txr");
			}else{
					echo "<script>
					alert('Image not updated. Try again');
					window.location = '?txr';
					</script>";
					}
			}
		  }else{
			echo "<script>
				alert('Please choose avalid image with small size!!!');
				window.location='?txr';
				</script>";
		  }
		}
}elseif(isset($_REQUEST['xdelete'])){
	$tm = trim($_REQUEST['xdelete']);
	$attach = $dbh->query("SELECT image FROM gallery WHERE s_id='$tm'")->fetchColumn();
	$dbh->query("DELETE FROM gallery WHERE s_id='$tm' ");
	unlink("../../images/".$attach);
	$_SESSION['success'] = 'Image deleted successfully';
	redirect_page('?add');
}elseif(isset($_REQUEST['txdelete'])){
	$tm = trim($_REQUEST['txdelete']);
	$attach = $dbh->query("SELECT image FROM images WHERE s_id='$tm'")->fetchColumn();
	$dbh->query("DELETE FROM images WHERE s_id='$tm' ");
	unlink("../../images/".$attach);
	$_SESSION['success'] = 'Image deleted successfully';
	redirect_page('?txr');
}elseif(isset($_REQUEST['smdel'])){
	$tm = trim($_REQUEST['smdel']);
	$dbh->query("DELETE FROM contacts WHERE cid='$tm' ");
	$_SESSION['success'] = 'Message deleted successfully';
	redirect_page('?msg');
}elseif(isset($_POST['add_team'])){
	extract($_POST);
	$filename=  $_FILES["imgfile"]["name"];
	$chk = rand(111111111,999999999);
	$ext = strrchr($filename, ".");
	$apfile = $chk.$ext;
		if(!empty($filename)){
		 if($_FILES["imgfile"]["type"] == "image/jpg" || $_FILES["imgfile"]["type"] == "image/png"
			|| $_FILES["imgfile"]["type"] == "image/jpeg")
		  {
			if(file_exists($_FILES["imgfile"]["name"]))
			{
			  echo "File name exists.";
			}
			else
			{
			$var = $dbh->query("INSERT INTO team VALUES('','$apfile','$name','$position')");  
			if($var){
				move_uploaded_file($_FILES["imgfile"]["tmp_name"],"../../uploads/$apfile");
				header("Location:?team");
			}else{
					echo "<script>
					alert('Image not updated. Try again');
					window.location = '?team';
					</script>";
					}
			}
		  }else{
			echo "<script>
				alert('Please choose avalid image with small size!!!');
				window.location='?team';
				</script>";
		  }
		}
}elseif(isset($_REQUEST['txdel'])){
	$tm = trim($_REQUEST['txdel']);
	$attach = $dbh->query("SELECT image FROM team WHERE tid='$tm'")->fetchColumn();
	$dbh->query("DELETE FROM team WHERE tid='$tm' ");
	unlink("../../uploads/".$attach);
	$_SESSION['success'] = 'Image deleted successfully';
	redirect_page('?team');
}elseif(isset($_REQUEST['csdel'])){
	$tm = trim($_REQUEST['csdel']);
	$attach = $dbh->query("SELECT attachment FROM courses WHERE code='$tm'")->fetchColumn();
	$dbh->query("DELETE FROM courses WHERE code='$tm' ");
	unlink("../../uploads/".$attach);
	$_SESSION['success'] = 'Course deleted successfully';
	redirect_page('?cview');
}elseif(isset($_REQUEST['pgdel'])){
	$tm = trim($_REQUEST['pgdel']);
	$attach = $dbh->query("SELECT pg_image FROM programs WHERE pid='$tm'")->fetchColumn();
	$dbh->query("DELETE FROM programs WHERE pid='$tm' ");
	unlink("../../uploads/".$attach);
	$_SESSION['success'] = 'Program deleted successfully';
	redirect_page('?prview');
}elseif(isset($_POST['add_topic'])){
	extract($_POST);
	$chk = $dbh->query("SELECT topic FROM curriculum WHERE topic='$topic' AND course='$course' ")->fetchColumn();
	if(!$chk){	
		$filename=  $_FILES["imgfile"]["name"];
		$chk = rand(111111111,999999999);
		$ext = strrchr($filename, ".");
		$apfile = $chk.$ext;
		if(!empty($filename)){
		 if($_FILES["imgfile"]["type"] == "application/pdf")
		  {
			if(file_exists($_FILES["imgfile"]["name"]))
			{
			  echo "File name exists.";
			}
			else
			{
			$var = $dbh->query("INSERT INTO curriculum VALUES('','$course','$topic','$apfile')");  
			if($var){
				move_uploaded_file($_FILES["imgfile"]["tmp_name"],"../../uploads/$apfile");
				header("Location:?clm");
				exit();
			}else{
					echo "<script>
					alert('Image not updated. Try again');
					window.location = '?team';
					</script>";
					}
			}
		  }else{
			echo "<script>
				alert('Please choose avalid image with small size!!!');
				window.location='?team';
				</script>";
		  }
		}
	}else{
		echo "<script>
		alert('Title already exists!!!');
		window.location='?clm';
		</script>";
	}	  
}elseif(isset($_REQUEST['cxdel'])){
	$tm = trim($_REQUEST['cxdel']);
	$img = $dbh->query("SELECT attachment FROM curriculum WHERE cid='$tm'")->fetchColumn();
	$dbh->query("DELETE FROM curriculum WHERE cid='$tm' ");
	unlink("../../uploads/".$attach);
	$_SESSION['success'] = 'Record deleted successfully';
	redirect_page('?cvx');
}elseif(isset($_REQUEST['vxdel'])){
	$tm = trim($_REQUEST['vxdel']);
	$dbh->query("DELETE FROM videos WHERE vid='$tm' ");
	$_SESSION['success'] = 'Video deleted successfully';
	redirect_page('?vxlist');
}elseif(isset($_POST['add_video'])){
	trim(extract($_POST));
	$vlink = $con->real_escape_string($link);
	$dbh->query("INSERT INTO videos VALUES('','$course','$title','".trim($vlink)."')");
	$_SESSION['success'] = 'Vimeo Link added successfully';
}elseif(isset($_POST['change_photo'])){
	extract($_POST);
	$filename=  $_FILES["imgfile"]["name"];
	$chk = rand(111111111,999999999);
	$ext = strrchr($filename, ".");
	$apfile = $chk.$ext;
		  if(!empty($filename)){
		 if($_FILES["imgfile"]["type"] == "image/jpg" || $_FILES["imgfile"]["type"] == "image/png"
			|| $_FILES["imgfile"]["type"] == "image/jpeg")
		  {
			if(file_exists($_FILES["imgfile"]["name"]))
			{
			  echo "File name exists.";
			}
			else
			{
			$var = $dbh->query("SELECT pg_image FROM programs WHERE pid='$reference' ")->fetchColumn();
			if($var){
				$dbh->query("UPDATE programs set pg_image='$apfile' WHERE pid='$reference' ");
				move_uploaded_file($_FILES["imgfile"]["tmp_name"],"../../uploads/$apfile");
				unlink("../../uploads/".$var);
				header("Location:?prview");
			}else{
					echo "<script>
					alert('Image not updated. Try again');
					window.location = '?prview';
					</script>";
					}
			}
		  }else{
			echo "<script>
				alert('Please choose avalid image with small size!!!');
				window.location='?prview';
				</script>";
		  }
		}
}elseif(isset($_POST['add_chosen'])){
	extract($_POST);
	$filename=  $_FILES["imgfile"]["name"];
	$chk = rand(111111111,999999999);
	$ext = strrchr($filename, ".");
	$apfile = $chk.$ext;
	$desc = $con->real_escape_string(trim($_POST['description']));
		  if(!empty($filename)){
		 if($_FILES["imgfile"]["type"] == "image/jpg" || $_FILES["imgfile"]["type"] == "image/png"
			|| $_FILES["imgfile"]["type"] == "image/jpeg")
		  {
			if(file_exists($_FILES["imgfile"]["name"]))
			{
			  echo "File name exists.";
			}
			else
			{
			$ref = rand(11111,99999);
			$var = $dbh->query("INSERT INTO choose_us VALUES('','$apfile','$title','$desc')");  
			if($var){
				move_uploaded_file($_FILES["imgfile"]["tmp_name"],"../../uploads/$apfile");
				header("Location:?chzn");
			}else{
					echo "<script>
					alert('Image not updated. Try again');
					window.location = '?chzn';
					</script>";
					}
			}
		  }else{
			echo "<script>
				alert('Please choose avalid image with small size!!!');
				window.location='?chzn';
				</script>";
		  }
		}
}elseif(isset($_POST['edit_chosen'])){
	extract($_POST);
	$filename=  $_FILES["imgfile"]["name"];
	$chk = rand(111111111,999999999);
	$ext = strrchr($filename, ".");
	$apfile = $chk.$ext;
	$desc = $con->real_escape_string(trim($_POST['description']));
		if(!empty($filename)){
		 if($_FILES["imgfile"]["type"] == "image/jpg" || $_FILES["imgfile"]["type"] == "image/png"
			|| $_FILES["imgfile"]["type"] == "image/jpeg"){
			if(file_exists($_FILES["imgfile"]["name"]))
			{
			  echo "File name exists.";
			}
			else
			{
			$var = $dbh->query("SELECT image FROM choose_us WHERE id='$reference' ")->fetchColumn();
			if($var){
				$dbh->query("UPDATE choose_us set image='$apfile',title='$title', description='$desc' 
					WHERE id='$reference' ");
				move_uploaded_file($_FILES["imgfile"]["tmp_name"],"../../uploads/$apfile");
				unlink("../../uploads/".$var);
				header("Location:?chzn");
			}else{
					echo "<script>
					alert('Image not updated. Try again');
					window.location = '?chzn';
					</script>";
					}
			}
		  }else{
			echo "<script>
				alert('Please choose avalid image with small size!!!');
				window.location='?chzn';
				</script>";
		  }
		}else{
			$dbh->query("UPDATE choose_us set title='$title', description='$desc' WHERE id='$reference' ");
			header("Location:?chzn");
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="shortcut icon" href="../../img/favicon.png" type="images/png" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> ZadeAcademy: Dashboard </title>
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
	 <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="../dist/css/toastr.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Angular JS for validation -->  
   <script src="../dist/js/angular.min.js"></script>
   <script src="../dist/js/jquery.min.js"></script>
	<script>
	var app = angular.module("myApp",[]);
	app.controller("ctrl",function($scope){
	});
	</script>
<!-- Ajax library to enable live table edit and auto complete search -->
<script src="../dist/js/ajaxjquery.min.js"></script>
<script src="../dist/js/canvasjs.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
<script type="text/javascript">
       // JavaScript function for printing using div element
        function PrintContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
</script>
<style type="text/css">
.canvasjs-chart-credit{
			display:none;
			visibility:hidden;
}
</style>
<style type="text/css">
	.ng-show{
		color:red;
		font-size:11px;
		position:fixed;
}
</style>
</head>
<body>
    <div id="wrapper" ng-app="myApp" ng-controller="ctrl">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php" style="color:#337ab7;font-weight:bolder;font-size:14px">
				 ZadeAcademy </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i> 
						<?=$names?> (<?php echo($_SESSION['interface'] == "admin")?'Administrator':$_SESSION['interface'];?>)  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="?logout"><i class="fa fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                           <a href="dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard </a>
                        </li>
						<li>
                           <a href="?add"><i class="fa fa-camera fa-fw"></i> Slider Photos </a>
                        </li>
                        <li>
                           <a href="?txr"><i class="fa fa-camera fa-fw"></i> Gallery Photos </a>
                        </li>
						<!-- <li>
                           <a href="?team"><i class="fa fa-user fa-fw"></i> Lecturer Photos </a>
                        </li> -->
                        <li>
                           <a href="?chzn"><i class="fa fa-tasks fa-fw"></i> Why Choose Us </a>
                        </li>
						<li>
                            <a href="javascript:void(0)"><i class="fa fa-database fa-fw"></i> Course Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li> <a href="?prg"> <i class="fa fa-arrow-right fa-fw"> </i> Add Course  </a></li>
                                <li> <a href="?prview"> <i class="fa fa-arrow-right fa-fw"> </i> View Courses </a></li>
						   </ul>
                        </li>
						<li>
                            <a href="javascript:void(0)"><i class="fa fa-download fa-fw"></i> Course Outlines<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">			
								<li> <a href="?courses"> <i class="fa fa-arrow-right fa-fw"> </i> New Attachment  </a></li>
                                <li> <a href="?cview"> <i class="fa fa-arrow-right fa-fw"> </i> View Attachments</a></li>
						   </ul>
                        </li>
						<li>
                           <a href="?msg"><i class="fa fa-commenting fa-fw"></i> Contact Messages </a>
                        </li>
						<li>
                           <a href="?enrol"><i class="fa fa-users fa-fw"></i> Enrolled Students </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="row">
			<?php if(isset($_REQUEST['profile'])){
				?>
				<div class="col-md-6">
				<br/>
				<div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="page-title"> Update Profile</h4>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="">
                            <fieldset>
								 <div class="form-group">
								 <span> <b> First Name: </b> </span>
                                    <input class="form-control"  name="first" type="text"
									value="<?=$fname?>" readonly />
                                </div>
								<div class="form-group">
								 <span> <b> Last Name: </b> </span>
                                    <input class="form-control"  name="last" type="text"
									value="<?=$lname?>" readonly />
                                </div>
                                <div class="form-group">
								 <span> <b> Username: </b> </span>
                                  <input class="form-control"  name="new_email" value="<?=$email?>" type="text" <?php echo($role == "user")?'readonly':NULL?>/>
                                </div>
								 <div class="form-group">
								 <span> <b> Old Password: </b> </span>
                                  <input class="form-control"  name="oldpass" value="" type="password" />
                                </div>
								<div class="form-group">
								 <span> <b> New Password: </b> </span>
                                  <input class="form-control"  name="newpass" value="" type="password" placeholder="Your password" required />
                                </div>
                                <input type="submit" name="update_profile" value="Update" 
								class="btn btn-primary"/>
                            </fieldset>
                        </form>
                    </div>
              </div>
			</div>
			<?php
		}elseif(isset($_REQUEST['users'])){?>
				<br/>
				<div class="col-lg-12">
                <div class="panel panel-info" >
					<div class="panel-heading">
                        <center> <h3 class="panel-title">
						<i class="fa fa-lock"></i> 
						<b> User - Registration </b></h3>
						</center>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="">
								<div class="col-md-3">
									<div class="form-group">
										<label> First Name: </label>
											<input class="form-control" placeholder="e.g Isaac" name="first" type="text" autofocus required />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label > Last Name: </label>
											<input class="form-control" placeholder="e.g Akatukunda" name="last" type="text" required />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									<label > Email: </label>
										<input class="form-control" placeholder="Your email address" name="email" type="email" required  />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									<label > Password: </label>
										<input class="form-control" placeholder="Your password" name="password" type="password" required />
									</div>
								</div>
								<div class="col-md-3">
									 <div class="form-group">
										<label > Confirm Password: </label>
										<input class="form-control" placeholder="Confirm password" name="confirm" type="password" value="" required />
									</div>
								</div>
                                <!-- Change this to a button or input when using this as a form -->
								<div class="col-md-3">
									<div class="form-group">
									<br/>
									<label> &nbsp; </label>
										<button type="submit" name="register" value="Login" class="btn btn-primary btn-sm">
										<i class="fa fa-edit"></i> Regsiter </button>
									</div>
								</div>
                        </form>
                    </div>
                </div>
			</div>
			<?php 
			$abx = dbSQL("SELECT * FROM users order by user_id");
			if(sizeof($abx) > 0){ ?> <br/>
                <div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="page-title"> USERS INFO </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                                <thead>
                                    <tr>
                                        <th> First Name </th>
                                        <th> Last Name  </th>
										<th> Email </th>
										<th> Role </th>
										<th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($abx as $prt){
									?>
									<tr class="odd gradeX">
										<td><?=$prt->firstName?></td>
                                        <td><?=$prt->lastName?></td>
										<td><?=$prt->email?></td>
										<td><?=ucfirst($prt->role);?> </td>
                                        <td >
										<a href="?udel=<?php echo $prt->userID;?>" onclick="return confirm('Are you sure you want to delete this user?');" class="label label-danger">
										<i class="fa fa-remove"> Delete </i></a>
										</td>
									</tr>
							<?php }?> 
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>	
                </div>
			<?php
			}else{
				echo "<script>
				alert('No users registered in the system');
				window.location = 'dashboard.php';
				</script>";
			}		
			}elseif(isset($_REQUEST['txr'])){?>
				<br/>
				<div class="col-lg-12">
                <div class="panel panel-info" >
					<div class="panel-heading">
                        <h3 class="panel-title">
						<i class="fa fa-camera"></i> 
						<b> Add Slider Photos </b></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="" enctype="multipart/form-data">
								<div class="col-md-4">
									<div class="form-group">
										<label> Image: </label>
											<input class="form-control"  name="imgfile" type="file" accept="image/*" required />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label > Caption: </label>
											<input class="form-control" name="caption" type="text" />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									<br/>
									<label> &nbsp; </label>
										<button type="submit" name="next_image"  class="btn btn-primary">
										<i class="fa fa-save"></i> Submit </button>
									</div>
								</div>
                        </form>
                    </div>
                </div>
			</div>
			<?php 
			$abx = dbSQL("SELECT * FROM images ");
			if(sizeof($abx) > 0){ ?> <br/>
                <div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="page-title"> Gallery Photos </h4>
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                                <thead>
                                    <tr>
                                        <th> Image </th>
                                        <th> Caption  </th>
										<th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($abx as $prt){
									?>
									<tr class="odd gradeX">
										<td><?php include('imgModal.php');?> </td>
										<td><?=$prt->caption?></td>
                                        <td >
										<a href="?txdelete=<?php echo $prt->s_id;?>" onclick="return confirm('Are you sure you want to delete this image?');" class="btn btn-danger btn-xs">
										<i class="fa fa-remove"> Delete </i></a>
										</td>
									</tr>
							<?php }?> 
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>	
                </div>
			<?php }	
			}elseif(isset($_REQUEST['add'])){?>
				<br/>
				<div class="col-lg-12">
                <div class="panel panel-info" >
					<div class="panel-heading">
                        <h3 class="panel-title">
						<i class="fa fa-camera"></i> 
						<b> Add Slider Photos </b></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="" id="formid" enctype="multipart/form-data">
								<div class="col-md-4">
									<div class="form-group">
										<label> Image: </label>
											<input class="form-control"  name="imgfile" type="file" accept="image/*" required />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label > Caption: </label>
											<input class="form-control" name="caption" type="text" />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label > Status(show in slider): </label>
											<select name="status" class="form-control" required >
											<option value=""> --- Select --- </option>
											<option value="yes"> --- Yes --- </option>
											<option value="no"> --- No --- </option>
											</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									<br/>
									<label> &nbsp; </label>
										<button type="submit" name="add_image"  class="btn btn-primary">
										<i class="fa fa-save"></i> Submit </button>
									</div>
								</div>
                        </form>
                    </div>
                </div>
			</div>
			<?php 
			$abx = dbSQL("SELECT * FROM gallery ");
			if(sizeof($abx) > 0){ ?> <br/>
                <div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="page-title"> Slider Photos </h4>
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                                <thead>
                                    <tr>
                                        <th> Image </th>
                                        <th> Caption  </th>
										<th> Status </th>
										<th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($abx as $prt){
									?>
									<tr class="odd gradeX">
										<td><?php include('imgModal.php');?> </td>
										<td><?=$prt->caption?></td>
										<td><?=$prt->status?></td>
                                        <td >
										<a href="?xdelete=<?php echo $prt->s_id;?>" onclick="return confirm('Are you sure you want to delete this image?');" class="btn btn-danger btn-xs">
										<i class="fa fa-remove"> Delete </i></a>
										</td>
									</tr>
							<?php }?> 
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>	
                </div>
			<?php }	
			}elseif(isset($_REQUEST['chzn'])){?>
				<br/>
				<div class="col-lg-12">
                <div class="panel panel-info" >
					<div class="panel-heading">
                        <h3 class="panel-title">
						<i class="fa fa-camera"></i> 
						<b> Add Why Choose Us </b></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="" id="formid" enctype="multipart/form-data">
								<div class="col-md-6">
									<div class="form-group">
										<label> Image: </label>
											<input class="form-control"  name="imgfile" type="file" accept="image/*" required />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label > Title: </label>
											<input class="form-control" name="title" type="text" required />
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label > Description: </label>
										<input type="text" name="description" class="form-control" required> 
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
									<br/>
									<label> &nbsp; </label>
										<button type="submit" name="add_chosen"  class="btn btn-primary">
										<i class="fa fa-save"></i> Submit </button>
									</div>
								</div>
                        </form>
                    </div>
                </div>
			</div>
			<?php 
			$abx = dbSQL("SELECT * FROM choose_us ");
			if(sizeof($abx) > 0){ ?> <br/>
                <div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="page-title"> Why Choose Us Photos </h4>
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                                <thead>
                                    <tr>
                                        <th> Image <i>(Hover to update info)</th>
                                        <th> Title  </th>
                                        <th> Description  </th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($abx as $prt){
									?>
									<tr class="odd gradeX">
										<td><?php include('prvModal.php');?> </td>
										<td><?=$prt->title?></td>
										<td><?=$prt->description?></td>
									</tr>
							<?php }?> 
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>	
                </div>
			<?php }	
			}elseif(isset($_REQUEST['clm'])){?>
				<br/>
				<div class="col-lg-12">
                <div class="panel panel-info" >
					<div class="panel-heading">
                        <h3 class="panel-title">
						<i class="fa fa-database"></i> 
						<b> Add Course Content	</b></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="" enctype="multipart/form-data">
								<div class="col-md-4">
									<div class="form-group">
										<label> Course Unit: </label>
											<select name="course" class="form-control" required>
											<option value=""> --- Select --- </option>
											<?php foreach(get_courses() as $val): 
												$prog = $dbh->query("SELECT pg_name FROM programs WHERE pid='".$val->program."' ")->fetchColumn();
											?>
												<option value="<?=$val->code;?>"> <?=$val->cs_name;?>(<?=$prog;?>) </option>
											<?php endforeach;?> 
											</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label> Topic: </label>
											<input class="form-control"  name="topic" type="text"  required />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label> Attachment: </label>
										<input class="form-control"  name="imgfile" type="file" accept="application/pdf" required />
									</div>
								</div>
							
								<div class="col-md-4">
									<div class="form-group">
									<br/>
									<label> &nbsp; </label>
										<button type="submit" name="add_topic" class="btn btn-primary">
										<i class="fa fa-save"></i> Submit </button>
									</div>
								</div>
                        </form>
                    </div>
                </div>
			</div>
			<?php 
		}elseif(isset($_REQUEST['courses'])){?>
				<br/>
				<div class="col-lg-12">
                <div class="panel panel-info" >
					<div class="panel-heading">
                        <h3 class="panel-title">
						<i class="fa fa-upload fa-fw"></i> 
						<b> Add Course Outline</b></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="" enctype="multipart/form-data" >
								<div class="col-md-4">
									<div class="form-group">
										<label> Name: </label>
											<input class="form-control"  name="cs_name" type="text"  required />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label> Attachment: </label>
											<input class="form-control"  name="imgfile" type="file" accept="application/pdf" required />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									<br/>
									<label> &nbsp; </label>
										<button type="submit" name="add_course" class="btn btn-primary">
										<i class="fa fa-save"></i> Submit </button>
									</div>
								</div>
                        </form>
                    </div>
                </div>
			</div>
			
			<?php 
		}elseif(isset($_REQUEST['cview'])){
			$abx = dbSQL("SELECT * FROM courses order by cs_name ");
			if(sizeof($abx) > 0){ ?> <br/>
                <div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="page-title"> <i class="fa fa-download fa-fw"></i> Course Outline Downloads </h4>
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                                <thead>
                                    <tr>
										<th> Name </th>	
										<th> Attachment </th>
										<th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($abx as $prt){
									?>
									<tr class="odd gradeX">
										<td> <?=$prt->cs_name;?> </td>					
										<td> <a href="../../uploads/<?=$prt->attachment;?>">Download </a> </td>
										<td>
										<a href="?csdel=<?php echo $prt->code;?>" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger btn-xs">
										<i class="fa fa-remove"> Delete </i></a>
										</td>
									</tr>
							<?php }?> 
                                </tbody>
                            </table>
                        </div>
                    </div>	
                </div>
			<?php }else{
					echo '<b> No course downloads added so far... </b>';
				}	
			}elseif(isset($_REQUEST['prview'])){
			$abx = dbSQL("SELECT * FROM programs order by pg_name ");
			if(sizeof($abx) > 0){ ?> <br/>
                <div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="page-title"> All Courses </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                                <thead>
                                    <tr>
										<th> Name </th>	
										<th> Description </th>	
										<th> Image </th>
										<th> Software Used </th>
										<th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($abx as $prt){
									?>
									<tr class="odd gradeX">
										<td> <?=$prt->pg_name;?> </td>
										<td> <?=$prt->description;?> </td>
										<td><?php include('prMod.php');?> </td>
										<td> <?=$prt->software;?> </td>
										<td>
										<a href="?pgdel=<?php echo $prt->pid;?>" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger btn-xs">
										<i class="fa fa-remove"> Delete </i></a>
										</td>
									</tr>
							<?php }?> 
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>	
                </div>
			<?php }else{
					echo '<b> No programs added so far... </b>';
				}	
			}elseif(isset($_REQUEST['prg'])){?>
				<br/>
				<div class="col-lg-12">
                <div class="panel panel-info" >
					<div class="panel-heading">
                        <h3 class="panel-title">
						<i class="fa fa-database"></i> 
						<b> Add Course	</b></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="" id="formid" enctype="multipart/form-data" >
								<div class="col-md-4">
									<div class="form-group">
										<label> Name: </label>
											<input class="form-control"  name="pg_name" type="text"  required />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label> Image: </label>
											<input class="form-control"  name="imgfile" type="file" accept="image/*" required />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label> Software Used: </label>
											<input class="form-control"  name="software" type="text"  required />
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label> Description: </label>
										<textarea name="editor" class="form-control" id="editor" > </textarea>
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
									<br/>
									<label> &nbsp; </label>
										<button type="submit" name="add_program" class="btn btn-primary">
										<i class="fa fa-save"></i> Submit </button>
									</div>
								</div>
                        </form>
                    </div>
                </div>
			</div>
			
			<?php 
		}elseif(isset($_REQUEST['cvx'])){
			$abx = dbSQL("SELECT * FROM curriculum INNER JOIN courses ON courses.code=curriculum.course order by curriculum.cid DESC ");
			if(sizeof($abx) > 0){ ?> <br/>
                <div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="page-title"> Courses Units Content </h4>
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                                <thead>
                                    <tr>
										<th> Program</th>
										<th> Course Unit </th>
										<th> Topic </th>
										<th> Attachment </th>
										<th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($abx as $prt){
									$prog = $dbh->query("SELECT pg_name FROM programs WHERE pid='".$prt->program."'")->fetchColumn();
									?>
									<tr class="odd gradeX">
										<td> <?=$prog;?> </td>
										<td> <?=$prt->cs_name;?> </td>
										<td> <?=$prt->topic;?> </td>
										<td> <a href="../../uploads/<?=$prt->attachment;?>" target="_blank"> Attachment </a> </td>
										<td>
										<a href="?cxdel=<?php echo $prt->cid;?>" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger btn-xs">
										<i class="fa fa-remove"> Delete </i></a>
										</td>
									</tr>
							<?php }?> 
                                </tbody>
                            </table>
                        </div>
                    </div>	
                </div>
			<?php }else{
					echo '<b> No course content added so far... </b>';
				}	
			}elseif(isset($_REQUEST['msg'])){
			$abx = dbSQL("SELECT * FROM contacts ");
			if(sizeof($abx) > 0){ ?> <br/>
                <div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="page-title"> Contact Messages  </h4>
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                                <thead>
                                    <tr>
										<th> Date </th>
                                        <th> Name </th>
                                        <th> Email  </th>
										<th> Subject </th>
										<th> Message </th>
										<th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($abx as $prt){
									?>
									<tr class="odd gradeX">
									    <td><?=$prt->date_time;?> </td>
										<td><?=$prt->name;?> </td>
										<td><?=$prt->email?></td>
										<td><?=$prt->subject?></td>
										<td><?=$prt->message?></td>
                                        <td>
										<a href="?smdel=<?php echo $prt->cid;?>" onclick="return confirm('Are you sure you want to delete this image?');" class="btn btn-danger btn-xs">
										<i class="fa fa-remove"> Delete </i></a>
										</td>
									</tr>
							<?php }?> 
                                </tbody>
                            </table>
                        </div>
                    </div>	
                </div>
			<?php }else{
					echo "<script>
					alert('No contact messages sent so far');
					window.location = 'dashboard';
					</script>";
				}
			}elseif(isset($_REQUEST['enrol'])){
			$abx = dbSQL("SELECT * FROM enrollments order by sid DESC");
			if(sizeof($abx) > 0){ ?> <br/>
                <div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="page-title"> Enrolled Students  </h4>
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                                <thead>
                                    <tr>
										<th> Date Added </th>
										<th> Student Name </th>
										<th> Contact </th>
                                        <th> Whatsapp </th>
                                        <th> Gender </th>
                                        <th> Nationality </th>
										<th> Course </th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($abx as $prt){
									$cos = $dbh->query("SELECT pg_name FROM programs WHERE pid='".$prt->program."'")->fetchColumn();
									?>
									<tr class="odd gradeX">
									    <td><?=$prt->date_added;?> </td>
										<td><?=$prt->firstname.' '.$prt->lastname;?> </td>
										<td><?=$prt->phone?></td>
										<td><?=$prt->whatsapp?></td>
										<td><?=$prt->gender?></td>
										<td><?=$prt->country?></td>
										<td><?=$cos;?> </td>
									</tr>
							<?php }?> 
                                </tbody>
                            </table>
                        </div>
                    </div>	
                </div>
			<?php }else{
					echo "<script>
					alert('No enroled students');
					window.location = 'dashboard';
					</script>";
				}
			}elseif(isset($_REQUEST['team'])){?>
				<br/>
				<div class="col-lg-12">
                <div class="panel panel-info" >
					<div class="panel-heading">
                        <h3 class="panel-title">
						<i class="fa fa-user"></i> 
						<b> Add Lecturer Photos </b></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="" enctype="multipart/form-data">
								<div class="col-md-4">
									<div class="form-group">
										<label> Image: </label>
											<input class="form-control"  name="imgfile" type="file" accept="image/*" required />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label > Name: </label>
											<input class="form-control" name="name" type="text"  required />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label > Position: </label>
											<input class="form-control" name="position" type="text" required />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									<br/>
									<label> &nbsp; </label>
										<button type="submit" name="add_team"  class="btn btn-primary">
										<i class="fa fa-save"></i> Submit </button>
									</div>
								</div>
                        </form>
                    </div>
                </div>
			</div>
			<?php 
			$abx = dbSQL("SELECT * FROM team ");
			if(sizeof($abx) > 0){ ?> <br/>
                <div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="page-title"> Lecturer Photos </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                                <thead>
                                    <tr>
                                        <th> Image </th>
                                        <th> Name  </th>
										<th> Position </th>
										<th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($abx as $prt){
									?>
									<tr class="odd gradeX">
										<td><?php include('cxModal.php');?> </td>
										<td><?=$prt->name?></td>
										<td><?=$prt->position?></td>
                                        <td >
										<a href="?txdel=<?php echo $prt->tid;?>" onclick="return confirm('Are you sure you want to delete this image?');" class="btn btn-danger btn-xs">
										<i class="fa fa-remove"> Delete </i></a>
										</td>
									</tr>
							<?php }?> 
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>	
                </div>
			<?php }	
			}elseif(isset($_REQUEST['videos'])){?>
				<br/>
				<div class="col-lg-12">
                <div class="panel panel-info" >
					<div class="panel-heading">
                        <h3 class="panel-title">
						<i class="fa fa-database"></i> 
						<b> Add Course Videos </b></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="">
								<div class="col-md-6">
									<div class="form-group">
										<label> Course Unit: </label>
											<select name="course" class="form-control" required>
											<option value=""> --- Select --- </option>
											<?php foreach(get_courses() as $val): 
												$prog = $dbh->query("SELECT pg_name FROM programs WHERE pid='".$val->program."' ")->fetchColumn();
											?>
												<option value="<?=$val->code;?>"> <?=$val->cs_name;?>(<?=$prog;?>) </option>
											<?php endforeach;?> 
											</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label> Title: </label>
											<input class="form-control"  name="title" type="text"  required />
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label> Vimeo URL Link: </label>
										<input type="text" name="link" class="form-control" />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									<br/>
									<label> &nbsp; </label>
										<button type="submit" name="add_video" class="btn btn-primary">
										<i class="fa fa-save"></i> Submit </button>
									</div>
								</div>
                        </form>
                    </div>
                </div>
			</div>
			<?php 
		}elseif(isset($_REQUEST['vxlist'])){
			$abx = dbSQL("SELECT * FROM videos INNER JOIN courses ON courses.code=videos.course order by videos.vid DESC ");
			if(sizeof($abx) > 0){ ?> <br/>
                <div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="page-title"> Courses Units Videos </h4>
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                                <thead>
                                    <tr>
										<th> Program</th>
										<th> Course Unit </th>
										<th> Title </th>
										<th> Video Link </th>
										<th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($abx as $prt){
									$prog = $dbh->query("SELECT pg_name FROM programs WHERE pid='".$prt->program."'")->fetchColumn();
									?>
									<tr class="odd gradeX">
										<td> <?=$prog;?> </td>
										<td> <?=$prt->cs_name;?> </td>
										<td> <?=$prt->title;?> </td>
										<td> <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="<?php echo $prt->link;?>&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" 
										frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" 
										title="<?=$prt->title;?>"></iframe></div>
										<script src="https://player.vimeo.com/api/player.js"></script>  </td>
										<td>
										<a href="?vxdel=<?php echo $prt->vid;?>" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger btn-xs">
										<i class="fa fa-remove"> Delete </i></a>
										</td>
									</tr>
							<?php }?> 
                                </tbody>
                            </table>
                        </div>
                    </div>	
                </div>
			<?php }else{
					echo '<b> No course content added so far... </b>';
				}	
			}else{?> 
			<br/>
			 <?php if($role == 'admin'){?>
			 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
								<?php $ecr = $dbh->query("SELECT COUNT(*) FROM enrollments INNER JOIN programs ON enrollments.program=programs.pid")->fetchColumn();?>
                                    <div class="huge"> <?=number_format($ecr) ?></div>
                                    <div> <?php echo($ecr == 1)?'Student':'Students';?> </div>
                                </div>
                            </div>
                        </div>
                        <a href="?enrol" title="Enrolled Students">
                            <div class="panel-footer">
                                <span class="pull-left">More</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
              </div>
			  <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-commenting fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
								<?php $cat = $dbh->query("SELECT count(*) FROM contacts ")->fetchColumn();?>
                                    <div class="huge"> <?=$cat?></div>
                                    <div> <?php echo($cat == 1)?'Message':'Messages';?> </div>
                                </div>
                            </div>
                        </div>
                        <a href="?msg" title="Messages">
                            <div class="panel-footer">
                                <span class="pull-left">More</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
              </div>
			   <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pencil fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
								<?php $ass = $dbh->query("SELECT count(*) FROM programs ")->fetchColumn();?>
                                    <div class="huge"> <?=$ass?></div>
                                    <div> <?php echo($ass == 1)?'Course':'Courses';?> </div>
                                </div>
                            </div>
                        </div>
                        <a href="?prview" title="Courses">
                            <div class="panel-footer">
                                <span class="pull-left">More</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
              </div>
			 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-camera fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
								<?php $tut = $dbh->query("SELECT count(*) FROM gallery ")->fetchColumn();?>
                                    <div class="huge"> <?=$tut?></div>
                                    <div> <?php echo($tut == 1)?'Photo':'Photos';?> </div>
                                </div>
                            </div>
                        </div>
                        <a href="?add" title="Photos">
                            <div class="panel-footer">
                                <span class="pull-left">More</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
              </div>
			 <?php } 
			} ?>
            </div>
        </div>
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
	<script src="../dist/js/toastr.min.js"></script>
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
	<!--<script src="../js/ckeditor/ckeditor.js"></script>-->
    <script>
    $(document).ready(function() {
		
        $('#dataTables-example').DataTable({
            responsive: true
        });
		
		$('#examples').DataTable({
            responsive: true
        });
		
		$('#users').DataTable({
            responsive: true
        });
		
    });
    </script>
<script>
     CKEDITOR.replace('editor' );
      $("#formid").submit( function(e) {
            var messageLength = CKEDITOR.instances['editor'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert('Please fill the description field');
                e.preventDefault();
            }
     });
    </script>
<script type="text/javascript">
        jQuery(document).ready(function($)
        {
                var opts = {
                    "closeButton": true,
                    "debug": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
				<?php if(!empty($_SESSION['success'])){?>
                toastr.success("<?php echo $_SESSION['success'];?>", "", opts);
				<?php }
				unset($_SESSION['success']);?>
        });
</script> 
</body>
</html>
