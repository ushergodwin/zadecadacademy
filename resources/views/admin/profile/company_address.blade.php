@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil-alt"></i> 
                    <b> Add/Update Company Address </b>
                </h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('company-address.save') }}" id="formid" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Office Name </label>
                                    <input class="form-control" name="office_name" value="{{ $companyAddress?->office_name }}" type="text" required/>
                                </div>
                                    <div class="form-group">
                                    <label>Office Address </label>
                                    <input class="form-control" name="office_address" value="{{ $companyAddress?->office_address }}" type="text" required/>
                                </div>
                                <div class="form-group">
                                    <label>Office Box Number </label>
                                    <input class="form-control" name="office_po_box" value="{{ $companyAddress?->office_po_box }}" type="text" required/>
                                </div>
                                <div class="form-group">
                                    <label>Company Email </label>
                                    <input class="form-control" name="office_email" value="{{ $companyAddress?->office_email }}" type="text" required/>
                                </div>
                                <div class="form-group">
                                    <label>Company Line 1 </label>
                                    <input class="form-control" name="office_line1" value="{{ $companyAddress?->office_line1 }}" type="text" required/>
                                </div>
                                 <div class="form-group">
                                    <label>Company Line 2</label>
                                    <input class="form-control" name="office_line2" value="{{ $companyAddress?->office_line2 }}" type="text"/>
                                </div>
                                 <div class="form-group">
                                    <label>Company Line 3 </label>
                                    <input class="form-control" name="office_line3" value="{{ $companyAddress?->office_line3 }}" type="text"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <div class="text-left">
                            <div class="form-group">
                            <br/>
                            <label> &nbsp; </label>
                            <button type="submit" name="save_profile_changes" class="btn btn-primary">
                                <i class="fa fa-save"></i> Save Company Address Changes
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
