<?php
require_once("includes/config.php");
//echo md5('admin@zadecadacademy.com');

if(isset($_POST['login'])){ 
$uname = $_POST['email']; // captures the user input email
$pass = md5($_POST['password']); // encrypts input password of the user with md5 function
if($uname && $pass){ // checks if the email and password was input
	$sql = $dbh->query("SELECT * FROM users WHERE email='$uname' AND password='$pass'");//queries from the table users for login details
	$check = $sql->fetch(PDO::FETCH_OBJ); // fetch every row in table users 
	if($check){ // if the email and password is found in table users
		
			$name = $check->email; // email that is stored in the table users
			$pwd = $check->password; // password that is stored in the table users
			$type = $check->role; // user type that is stored in the table users
			$_SESSION['pwd'] = $check->password;
			$_SESSION['interface'] = $check->role;
			$_SESSION['email'] = $check->email;
			$_SESSION['first'] = $check->firstName;
			$_SESSION['last'] = $check->lastName;
			$_SESSION['userid'] = $check->user_id;
			if($name == $uname && $pass == $pwd){
			 echo "<script>
				var x= confirm('Welcome $_SESSION[first] (Administrator) ,Click ok to continue !!');
				if(x){
					window.location='pages/dashboard';
				}else{
					window.location= '".SITE_URL."';
				}
				</script>";	
			}else{
				echo "<script>
				alert('Username or password is incorrect.  Try again later');
				window.location = '".SITE_URL."';
				</script>";	
			}
	}else{
				echo "<script>
				alert('Username or password is incorrect. Try again');
				window.location = '".SITE_URL."';
				</script>";	
	}
}	
}elseif(isset($_POST['forgot_pass'])){
	trim(extract($_POST));
	$chk = $dbh->query("SELECT email from users WHERE email='$email' ")->fetchColumn();
	if($chk){
		$code = rand(10000,99999);
		$dbh->query("UPDATE users set reset_code='$code' WHERE email='$email' ");
		$subject = "Password Reset";
		$message = "You requested password reset for your account (Email: $email). If you really want to reset your password, 
		Here is the Reset Code : <b> $code </b> . If you are not interested in password resetting, please ignore this email and do not share the code with others. Thank you..";
		SendMail($email,$subject,$message);// call the mail function 
		redirect_page('?reset&user='.base64_encode($email));
	}else{
		echo "<script>
		alert('Email address does not match with any account...');
		window.location = '".SITE_URL."?forgot';
		</script>";
	}
}elseif(isset($_POST['reset_pass'])){
	trim(extract($_POST));
	$rows = dbRow("SELECT * FROM users WHERE email='$email' LIMIT 1");
	if($rows->reset_code == $code && $rows->email == $email){
		$sql = $dbh->query("UPDATE users set password='".md5($password)."' WHERE email='$email'");
		if($sql){
			echo "<script>
			alert('Your password was reset successfully.. You can now login.');
			window.location = '".SITE_URL."';
			</script>";
		}else{
			echo "<script>
			alert('Password reset failed. Try again');
			window.location = '".SITE_URL."?forgot';
			</script>";
		}
	}else{
		echo "<script>
			alert('Your password reset code is incorrect.');
			window.location = '".SITE_URL."?forgot';
			</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="shortcut icon" href="../img/favicon.png" type="images/icon" />
    <meta name="description" content="">
    <meta name="author" content="">
    <title> ZadeAcademy Dashboard | Home </title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <div class="row">
			<?php if(isset($_REQUEST['register'])){?>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary" style="border:1px solid #337ab7">
                    
					<div class="panel-heading">
                        <center> <h3 class="panel-title">
						<i class="fa fa-lock"></i> 
						<b> ZadeAcademy - Registration </b></h3>
						</center>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="">
                            <fieldset>
								<div class="form-group">
									<label> First Name: </label>
										<input class="form-control" placeholder="e.g Isaac" name="first" type="text" autofocus required />
								</div>
								<div class="form-group">
									<label > Last Name: </label>
										<input class="form-control" placeholder="e.g Akatukunda" name="last" type="text" required />
								</div>
                                <div class="form-group">
								<label > Email: </label>
                                    <input class="form-control" placeholder="Your email address" name="email" type="email" required  />
                                </div>
                                <div class="form-group">
								<label > Password: </label>
                                    <input class="form-control" placeholder="Your password" name="password" type="password" value="" required />
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="register" value="Login" class="btn btn-primary btn-md">
								<i class="fa fa-edit"></i> Regsiter </button>
								<a href="<?php echo SITE_URL;?>" class="btn btn-success"> <i class="fa fa-key"> </i> Login </a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
			<?php }elseif(isset($_REQUEST['forgot'])){?>
				<div class="col-md-6 col-md-offset-4">
                <div class="login-panel panel panel-primary" style="border:1px solid #337ab7">
                    <div class="panel-heading">
                        <center> <h3 class="panel-title">
						<i class="fa fa-lock"></i> 
						<b> ZadeAcademy - Reset Password </b></h3>
						</center>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="">
                            <fieldset>
                                <div class="form-group">
								<label > Your Email: </label>
                                    <input class="form-control" placeholder="Your email address" name="email" type="email" autofocus required />
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="forgot_pass" value="Reset" class="btn btn-primary btn-md">
								<i class="fa fa-key"></i> Next Step </button>
								<a href="<?php echo SITE_URL;?>" class="btn btn-success"> <i class="fa fa-key"> </i> Login </a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
				
			<?php }elseif(isset($_REQUEST['reset'])){?>
				<div class="col-md-6 col-md-offset-4">
                <div class="login-panel panel panel-primary" style="border:1px solid #337ab7">
                    <div class="panel-heading">
                        <center> <h3 class="panel-title">
						<i class="fa fa-lock"></i> 
						<b> ZadeAcademy  - Reset Password </b></h3>
						</center>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="">
						<input type="hidden" name="email" value="<?php echo base64_decode($_REQUEST['user']);?>" />
                            <fieldset>
                                <div class="form-group">
								<label > Reset Code: </label>
                                    <input class="form-control" placeholder="Your reset code sent via email" name="code" type="text" autofocus required />
                                </div>
								  <div class="form-group">
								<label > New Password: </label>
                                    <input class="form-control" placeholder="Your password" name="password" type="password" value="" required />
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="reset_pass" value="Reset" class="btn btn-primary btn-md">
								<i class="fa fa-key"></i> Reset Password</button>
								<a href="<?php echo SITE_URL;?>" class="btn btn-success"> <i class="fa fa-key"> </i> Login </a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
				
			<?php }else{?>
				<div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary" style="border:1px solid #337ab7">
                    <div class="panel-heading">
                        <center> <h3 class="panel-title">
						<i class="fa fa-lock"></i> 
						<b> ZadeAcademy - Login </b></h3>
						</center>
                    </div>
                    <div class="panel-body">
						<center> <img src="../img/logo.jpg" style="width:50%" /> </center>
                        <form role="form" method="post" action="">
                            <fieldset>
                                <div class="form-group">
								<label > Email: </label>
                                    <input class="form-control" placeholder="Your email address" name="email" type="email" autofocus required />
                                </div>
                                <div class="form-group">
								<label > Password: </label>
                                    <input class="form-control" placeholder="Your password" name="password" type="password" value="" required />
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="login" value="Login" class="btn btn-primary btn-md">
								<i class="fa fa-key"></i> Login </button>
								<a href="<?=$login_url;?>" class="btn btn-success"> <i class="fa fa-globe"> </i> Back to website </a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
			<?php }?>
        </div>
    </div>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
</body>
</html>
