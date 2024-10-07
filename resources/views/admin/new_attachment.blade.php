@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-upload fa-fw"></i> 
                    <b> Add Download Files</b>
                </h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('admin.add_outline') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name:</label>
                            <input class="form-control" name="cs_name" type="text" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Attachment:</label>
                            <input class="form-control" name="imgfile" type="file" accept="application/pdf" required />
                        </div>
                    </div>
                    <!-- thumbnail -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Thumbnail:</label>
                            <input class="form-control" name="thumbnail" type="file" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <br/>
                            <label> &nbsp; </label>
                            <button type="submit" name="add_course" class="btn btn-primary">
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
