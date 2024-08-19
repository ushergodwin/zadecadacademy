@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Update Profile</h1>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="page-title">Update Profile</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="">
                        @csrf
                        <div class="form-group">
                            <label>First Name:</label>
                            <input class="form-control" name="first" type="text" value="{{ Session::get('first') }}" readonly />
                        </div>
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input class="form-control" name="last" type="text" value="{{ Session::get('last') }}" readonly />
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input class="form-control" name="new_email" type="text" value="{{ Session::get('email') }}" {{ Session::get('interface') == 'user' ? 'readonly' : '' }}/>
                        </div>
                        <div class="form-group">
                            <label>Old Password:</label>
                            <input class="form-control" name="oldpass" type="password" />
                        </div>
                        <div class="form-group">
                            <label>New Password:</label>
                            <input class="form-control" name="newpass" type="password" required />
                        </div>
                        <button type="submit" name="update_profile" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
