@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Why Choose Us</h1>
        <form role="form" method="post" action="{{ route('add-why-choose-us') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label>Image:</label>
                    <input class="form-control" name="imgfile" type="file" accept="image/*" required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Title:</label>
                    <input class="form-control" name="title" type="text" required />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description:</label>
                    <input type="text" name="description" class="form-control" required> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <br/>
                    <label> &nbsp; </label>
                    <button type="submit" name="add_chosen" class="btn btn-primary">
                        <i class="fa fa-save"></i> Submit 
                    </button>
                </div>
            </div>
        </form>
        <!-- Add code to display existing "Why Choose Us" items -->
        <div class="col-lg-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="page-title">Why Choose Us Photos</h4>
        </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                <thead>
                    <tr>
                        <th>Image <i>(Hover to update info)</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($why_choose_us as $prt)
                        <tr class="odd gradeX">
                            <td>@include('admin.prv_modal', ['prt' => $prt])</td>
                            <td>{{ $prt->title }}</td>
                            <td>{{ $prt->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
</div>

    </div>
</div>
@endsection
