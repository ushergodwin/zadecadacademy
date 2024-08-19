@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Contact Messages</h1>
        <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contact_messages as $prt)
                <tr class="odd gradeX">
                    <td>{{ $prt->date_time }}</td>
                    <td>{{ $prt->name }}</td>
                    <td>{{ $prt->email }}</td>
                    <td>{{ $prt->subject }}</td>
                    <td>{{ $prt->message }}</td>
                    <td>
                        <a href="{{ route('message.delete', ['id' => $prt->id]) }}" onclick="return confirm('Are you sure you want to delete this message?');" class="btn btn-danger btn-xs">
                            <i class="fa fa-remove"></i> Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
