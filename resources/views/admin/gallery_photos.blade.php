@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-camera"></i> 
                    <b> Add Slider Photos </b>
                </h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('add-gallery-photo') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Image: </label>
                            <input class="form-control" name="imgfile" type="file" accept="image/*" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Caption: </label>
                            <input class="form-control" name="caption" type="text" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Status:</label>
                            <select name="status" class="form-control" required>
                                <option value="">--- Select ---</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <br/>
                            <label> &nbsp; </label>
                            <button type="submit" name="add_image" class="btn btn-primary">
                                <i class="fa fa-save"></i> Submit 
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add code to display existing gallery photos -->
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="page-title">Gallery Photos</h4>
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Caption</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gallery_photos as $prt)
                            <tr class="odd gradeX">
                                <td>@include('admin.img_modal', ['prt' => $prt])</td>
                                <td>{{ $prt->caption }}</td>
                                <td>
                                    <a href="{{ route('gallery.delete', ['id' => $prt->id]) }}" onclick="return confirm('Are you sure you want to delete this image?');" class="btn btn-danger btn-xs">
                                        <i class="fa fa-remove"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
