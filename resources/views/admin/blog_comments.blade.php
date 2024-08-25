@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Comments for: {{ $blog->title }}</h4>
            </div>
            <div class="card-body">
                @if($comments->isNotEmpty())
                    <ul class="list-group">
                        @foreach($comments as $comment)
                            <li class="list-group-item">
                                <strong>{{ $comment->name }}</strong>: {{ $comment->comment }}
                                <div class="text-right">
                                    <a href="{{ route('admin.comment.delete', $comment->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this comment?');">
                                        <i class="fa fa-remove"></i> Delete
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="alert alert-info text-center">
                        <i class="fa fa-info-circle fa-2x"></i>
                        <h4>No comments to display</h4>
                        <p>This blog currently has no comments.</p>
                    </div>
                @endif
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('admin.blogs') }}" class="btn btn-secondary">Back to Blogs</a>
            </div>
        </div>
    </div>
</div>
@endsection
