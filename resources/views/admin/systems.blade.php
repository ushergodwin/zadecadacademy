@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>System Operations</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('admin.system-task', 1) }}" class="btn btn-primary btn-block">
                <i class="fa fa-database"></i> Run Migrations
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.system-task', 2) }}" class="btn btn-success btn-block">
                <i class="fa fa-leaf fa-fw"></i> Seed Database
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.system-task', 3) }}" class="btn btn-warning btn-block">
                <i class="fa fa-bolt fa-fw"></i> Clear Cache
            </a>
        </div>
        
    </div>
</div>
@endsection
