@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-database"></i>
                    <b> Add Program Software </b>
                </h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('software.store') }}" id="formid" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Program / Course :</label>
                            <select class="form-control" name="program_id" required>
                                <option value="">--- select -- </option>
                                @foreach ($programs as $item)
                                    <option value="{{ $item->id}}"> {{ $item->pg_name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Software Name :</label>
                            <input class="form-control" name="software_name" type="text" required />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>No of sessions:</label>
                            <select class="form-control" name="no_of_sessions" required>
                                <option value="">--- select -- </option>
                                @for($i= 1; $i < 201; $i++)
                                    <option value="{{ $i}}"> {{ $i}} </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Fee (UGX):</label>
                            <input type="number" class="form-control" name="fee" min="100000"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <br/>
                            <label> &nbsp; </label>
                            <button type="submit" name="add_program" class="btn btn-primary">
                                <i class="fa fa-save"></i> Save Program Software
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
