@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-handshake-o fa-fw"></i> 
                    <b>Add Partner</b>
                </h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('admin.partners.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name:</label>
                            <input class="form-control" name="name" type="text" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Logo:</label>
                            <input class="form-control" name="logo" type="file" accept="image/*" required />
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

    @if($partners->isNotEmpty())
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="page-title">Existing Partners</h4>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partners as $partner)
                                <tr class="odd gradeX">
                                    <td>{{ $partner->name }}</td>
                                    <td><img src="{{ asset('uploads/' . $partner->logo) }}" alt="{{ $partner->name }}" style="width: 100px; height: auto;"></td>
                                    <td>
                                        <a href="{{ route('admin.partners.delete', $partner->id) }}" onclick="return confirm('Are you sure you want to delete this partner?');" class="btn btn-danger btn-xs">
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
                <h4>No Partners to display</h4>
                <p>There are currently no partners available. Please add new entries to display here.</p>
            </div>
        </div>
    @endif
</div>
@endsection
