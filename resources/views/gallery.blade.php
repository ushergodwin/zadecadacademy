@include('header')

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h2 class="text-white mb-4 animated slideInDown">Gallery</h2>
    </div>
</div>
<div class="container-xxl py-5" style="background-color: #fff;">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        </div>
        @if($images->count() > 0)
            <div class="row" id="lightgallery">
                @foreach($images as $image)
                    <div class="col-md-4 col-sm-4" data-aos="fade" data-src="{{ asset('uploads/' . $image->image) }}" data-sub-html="<h2>{{ $image->caption }}</h2>">
                        <a href="#"><img src="{{ asset('uploads/' . $image->image) }}" alt="{{ $image->caption }}" class="img-fluid" style="margin-bottom: 10px;"></a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@include('footer')
