@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="page-title">All Courses</h4>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Software Used</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $prt)
                        <tr class="odd gradeX">
                            <td>{{ $prt->pg_name }}</td>
                            <td>{{ $prt->description }}</td>
                            <td>@include('admin.pr_mod', ['prt' => $prt])</td>
                            <td>{{ $prt->software }}</td>
                            <td>
                                <a href="{{ route('course.delete', ['id' => $prt->id]) }}" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger btn-xs">
                                    <i class="fa fa-remove"></i> Delete
                                </a>
                            </td>
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
@endsection
