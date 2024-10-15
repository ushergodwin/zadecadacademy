@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-camera"></i> 
                    <b> Add Gallery Category </b>
                </h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('save-gallery-category') }}" enctype="multipart/form-data">
                    @csrf
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Category Name </label>
                            <input class="form-control" name="category_name" value="{{ $section_name }}" type="text" />
                        </div>
                    </div>
                    <input hidden name="is_edit_request" value="{{ $is_edit}}" />
                    <input hidden name="section_id" value="{{ $section_id}}" />
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
                @if($categories->isEmpty())
                    <div class="alert alert-info text-center">
                        <i class="fa fa-info-circle fa-2x"></i>
                        <h4>No Categories to display</h4>
                        <p>There are currently no gallery categories available. Please add new categories to display them here.</p>
                    </div>
                @else
                    <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $prt)
                                <tr class="odd gradeX">
                                    {{-- <td>@include('admin.img_modal', ['prt' => $prt])</td> --}}
                                    <td>{{ $prt->section_name }}</td>
                                    <td>
                                          <a href="/admin/gallery/categories?id={{$prt->id}}&is_edit=true" class="btn btn-success btn-xs">
                                            <i class="fa fa-pen"></i> Edit
                                        </a>
                                        <a href="{{ route('delete-gallery-category', ['category_id' => $prt->id]) }}" onclick="return confirm('Are you sure you want to delete this Category? The corresponding images will also be deleted!!');" class="btn btn-danger btn-xs">
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
