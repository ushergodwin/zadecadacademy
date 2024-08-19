@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Enrolled Students</h1>
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
    </div>
</div>
@endsection
