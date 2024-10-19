@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil-alt"></i> 
                    <b> Add/Update Payment Options</b>
                </h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('payment-options.save') }}" id="formid" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Bank Name </label>
                                    <input class="form-control" name="bank_name" value="{{ $paymentOptions?->bank_name }}" type="text" required/>
                                </div>
                                    <div class="form-group">
                                    <label>Account Name </label>
                                    <input class="form-control" name="account_name" value="{{ $paymentOptions?->account_name }}" type="text" required/>
                                </div>
                                <div class="form-group">
                                    <label>Account Number </label>
                                    <input class="form-control" name="account_number" value="{{ $paymentOptions?->account_number }}" type="text" required/>
                                </div>
                                <div class="form-group">
                                    <label>Reference </label>
                                    <input class="form-control" name="reference" value="{{ $paymentOptions?->reference }}" type="text" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Airtel Money Steps <b style="color: green;"><em>(sperate each step with a comma)</em> </b> </label>
                            <textarea name="airtel_money_steps" class="form-control" required>{{ $paymentOptions?->airtel_money_steps }}</textarea>
                        </div>
                    </div>
                    
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>MTN Mobile Money Steps <b style="color: green;"><em>(sperate each step with a comma) </em></b>  </label>
                            <textarea name="mtn_money_steps"  class="form-control" required>{{ $paymentOptions?->mtn_money_steps }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <div class="text-center">
                            <div class="form-group">
                            <br/>
                            <label> &nbsp; </label>
                            <button type="submit" name="save_profile_changes" class="btn btn-primary">
                                <i class="fa fa-save"></i> Save Payment Options Changes
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
