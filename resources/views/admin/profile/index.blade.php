@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil-alt"></i> 
                    <b> Add/Update ZadeCAD Academy Profile</b>
                </h3>
            </div>


            <div class="panel-body">
                <form role="form" method="post" action="{{ route('about-us.profile') }}" id="formid" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Background Statement Photo: </label>
                            <input class="form-control" name="background_statement_photo" type="file" />
                            <span class="">{{ $profile?->background_statement_photo }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Background Statement: </label>
                            <textarea name="background_statement" class="form-control" id="editor" rows="5" required>{{ $profile?->background_statement }}</textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vision Statement Photo: </label>
                            <input class="form-control" name="vision_statement_photo" type="file" />
                            <span class="">{{ $profile?->vision_statement_photo }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vision Statement: </label>
                            <textarea name="vision_statement" class="form-control" rows="5" required>{{ $profile?->vision_statement }}</textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mission Statement Photo: </label>
                            <input class="form-control" name="mission_statement_photo" type="file" />
                            <span class="">{{ $profile?->mission_statement_photo }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mission Statement: </label>
                            <textarea name="mission_statement" class="form-control" rows="5" required>{{ $profile?->mission_statement }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Objectives Photo: </label>
                            <input class="form-control" name="objectives_photo" type="file" />
                            <span class="">{{ $profile?->objectives_photo }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Objectives: </label>
                            @if ($profile && count($profile->company_objectives))
                                @foreach ($profile->company_objectives as $objective)
                                <textarea name="objectives[]" class="form-control" style="margin-top: 10px" rows="2">{{$objective->text}}</textarea>
                                @endforeach
                                <div id="objectives-parent">
                                 </div>
                                 <br/>
                            @else
                                 <div id="objectives-parent">
                                    <textarea name="objectives[]" class="form-control" style="margin-top: 10px" rows="2" required></textarea>
                                 </div>
                                 <br/>
                            @endif
                            <div class="text-right">
                                <button class="button btn-primary btn-sm" type="button" onclick="appendObjectivesInput()">
                                    <i class="fa fa-plus-circle"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="text-center">
                            <div class="form-group">
                            <br/>
                            <label> &nbsp; </label>
                            <button type="submit" name="save_profile_changes" class="btn btn-primary">
                                <i class="fa fa-save"></i> Save ZadeCAD Academy Profile Changes
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
