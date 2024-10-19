@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil-alt"></i> 
                    <b> Add/Update ZadeCAD Deliverables</b>
                </h3>
            </div>


            <div class="panel-body">
                <form role="form" method="post" action="{{ route('about-us.deliverables') }}" id="formid" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Deliverables Photo: </label>
                            <input class="form-control" name="deliverables_photo" type="file" />
                            <span class="">{{ $profile?->deliverables_photo }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Deliverables Statement: </label>
                            <textarea name="deliverables_content" id="editor" class="form-control" required>{{ $profile?->deliverables_content }}</textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-12 mt-2">
                        <div class="text-center">
                            <div class="form-group">
                            <br/>
                            <label> &nbsp; </label>
                            <button type="submit" name="save_profile_changes" class="btn btn-primary">
                                <i class="fa fa-save"></i> Save Deliverables Changes
                            </button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function appendObjectivesInput() {
        const objectivesParent = document.getElementById('objectives-parent');
        const textarea = document.createElement('textarea');
        textarea.classList.add('form-control');
        textarea.classList.add('mt-2');
        textarea.setAttribute('rows', 2);
        textarea.setAttribute('name', 'objectives[]');
        textarea.setAttribute('style', 'margin-top: 10px;');
        objectivesParent.append(textarea);
    }
</script>
@endsection
