@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="page-title">Enrolled Students</h4>
            </div>
            <div class="panel-body">
                @if($enrolled_students->isEmpty())
                    <div class="alert alert-info text-center">
                        <i class="fa fa-info-circle fa-2x"></i>
                        <h4>No enrolled students to display</h4>
                        <p>There are currently no enrolled students available. Please check back later or enroll new students.</p>
                    </div>
                @else
                    <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                        <thead>
                            <tr>
                                <th>Date Added</th>
                                <th>Student Name</th>
                                <th>Contact</th>
                                <th>Whatsapp</th>
                                <th>Gender</th>
                                <th>Nationality</th>
                                <th>Course</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enrolled_students as $prt)
                                <tr class="odd gradeX">
                                    <td>{{ $prt->enrollment_date }}</td>
                                    <td>{{ $prt->firstname }} {{ $prt->lastname }}</td>
                                    <td>{{ $prt->phone }}</td>
                                    <td>{{ $prt->whatsapp }}</td>
                                    <td>{{ $prt->gender }}</td>
                                    <td>{{ $prt->country }}</td>
                                    <td>{{ $prt->program->pg_name }}</td>
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
