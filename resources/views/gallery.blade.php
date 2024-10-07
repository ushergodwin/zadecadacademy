@include('header')

<div class="container-fluid page-header py-1 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-2">
        <h2 class="text-white mb-4 animated slideInDown">Gallery</h2>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        </div>
        @if($categories->count() > 0)
            <div class="row" id="lightgallery">
                @foreach($categories as $category)
                    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                        <h4>{{ $category->section_name }}</h4>
                        <div class="carousel-inner">
                            @foreach($category->images as $index => $gk)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img class="w-100" src="{{ asset('uploads/' . $gk->image) }}" alt="Image" style="width: 100%;">
                                <div class="carousel-caption">
                                    <div class="container">
                                        <div class="row justify-content-start">
                                            <div class="col-lg-12 text-start">
                                                <h1 class="display-1 text-white mb-5 animated slideInRight w-100">{{ $gk->caption }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev no-hover" href="javascript:void(0)" data-bs-target="#header-carousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next no-hover" href="javascript:void(0)" data-bs-target="#header-carousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                    <hr class="mt-3"/>
                @endforeach
            </div>
        @endif
    </div>
</div>

@include('footer')
