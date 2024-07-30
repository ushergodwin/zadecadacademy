<?php require_once('root/config.php');
if(isset($_POST['submit'])){
    trim(extract($_POST));
    $sql = $dbh->query("INSERT INTO contacts VALUES('','$name','$email','$subject','$message','$strtime')");
    if($sql){
        echo "<script>
        alert('Your message has been successfully sent.');
        window.location = '".SITE_URL."';
        </script>";
    }
}elseif(isset($_POST['register'])){
    trim(extract($_POST));
    $ck_email = $dbh->query("SELECT email FROM site_users WHERE email='$email' ")->fetchColumn();
    $ck_username = $dbh->query("SELECT username FROM site_users WHERE username='$username' ")->fetchColumn();
    if($password == $repeat_password){

        if($ck_email){
            echo "<script>
            alert('Email already exists in the system.. Choose a different one!');
            window.location = '".SITE_URL."';
            </script>";
        }elseif($ck_username){
            echo "<script>
            alert('Username already exists in the system.. Choose a different one!');
            window.location = '".SITE_URL."';
            </script>";
        }elseif($ck_username && $ck_email){
            echo "<script>
            alert('Username and email already registered in the system..');
            window.location = '".SITE_URL."';
            </script>";
        }else{
            $pass = sha1($password);
            $code = rand(111111,999999);
            $sql = $dbh->query("INSERT INTO site_users VALUES('','$username','$email','$pass','$code',1,'$phone',
                '$names','$gender')");
            if($sql){
                echo "<script>
                alert('You have successfully registered with ZadeCAD Academy.');
                window.location = '".SITE_URL."';
                </script>";
            }
        }
    }else{
        echo "<script>
        alert('Passwords do not match');
        window.location = '".SITE_URL."';
        </script>";
    }
}elseif(isset($_POST['login'])){
    trim(extract($_POST));
    $sql = $dbh->query("SELECT * FROM site_users WHERE (email='$email' OR username='$email') AND password='".sha1($password)."' ");
    $check = $sql->fetch(PDO::FETCH_OBJ); 
    if($check){
            $_SESSION['email'] = $check->email;
            $_SESSION['username'] = $check->username;
            $_SESSION['userid'] = $check->id;
            redirect_page(SITE_URL);
    }else{
        echo "<script>
        alert('Username or email and password is incorrect');
        window.location = '".SITE_URL."';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <title>ZadeCAD Academy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href="img/favicon.png" type="images/x-icon" />
    <meta content="ZadeCAD Academy" name="keywords">
    <meta content="ZadeCAD Academy" name="description">
    <link href="img/favicon.html" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato+Montserrat:wght@700&amp;family=Open+Sans:wght@400;500;600&amp;display=swap"
        rel="stylesheet" />
    <link href="cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="cdn.jsdelivr.net/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

	<!-- for light gallery -->
	<link rel="stylesheet" href="css/lightgallery.min.css">    
</head>
<body style="background-color:#F3F9FD">
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <div class="container-fluid bg-dark px-0">
        <div class="row g-0 d-none d-lg-flex">
            <div class="col-lg-6 ps-5 text-start">
                <div class="h-100 d-inline-flex align-items-center text-light">
                    <span></span>
                    <a class="btn btn-link text-light" href="https://www.facebook.com/ZadeCADAcademy" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" href="https://www.twitter.com/ZadeCAD" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" href="https://www.linkedin.com/in/zadecad-academy-81292322a/"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-link text-light" href="https://www.instagram.com/ZadeCAD" target="_blank"><i class="fab fa-instagram"></i></a>
                     <a class="btn btn-link text-light" href="https://www.youtube.com/channel/UCEi1ik2oIXsxqIBgW-eVO_w" target="_blank"><i class="fab fa-youtube"></i></a>
                      <a class="btn btn-link text-light" href="https://chat.whatsapp.com/G1I3wmQ2TF4GwgXMRhiaC4" target="_blank" ><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-lg-6 text-end">
                <div class="h-100 bg-secondary d-inline-flex align-items-center text-dark py-2 px-4">
                    <span class="me-2 fw-semi-bold"><i class="fa fa-phone-alt me-2"></i>Call:</span>
                    <span>+256-705-233-210 / +256-785-941-415</span>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
       <a href="<?=SITE_URL;?>" class="link" id="imglogo">
            <img src="img/logo.jpg" id="logo" />
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?=SITE_URL;?>" class="nav-item nav-link active">Home</a>
				<div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About Us</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="about" class="dropdown-item">ZadeCAD Profile</a>
                        <a href="clientele" class="dropdown-item">Clientele</a>
                        <a href="deliverables" class="dropdown-item">Deliverables</a>
                    </div>
                </div>
                <a href="courses" class="nav-item nav-link">Courses</a>
                <a href="downloads" class="nav-item nav-link"> Downloads </a>
                <!-- <a href="payments" class="nav-item nav-link">Payments</a> -->
                <a href="gallery" class="nav-item nav-link">Gallery</a>
                <a href="contact" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
<!-- Navbar End -->
