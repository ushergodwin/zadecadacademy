<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ZadeCAD Academy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon" />
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

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

    <!-- Custom Styles (optional) -->
    <style>
        .fc-event {
            background-color: #ff7900; /* Custom background color for events */
            border: none;
        }
    </style>
</head>
<body class="main-body">
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
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
                <a href="{{ url('/') }}" class="nav-item nav-link {{ isActivePage('home')}}">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ isActivePage('about')}}" data-bs-toggle="dropdown">About Us</a>
                    <div class="dropdown-menu bg-light text-dark m-0">
                        <a href="{{ url('about') }}" class="dropdown-item">ZadeCAD Profile</a>
                        <a href="{{ url('clientele') }}" class="dropdown-item">Clientele</a>
                        <a href="{{ url('deliverables') }}" class="dropdown-item">Deliverables</a>
                    </div>
                </div>
                <a href="{{ url('courses') }}" class="nav-item nav-link {{ isActivePage('courses')}}">Courses</a>
                <a href="{{ url('downloads') }}" class="nav-item nav-link {{ isActivePage('downloads')}}">Downloads</a>
                <a href="{{ url('gallery') }}" class="nav-item nav-link {{ isActivePage('gallery')}}">Gallery</a>
                <a href="{{ url('contact') }}" class="nav-item nav-link {{ isActivePage('contact')}}">Contact</a>
                <a href="{{ route('blogs-list') }}" class="nav-item nav-link {{ isActivePage('blogs')}}">Blogs</a>
                <a href="{{ route('view-training-calendar') }}" class="nav-item nav-link {{ isActivePage('training_calendar')}}">Calendar</a>
            </div>
        </div>
    </nav>
<!-- Navbar End -->

