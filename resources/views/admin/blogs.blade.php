@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil-alt"></i> 
                    <b> Add New Blog </b>
                </h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('admin.blogs.store') }}" id="formid" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Image: </label>
                            <input class="form-control" name="image" type="file" accept="image/*" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Title: </label>
                            <input class="form-control" name="title" type="text" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> Content: </label>
                            <textarea name="content" class="form-control" rows="5" required></textarea>
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

    @if($blogs->isNotEmpty())
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="page-title">Existing Blogs</h4>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                        <thead>
                            <tr>
                                <th>Image <i>(Click to update info)</i></th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                                <tr class="odd gradeX">
                                    <td>@include('admin.blogs_prv_modal', ['blog' => $blog])</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ Str::limit($blog->content, 100) }}</td>
                                    <td>
                                        <a href="{{ route('admin.blogs.destroy', ['id' => $blog->id]) }}" onclick="return confirm('Are you sure you want to delete this message?');" class="btn btn-danger btn-xs">
                                            <i class="fa fa-remove"></i> Delete
                                        </a>
    
                                        <a href="{{ route('admin.blogs.comments', $blog->id) }}" class="btn btn-info btn-xs">
                                            <i class="fa fa-comments"></i> Comments
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="col-lg-12">
            <div class="alert alert-info text-center">
                <i class="fa fa-info-circle fa-2x"></i>
                <h4>No Blogs to display</h4>
                <p>There are currently no blogs available. Please add new blogs to display here.</p>
            </div>
        </div>
    @endif
</div>
@endsection
