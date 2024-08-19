@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add course outline</h1>
        <form role="form" method="post" action="" enctype="multipart/form-data">
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
@endsection
