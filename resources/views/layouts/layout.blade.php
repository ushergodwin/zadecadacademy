<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="images/png" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ZadeAcademy: Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{ asset('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/toastr.css') }}" rel="stylesheet">
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="{{ asset('vendor/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Angular JS for validation -->
    <script src="{{ asset('dist/js/angular.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
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
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}" style="color:#337ab7;font-weight:bolder;font-size:14px">
                    ZadeAcademy
                </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{ Session::get('first') }} {{ Session::get('last') }} ({{ Session::get('interface') == "admin" ? 'Administrator' : Session::get('interface') }}) <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ route('update-profile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('admin.logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard </a></li>
                        <li><a href="{{ route('slider-photos') }}"><i class="fa fa-camera fa-fw"></i> Slider Photos </a></li>
                        <li><a href="{{ route('gallery-photos') }}"><i class="fa fa-camera fa-fw"></i> Gallery Photos </a></li>
                        <li><a href="{{ route('why-choose-us') }}"><i class="fa fa-tasks fa-fw"></i> Why Choose Us </a></li>
                        <li>
                            <a href="#"><i class="fa fa-database fa-fw"></i> Course Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('add-course') }}"><i class="fa fa-arrow-right fa-fw"></i> Add Course </a></li>
                                <li><a href="{{ route('view-courses') }}"><i class="fa fa-arrow-right fa-fw"></i> View Courses </a></li>
                            </ul>
                        </li>

                         <li>
                            <a href="#"><i class="fa fa-laptop fa-fw"></i> Software Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('software.create') }}"><i class="fa fa-arrow-right fa-fw"></i> Add Program Software </a></li>
                                <li><a href="{{ route('software.index') }}"><i class="fa fa-arrow-right fa-fw"></i> View All </a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('admin.software_documents.index') }}"><i class="fa fa-file fa-fw" style="margin-right: 5px;"></i>Software documents</a></li>

                        <li>
                            <a href="#"><i class="fa fa-download fa-fw"></i> Course Outlines<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('new-attachment') }}"><i class="fa fa-arrow-right fa-fw"></i> New Attachment </a></li>
                                <li><a href="{{ route('view-attachments') }}"><i class="fa fa-arrow-right fa-fw"></i> View Attachments </a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('contact-messages') }}"><i class="fa fa-commenting fa-fw"></i> Contact Messages </a></li>
                        <li><a href="{{ route('enrolled-students') }}"><i class="fa fa-users fa-fw"></i> Enrolled Students </a></li>
                        <li><a href="{{ route('admin.blogs') }}"><i class="fa fa-book fa-fw" style="margin-right: 5px;"></i>Blogs</a></li>
                        <li><a href="{{ route('admin.training_calendar.index') }}"><i class="fa fa-calendar fa-fw" style="margin-right: 5px;"></i>Calendar</a></li>
                        <li><a href="{{ route('admin.partners') }}"><i class="fa fa-users fa-fw" style="margin-right: 5px;"></i>Partners</a></li>

                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('dist/js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('dist/js/toastr.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({ responsive: true });
            $('#examples').DataTable({ responsive: true });
            $('#users').DataTable({ responsive: true });
            CKEDITOR.replace('editor');
            $("#formid").submit(function(e) {
                var messageLength = CKEDITOR.instances['editor'].getData().replace(/<[^>]*>/gi, '').length;
                if (!messageLength) {
                    alert('Please fill the description field');
                    e.preventDefault();
                }
            });
        });

        jQuery(document).ready(function($) {
            var opts = {
                closeButton: true,
                debug: false,
                positionClass: "toast-top-right",
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                timeOut: "3000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut"
            };
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}", "", opts);
            @endif
        });
    </script>
</body>
</html>
