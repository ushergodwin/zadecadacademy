@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil-alt"></i> 
                    <b> Add/Update ZadeCAD Clientele</b>
                </h3>
            </div>


            <div class="panel-body">
                <form role="form" method="post" action="{{ route('about-us.clientele') }}" id="formid" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Clientele Photo: </label>
                            <input class="form-control" name="clientele_photo" type="file" />
                            <span class="">{{ $profile?->clientele_photo }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Clientele Statement: </label>
                            <textarea name="clientele_content" id="editor" class="form-control" required>{{ $profile?->clientele_content }}</textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-12 mt-2">
                        <div class="text-center">
                            <div class="form-group">
                            <br/>
                            <label> &nbsp; </label>
                            <button type="submit" name="save_profile_changes" class="btn btn-primary">
                                <i class="fa fa-save"></i> Save Clientele Changes
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
