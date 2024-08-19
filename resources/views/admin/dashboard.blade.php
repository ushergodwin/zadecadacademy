@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
</div>


    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ number_format($enrollmentCount) }}</div>
                        <div>{{ $enrollmentCount == 1 ? 'Student' : 'Students' }}</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('enrolled-students') }}" title="Enrolled Students">
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
                        <div class="huge">{{ $contactCount }}</div>
                        <div>{{ $contactCount == 1 ? 'Message' : 'Messages' }}</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('contact-messages') }}" title="Messages">
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
                        <div class="huge">{{ $programCount }}</div>
                        <div>{{ $programCount == 1 ? 'Course' : 'Courses' }}</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('view-courses') }}" title="Courses">
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
                        <div class="huge">{{ $galleryCount }}</div>
                        <div>{{ $galleryCount == 1 ? 'Photo' : 'Photos' }}</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('gallery-photos') }}" title="Photos">
                <div class="panel-footer">
                    <span class="pull-left">More</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


@endsection
