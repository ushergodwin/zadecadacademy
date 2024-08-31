@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-calendar-plus fa-fw"></i> 
                    <b>Add Training Calendar Entry</b>
                </h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('admin.training_calendar.store') }}">
                    @csrf
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Course:</label>
                            <select name="course_id" class="form-control" required>
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->cs_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Start Date:</label>
                            <input class="form-control" name="start_date" type="date" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>End Date:</label>
                            <input class="form-control" name="end_date" type="date" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Start Time:</label>
                            <input class="form-control" name="start_time" type="time" required /> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>End Time:</label>
                            <input class="form-control" name="end_time" type="time" required /> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Location:</label>
                            <input class="form-control" name="location" type="text" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <br/>
                            <label> &nbsp; </label>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Submit 
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($calendars->isNotEmpty())
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="page-title">Existing Training Calendar Entries</h4>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Start Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>End Date</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($calendars as $calendar)
                                <tr class="odd gradeX">
                                    <td>{{ $calendar->course->cs_name }}</td>
                                    <td>{{ $calendar->start_date }}</td>
                                    <td>{{ $calendar->start_time }}</td>
                                    <td>{{ $calendar->end_time }}</td>
                                    <td>{{ $calendar->end_date }}</td>
                                    <td>{{ $calendar->location }}</td>
                                    <td>
                                        <!-- Add Edit and Delete Buttons -->
                                        <a href="{{ route('admin.training_calendar.destroy', $calendar->id) }}" onclick="return confirm('Are you sure you want to delete this entry?');" class="btn btn-danger btn-xs">
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
    @else
        <div class="col-lg-12">
            <div class="alert alert-info text-center">
                <i class="fa fa-info-circle fa-2x"></i>
                <h4>No Training Calendar Entries to display</h4>
                <p>There are currently no training sessions scheduled. Please add new entries to display here.</p>
            </div>
        </div>
    @endif
</div>
@endsection
