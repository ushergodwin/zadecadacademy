@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-file fa-fw"></i> 
                    <b>Add Software Document</b>
                </h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('admin.software_documents.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Program:</label>
                            <select class="form-control" name="program_id" id="programSelect" required>
                                <option value="">Select Program</option>
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->pg_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Software:</label>
                            <select class="form-control" name="program_software_id" id="softwareSelect" required>
                                <option value="">Select Software</option>
                                <!-- Options will be populated based on the selected program -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Document Name:</label>
                            <input class="form-control" name="document_name" type="text" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Document File:</label>
                            <input class="form-control" name="document" type="file" accept=".pdf,.doc,.docx" required />
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

    @if($programs->isNotEmpty())
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="page-title">Existing Software Documents</h4>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="examples">
                        <thead>
                            <tr>
                                <th>Program</th>
                                <th>Software Name</th>
                                <th>Document Name</th>
                                <th>Attachment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($programs as $program)
                                @if($program->soft)
                                    @foreach($program->soft as $software)
                                        @if($software->documents)
                                            @foreach($software->documents as $document)
                                                <tr class="odd gradeX">
                                                    <td>{{ $program->pg_name }}</td>
                                                    <td>{{ $software->software_name }}</td>
                                                    <td>{{ $document->document_name }}</td>
                                                    <td><a href="{{ asset('uploads/' . $document->document) }}" target="_blank">Download</a></td>
                                                    <td>
                                                        <a href="{{ route('admin.software_documents.destroy', $document->id) }}" onclick="return confirm('Are you sure you want to delete this document?');" class="btn btn-danger btn-xs">
                                                            <i class="fa fa-remove"></i> Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
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
                <h4>No Software Documents to display</h4>
                <p>There are currently no software documents available. Please add new entries to display here.</p>
            </div>
        </div>
    @endif
</div>

<script>
    document.getElementById('programSelect').addEventListener('change', function() {
        var programId = this.value;
        var softwareSelect = document.getElementById('softwareSelect');

        // Clear the existing options
        softwareSelect.innerHTML = '<option value="">Select Software</option>';

        // Fetch the related softwares via AJAX
        fetch('/get-softwares-by-program/' + programId)
            .then(response => response.json())
            .then(data => {
                data.forEach(function(software) {
                    var option = document.createElement('option');
                    option.value = software.id;
                    option.textContent = software.software_name;
                    softwareSelect.appendChild(option);
                });
            });
    });
</script>
@endsection
