@include('header')

<div class="container-fluid page-header py-1 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-2">
        <h3 class="text-white mb-4 animated slideInDown">Our Courses</h3>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row gy-5 gx-4">
            @foreach($courses as $course)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-item h-100 shadow">
                    <div class="position-relative">
                        <a href="{{ route('course.details', ['id' => $course->id]) }}">
                            <img class="img-fluid" src="{{ asset('uploads/' . $course->pg_image) }}" style="width: 100%;height: 300px" alt="">
                        </a>
                    </div>
                    <div class="text-center p-4">
                        <h6>{{ $course->pg_name }}</h6>
                        <p>{{ Str::limit($course->description, 150) }}</p>
                        <a href="{{ route('course.details', ['id' => $course->id]) }}">Read More <i class="fa fa-angle-double-right"></i></a>
    
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('footer')
