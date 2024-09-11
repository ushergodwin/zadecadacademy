@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-database"></i>
                    <b> Courses </b>
                </h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Software</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->pg_name }}</td>
                            <td>{{ $course->software }}</td>
                            <td>
                                <!-- Edit Button -->
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editCourseModal{{ $course->id }}">
                                    Edit
                                </button>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="editCourseModal{{ $course->id }}" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.update_course', $course->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="pg_name">Name</label>
                                                        <input type="text" class="form-control" name="pg_name" value="{{ $course->pg_name }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="imgfile">Image</label>
                                                        <input type="file" class="form-control" name="imgfile" accept="image/*">
                                                        <!-- Show current image -->
                                                        <img src="{{ asset('uploads/' . $course->pg_image) }}" alt="{{ $course->pg_name }}" class="img-thumbnail mt-2" style="width: 100px;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="software">Software Used</label>
                                                        <input type="text" class="form-control" name="software" value="{{ $course->software }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="editor">Description</label>
                                                        <textarea name="editor" class="form-control" id="editor{{ $course->id }}">{{ $course->description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
