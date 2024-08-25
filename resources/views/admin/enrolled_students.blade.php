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
                                <th># </th>
                                <th>Program</th>
                                <th>Software</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enrolled_students as $prt)
                                <tr class="odd gradeX">
                                    <td>
                                    <span> <b> Name: </b> {{ $prt->firstname }} {{ $prt->lastname }}</span><br/>
                                    <span><b>Mobile:</b> {{ $prt->phone }}</span><br/>
                                    <span><b>WhatsApp:</b> {{ $prt->whatsapp }}</span><br/>
                                    <span><b>Application Date:</b> {{ $prt->enrollment_date }}</span><br/>
                                    <span><b>Gender:</b> {{ $prt->gender }}</span><br/>
                                    <span><b>Nationality:</b> {{ $prt->country }}</span><br/>
                                </td>
                                    <td>
                                        <span> <b> Name: </b> {{ $prt->program->pg_name }}</span><br/>
                                        <span> <b> Mode of Class : </b> {{ $prt->mode_of_class }}</span><br/>
                                        <span> <b> Time for Class : </b> {{ $prt->time_for_class }}</span><br/>
                                        <span> <b> Fees : </b> ugx {{ number_format($prt->program_fees) }}</span><br/>
                                        
                                    </td>
                                    <td>
                                        @foreach ($prt->software as $item)
                                            <i class="fa fa-chevron-right"></i> {{ $item}}<br/>
                                        @endforeach
                                    </td>
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
