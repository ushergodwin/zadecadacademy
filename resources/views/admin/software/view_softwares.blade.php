@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="page-title">Program Softwares</h4>
            </div>
            <div class="panel-body">
                @if($programs->isNotEmpty())
                    <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Program/Course</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($programs as $program)
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="#" class="btn-xs toggle-program" data-target="#program-{{ $program->id }}" style="border-radius: 50%;">
                                            <i class="fa fa-chevron-down"></i>
                                        </a>
                                    </td>
                                    <td>
                                        {{ $program->pg_name }}
                                        <section id="program-{{ $program->id }}" style="display: none;">
                                            <hr/>
                                            @if ($program->soft->count())
                                                <div class="grid-table">
                                                    <div class="grid-header">Name</div>
                                                    <div class="grid-header">No of Sessions</div>
                                                    <div class="grid-header">Fee (uxg)</div>

                                                    @foreach ($program->soft as $soft)
                                                        <div class="grid-row">{{ $soft->software_name }}</div>
                                                        <div class="grid-row">{{ $soft->no_of_sessions }}</div>
                                                        <div class="grid-row">{{ number_format($soft->fee, 2) }}</div>
                                                    @endforeach
                                                </div>

                                            @else
                                                <div class="alert alert-info text-center">
                                                    <i class="fa fa-info-circle fa-2x"></i>
                                                    <h4>No softwares added to this program/course yet!</h4>
                                                </div>
                                            @endif
                                        </section>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info text-center">
                        <i class="fa fa-info-circle fa-2x"></i>
                        <h4>No Program Softwares to display</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.toggle-program').on('click', function() {
            var target = $(this).data('target');
            $(target).toggle();
            $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
        });
    });
</script>
@endsection
