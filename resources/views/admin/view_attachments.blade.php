@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-download fa-fw"></i> Course Outline Downloads
                </h3>
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Attachment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($outlines as $prt)
                            <tr class="odd gradeX">
                                <td>{{ $prt->cs_name }}</td>
                                <td><a href="{{ asset('uploads/' . $prt->attachment) }}">Download</a></td>
                                <td>
                                    <a href="{{ route('outline.delete', ['id' => $prt->id]) }}" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger btn-xs">
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
