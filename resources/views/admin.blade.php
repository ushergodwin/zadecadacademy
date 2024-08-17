<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon" />
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ZadeAcademy Dashboard | Home</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <div class="row">
            @if(request()->has('register'))
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-primary" style="border:1px solid #337ab7">
                        <div class="panel-heading">
                            <center> <h3 class="panel-title">
                            <i class="fa fa-lock"></i> 
                            <b>ZadeAcademy - Registration</b></h3>
                            </center>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="{{ route('auth.register') }}">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <label>First Name:</label>
                                        <input class="form-control" placeholder="e.g Isaac" name="first" type="text" autofocus required />
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name:</label>
                                        <input class="form-control" placeholder="e.g Akatukunda" name="last" type="text" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input class="form-control" placeholder="Your email address" name="email" type="email" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input class="form-control" placeholder="Your password" name="password" type="password" required />
                                    </div>
                                    <button type="submit" name="register" class="btn btn-primary btn-md">
                                    <i class="fa fa-edit"></i> Register</button>
                                    <a href="{{ url('/') }}" class="btn btn-success"> <i class="fa fa-key"> </i> Login </a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            @elseif(request()->has('forgot'))
                <div class="col-md-6 col-md-offset-4">
                    <div class="login-panel panel panel-primary" style="border:1px solid #337ab7">
                        <div class="panel-heading">
                            <center> <h3 class="panel-title">
                            <i class="fa fa-lock"></i> 
                            <b>ZadeAcademy - Reset Password</b></h3>
                            </center>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="{{ route('auth.forgot') }}">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <label>Your Email:</label>
                                        <input class="form-control" placeholder="Your email address" name="email" type="email" autofocus required />
                                    </div>
                                    <button type="submit" name="forgot_pass" class="btn btn-primary btn-md">
                                    <i class="fa fa-key"></i> Next Step </button>
                                    <a href="{{ url('/') }}" class="btn btn-success"> <i class="fa fa-key"> </i> Login </a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            @elseif(request()->has('reset'))
                <div class="col-md-6 col-md-offset-4">
                    <div class="login-panel panel panel-primary" style="border:1px solid #337ab7">
                        <div class="panel-heading">
                            <center> <h3 class="panel-title">
                            <i class="fa fa-lock"></i> 
                            <b>ZadeAcademy - Reset Password</b></h3>
                            </center>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="{{ route('auth.reset') }}">
                                @csrf
                                <input type="hidden" name="email" value="{{ base64_decode(request()->get('user')) }}" />
                                <fieldset>
                                    <div class="form-group">
                                        <label>Reset Code:</label>
                                        <input class="form-control" placeholder="Your reset code sent via email" name="code" type="text" autofocus required />
                                    </div>
                                    <div class="form-group">
                                        <label>New Password:</label>
                                        <input class="form-control" placeholder="Your password" name="password" type="password" required />
                                    </div>
                                    <button type="submit" name="reset_pass" class="btn btn-primary btn-md">
                                    <i class="fa fa-key"></i> Reset Password</button>
                                    <a href="{{ url('/') }}" class="btn btn-success"> <i class="fa fa-key"> </i> Login </a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-primary" style="border:1px solid #337ab7">
                        <div class="panel-heading">
                            <center> <h3 class="panel-title">
                            <i class="fa fa-lock"></i> 
                            <b>ZadeAcademy - Login</b></h3>
                            </center>
                        </div>
                        <div class="panel-body">
                            <center> <img src="{{ asset('img/logo.jpg') }}" style="width:50%" /> </center>
                            <form role="form" method="post" action="{{ route('auth.login') }}">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input class="form-control" placeholder="Your email address" name="email" type="email" autofocus required />
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input class="form-control" placeholder="Your password" name="password" type="password" required />
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary btn-md">
                                    <i class="fa fa-key"></i> Login </button>
                                    <a href="{{ url('/') }}" class="btn btn-success"> <i class="fa fa-globe"> </i> Back to website </a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('vendor/metisMenu/metisMenu.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('dist/js/sb-admin-2.js') }}"></script>
</body>
</html>
