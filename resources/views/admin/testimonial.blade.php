@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil-alt"></i> 
                    <b> Add New Testimonial </b>
                </h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('testimonial.store') }}" id="formid" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Video Testimony: </label>
                            <input class="form-control" name="video" type="file"  required />
                            <span class="">{{ $testimonial->video_link }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Caption Header: </label>
                            <input class="form-control" name="video_caption" value="{{ $testimonial?->video_caption}}" type="text" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>What Our Students Say: </label>
                            <textarea name="content" class="form-control" rows="5" required>{{ $testimonial?->content }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <br/>
                            <label> &nbsp; </label>
                            <button type="submit" name="add_blog" class="btn btn-primary">
                                <i class="fa fa-save"></i> Submit 
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
