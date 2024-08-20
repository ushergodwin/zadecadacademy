@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="page-title">Contact Messages</h4>
            </div>
            <div class="panel-body">
                @if($contact_messages->isNotEmpty())
                    <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contact_messages as $prt)
                                <tr class="odd gradeX">
                                    <td>
                                        <button class="btn btn-success btn-xs toggle-message" data-target="#message-{{ $prt->id }}" style="border-radius: 50%;">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </td>
                                    <td>{{ $prt->date_time }}</td>
                                    <td>{{ $prt->name }}</td>
                                    <td>{{ $prt->email }}</td>
                                    <td>{{ $prt->subject }}</td>
                                </tr>
                                <tr id="message-{{ $prt->id }}" class="message-row" style="display: none;">
                                    <td colspan="6">
                                        <strong>Message:</strong> {{ $prt->message }} <br>
                                        <div style="margin-top: 10px;">
                                            <strong>Action:</strong>
                                            <a href="{{ route('message.delete', ['id' => $prt->id]) }}" onclick="return confirm('Are you sure you want to delete this message?');" class="btn btn-danger btn-xs">
                                                <i class="fa fa-remove"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info text-center">
                        <i class="fa fa-info-circle fa-2x"></i>
                        <h4>No Contact Messages to Display</h4>
                        <p>There are currently no contact messages available. Messages will appear here when they are submitted.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.toggle-message').on('click', function() {
            var target = $(this).data('target');
            $(target).toggle();
            $(this).find('i').toggleClass('fa-plus fa-minus');
        });
    });
</script>
@endsection
