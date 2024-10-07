@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-camera"></i> 
                    <b> Add Gallery Photos </b>
                </h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('add-gallery-photo') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> Image: </label>
                            <input class="form-control" name="imgfile" type="file" accept="image/*" required />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> Caption: </label>
                            <input class="form-control" name="caption" type="text" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input name="status" value="yes" hidden/>
                        <div class="form-group">
                            <label>Category:</label>
                            <select name="category" class="form-control" required>
                                @if ($sections->count())
                                    @foreach ($sections as $item)
                                        <option value="{{ $item->id }}">{{ $item->section_name }}</option>
                                    @endforeach
                                @else
                                    <option value="0">--- Select Category ---</option>
                                @endif
                            </select>
                        </div>
                    </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Type New Category If Not Exits</label>
                            <input class="form-control" name="new_category" type="text" />
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

    <!-- Display gallery photos or a message if none are available -->
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="page-title">Gallery Photos</h4>
            </div>
            <div class="panel-body">
                @if($gallery_photos->isEmpty())
                    <div class="alert alert-info text-center">
                        <i class="fa fa-info-circle fa-2x"></i>
                        <h4>No images to display</h4>
                        <p>There are currently no gallery images available. Please add new images to display them here.</p>
                    </div>
                @else
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
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
