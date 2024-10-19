@include('header')

<style>
    .partner-logo img {
        max-height: 80px; 
        object-fit: contain; 
        width: 100%; 
    }

    .partner-logo {
        padding: 20px; 
        background-color: #f8f9fa; 
        border-radius: 50%; 
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        display: flex; 
        justify-content: center; 
        align-items: center; 
    }

    .row.gy-5.gx-4 {
        row-gap: 30px; 
        column-gap: 30px; 
    }

    .video-section {
        display: flex;
        align-items: center; 
        margin-top: -30px; 
    }

    .video-section video {
        border-radius: 10px;
    }

    .recent-articles-heading {
        font-size: 1.75rem; 
        font-weight: bold;  
        color: #fff;     
        text-align: center; 
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
        text-transform: uppercase; 
        padding-bottom: 10px;
    }

    .recent-articles-heading::after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        width: 60px;
        height: 4px;
        background-color: #fff;
        border-radius: 2px;        
    }
</style>

<!-- Carousel Header Section -->
<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($gallery as $index => $gk)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img class="w-100" src="{{ asset('uploads/' . $gk->image) }}" alt="Image" style="width: 100%;">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-12 text-start">
                                <p class="fs-4 text-white">WELCOME TO ZADECAD ACADEMY</p>
                                <p class="fs-4 text-white"> Leading CADD Training company in Uganda </p>
                                <h1 class="display-1 text-white mb-5 animated slideInRight w-100">Engineering, Architecture & Surveying</h1>
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
</div>

<!-- Two-column layout (Main content and sidebar) starts here -->
<div class="container">
    <div class="row">
        <!-- Main content (2/3 of the width) -->
        <div class="col-md-9">
            <div class="row">
                <div class="col-lg-6">
                    <!-- About Section -->
                    <img class="img-fluid rounded" src="{{ asset('img/abt3.jpg') }}">
                    <h2 class="mt-3">About ZadeCAD Academy</h2>
                      <blockquote>
                            ZadeCAD Limited is registered as a limited liability company with shares. It was established in 2020 to impart quality in-
                        </blockquote>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <blockquote>
                            dustry-specific Computer-Aided Design (CAD) skills training. Since its inception, ZadeCAD Ltd through its initiative ZadeCAD Academy, continues to expand and focus on providing critical professional and technical skills training in engineering and project management.
                        </blockquote>
                        <blockquote>
                            To date, we have trained over 300+ professionals from different backgrounds. Our trained students are now employed in key positions in large and small companies both locally and internationally.
                        </blockquote>
                    </p>
                </div>
            </div>

            <!-- Why Choose Us Section -->
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h3>Why Choose Us?</h3>
            </div>
            <div class="row">
                @foreach($chzn as $val)
                <div class="col-md-4 wow fadeInUp mt-3" data-wow-delay="0.1s">
                    <div class="product-item card h-100">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset('uploads/' . $val->image) }}" style="width: 100%; height: 100px; object-fit: cover;" alt="">
                        </div>
                        <div class="text-center p-4"> 
                            <h6>{{ $val->title }}</h6>
                            <p>{{ Str::limit($val->description, 150) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
                <!-- Sidebar (Recent Articles) -->
        <div class="col-md-3">
            <div class="text-center mx-auto pb-4 wow fadeInUp mt-3" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4>Recent Articles</h4>
                @if($blogs->isNotEmpty())
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-lg-12 mb-4">
                            <div class="shadow-sm rounded bg-orange">
                                <div class="row g-0 flex-grow-1">
                                    <div class="col-md-6">
                                        <a href="{{ route('blog.show', $blog->id) }}" class="stretched-link">
                                            <img src="{{ asset('uploads/' . $blog->image) }}" class="img-fluid rounded-start" alt="{{ $blog->title }}">
                                        </a>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column">
                                        <div class="card-body flex-grow-1">
                                            <a href="{{ route('blog.show', $blog->id) }}" style="font-size: 14px">{{ $blog->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-info">No blogs articles yet!</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Courses Section -->
            <div class="text-center mx-auto pb-4 wow fadeInUp mt-3" data-wow-delay="0.1s" style="max-width: 500px;">
                <h3>Our Courses</h3>
            </div>
            <div class="row">
                @foreach($courses as $row)
                <div class="col-md-4 wow fadeInUp mt-2" data-wow-delay="0.1s">
                    <div class="product-item card h-100">
                        <div class="position-relative" style="flex-grow: 1;">
                            <a href="{{ route('course.details', ['id' => $row->id]) }}">
                                <img class="img-fluid" src="{{ asset('uploads/' . $row->pg_image) }}" style="width: 100%; height: 300px; object-fit: cover;" alt="">
                            </a>
                        </div>
                        <div class="text-center p-4" style="padding: 20px; border-bottom: 2px solid #ddd;">
                            <h6>{{ $row->pg_name }}</h6>
                            <p>{{ Str::limit($row->description, 150) }}</p>
                            <a href="{{ route('course.details', ['id' => $row->id]) }}">
                                Read More <i class="fa fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center mt-4">
                    <button onclick="window.location.href='{{ route('courses.index') }}'" class="btn btn-secondary btn-sm" style="background-color:#ff7900;color:#fff">
                        <i class="fa fa-book"></i> VIEW ALL COURSES
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Full-width content from here (no sidebar) -->
<div class="container">
    <!-- Testimonial Video Section -->
    <div class="text-center mx-auto pb-4 wow fadeInUp mt-3" data-wow-delay="0.1s" style="max-width: 600px;">
        <h3>What Our Students Say</h3>
        <p>Hear from our students about their experiences at ZadeCAD Academy.</p>
    </div>

    <div class="row g-5 align-items-center video-section">
        <!-- Text Section -->
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <h4>{{ $testimonial?->video_caption }}</h4>
            <p>{{ $testimonial->content }}</p>
        </div>
        <!-- Video Section -->
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="position-relative h-100">
                <video id="testimonial-video" width="100%" height="400" controls muted>
                    <source src="{{ asset('uploads/'.$testimonial->video_link) }}" class="rounded" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>

    <!-- Partners Section -->
    <div class="text-center mx-auto pb-4 wow fadeInUp mt-3" data-wow-delay="0.1s" style="max-width: 500px;">
        <h3>Our Partners</h3>
        <p>We are proud to collaborate with these esteemed organizations.</p>
    </div>
    <div class="row gy-5 gx-4 d-flex justify-content-center">
        @foreach($partners as $partner)
        <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="text-center">
                <img src="{{ asset('uploads/' . $partner->logo) }}" class="img-fluid rounded" alt="{{ $partner->name }}">
            </div>
        </div>
        @endforeach
    </div>
</div>

@include('footer')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5 // 0.5 means the video starts playing when 50% of it is in view
        };

        let observer = new IntersectionObserver(function (entries, observer) {
            entries.forEach(entry => {
                let video = entry.target;
                if (entry.isIntersecting) {
                    video.play();
                } else {
                    video.pause();
                }
            });
        }, options);

        let video = document.getElementById('testimonial-video');
        observer.observe(video);
    });
</script>
