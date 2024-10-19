@include('header')

<div class="container-fluid page-header py-1 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-2">
        <h3 class="text-white mb-4 animated slideInDown">ZadeCAD Clientele</h3>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="card-body row g-5 align-items-end">
            <div class="col-md-6">
                <img class="img-fluid rounded" src="{{ asset('uploads/clientele/'.$profile->clientele_photo) }}">
            </div>
            <div class="col-lg-6">
                {!! $profile->clientele_content !!}
            </div>
        </div>
    </div>
</div>

@include('footer')
