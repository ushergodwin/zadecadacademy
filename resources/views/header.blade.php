<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ZadeCAD Academy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="images/x-icon" />
    <meta content="ZadeCAD Academy" name="keywords">
    <meta content="ZadeCAD Academy" name="description">
    <link href="{{ asset('img/favicon.html') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato+Montserrat:wght@700&amp;family=Open+Sans:wght@400;500;600&amp;display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- for light gallery -->
    <link rel="stylesheet" href="{{ asset('css/lightgallery.min.css') }}">
</head>
<body style="background-color:#F3F9FD">
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                    <a class="btn btn-link text-light" href="https://chat.whatsapp.com/G1I3wmQ2TF4GwgXMRhiaC4" target="_blank"><i class="fab fa-whatsapp"></i></a>
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
        <a href="{{ url('/') }}" class="link" id="imglogo">
            <img src="{{ asset('img/logo.jpg') }}" id="logo" />
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About Us</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="{{ url('about') }}" class="dropdown-item">ZadeCAD Profile</a>
                        <a href="{{ url('clientele') }}" class="dropdown-item">Clientele</a>
                        <a href="{{ url('deliverables') }}" class="dropdown-item">Deliverables</a>
                    </div>
                </div>
                <a href="{{ url('courses') }}" class="nav-item nav-link">Courses</a>
                <a href="{{ url('downloads') }}" class="nav-item nav-link">Downloads</a>
                <a href="{{ url('gallery') }}" class="nav-item nav-link">Gallery</a>
                <a href="{{ url('contact') }}" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
<!-- Navbar End -->
