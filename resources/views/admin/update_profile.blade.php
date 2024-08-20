@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="page-title">Update Profile</h4>
                </div>
                <div class="panel-body">
                    {{-- Display validation errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Display success message --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Display error message --}}
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form role="form" method="post" action="{{ route('admin.update_profile') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Session::get('userid') }}">
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
                            <input class="form-control" name="newpass" type="password" placeholder="Your password" required />
                        </div>
                        <button type="submit" name="update_profile" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
