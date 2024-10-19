@include('header')

<div class="container-fluid page-header py-1 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-2">
        <h3 class="text-white mb-4 animated slideInDown">ZadeCAD Academy Profile</h3>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="card-body row g-5 align-items-end">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{ asset('uploads/profile/'.$profile->background_statement_photo) }}">
                    </div>
                    <div class="col-md-6">
                        <p>{!! $profile->background_statement !!}</p>
                    </div>
                </div>
                <hr class="my-5">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid rounded" src="{{ asset('uploads/profile/'.$profile->vision_statement_photo) }}">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 mt-2 wow fadeInUp">
                            <div class="card shadow h-100">
                                <div class="card-header">
                                    <h4>Our Vision</h4>
                                </div>
                                <div class="card-body">
                                    <p>{{ $profile->vision_statement }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 wow fadeInUp">
                            <div class="card shadow h-100">
                                <div class="card-header">
                                    <h4>Our Mission</h4>
                                </div>
                                <div class="card-body">
                                    <p>{{ $profile->mission_statement }}</p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div class="row">
                        <div class="col-md-6 mt-2 fadeInUp">
                            <img class="img-fluid rounded" src="{{ asset('uploads/profile/'.$profile->objectives_photo) }}">
                        </div>
                        <div class="col-md-6 mt-2 wow fadeInUp">
                            <h4>Aims & Objectives</h4>
                            <ol>
                                @foreach ($profile->company_objectives as $item)
                                    <li>{{ $item->text }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
                
                <hr class="my-5">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                        
                 <div class="row">
                                    <!-- First Column: Account Details -->
                    <div class="col-md-4">
                                        <h5><b>Bank Account:</b></h5>
                                        <p>Account Number: <b>{{ $paymentOptions?->account_number }}</b></p>
                                        <p>Account Name: <b>{{ $paymentOptions?->account_name }}</b></p>
                                        <p>Bank Name: <b>{{ $paymentOptions?->bank_name }}</b></p>
                                        <p>Reference: <b>{{ $paymentOptions?->reference }}</b></p>
                                    </div>
                                    <!-- Second Column: Airtel Money -->
                                    <div class="col-md-4">
                                        <h5>Airtel Money</h5>
                                        @foreach ($paymentOptions->airtel_money as $item)
                                            <p>{{ $loop->index +1 }}. {{ $item }} </p>
                                        @endforeach
                                    </div>
                                    <!-- Third Column: MTN Mobile Money -->
                                    <div class="col-md-4">
                                        <h5>MTN Mobile Money</h5>
                                        @foreach ($paymentOptions->airtel_money as $item)
                                            <p>{{ $loop->index +1 }}. {{ $item }} </p>
                                        @endforeach
                                    </div>
                                </div>
                           
                       
                    </div>
                </div>
    </div>
</div>

@include('footer')
