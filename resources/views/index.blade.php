@include('header')

<style>
.partner-logo img {
    max-height: 80px; /* Ensures all logos have the same maximum height */
    object-fit: contain; /* Makes sure the logos maintain their aspect ratio */
    width: 100%; /* Makes sure the logos take the full width of their container */
}

.partner-logo {
    padding: 20px; /* Adds padding around each logo */
    background-color: #f8f9fa; /* Background color for the logo */
    border-radius: 50%; /* Makes the background circular */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Adds a subtle shadow */
    display: flex; /* Centers the image within the circle */
    justify-content: center; /* Centers the image within the circle */
    align-items: center; /* Centers the image within the circle */
}

.row.gy-5.gx-4 {
    row-gap: 30px; /* Adds space between rows */
    column-gap: 30px; /* Adds space between columns */
}
</style>


<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($gallery as $index => $gk)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img class="w-100" src="{{ asset('uploads/' . $gk->image) }}" alt="Image" style="width: 100%;">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8 text-start">
                                <p class="fs-4 text-white">WELCOME TO ZADECAD ACADEMY</p>
                                <p class="fs-4 text-white"> Leading CADD Training company in Uganda </p>
                                <h1 class="display-1 text-white mb-5 animated slideInRight">Engineering, Architecture & Surveying</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- About Section -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-end">
            <div class="col-lg-6">
                <div class="row g-2">
                    <div class="col-6 position-relative wow fadeIn" data-wow-delay="0.7s">
                        <div class="about-experience bg-secondary rounded">
                            <span style="float:left;color:#fff"><b>#5 Star CADD Solutions </b></span>
                        </div>
                    </div>
                    <div class="col-6 wow fadeIn" data-wow-delay="0.1s">
                        <img class="img-fluid rounded" src="{{ asset('img/abt1.jpg') }}">
                    </div>
                    <div class="col-6 wow fadeIn" data-wow-delay="0.3s">
                        <img class="img-fluid rounded" src="{{ asset('img/abt2.jpg') }}">
                    </div>
                    <div class="col-6 wow fadeIn" data-wow-delay="0.5s">
                        <img class="img-fluid rounded" src="{{ asset('img/abt3.jpg') }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h2>About ZadeCAD Academy</h2>
                <p class="mb-4">
                    <blockquote style="color:#000">
                        ZadeCAD Limited is registered as a limited liability company with shares. It was established in 2020 to impart quality industry-specific Computer-Aided Design (CAD) skills training. Since its inception, ZadeCAD Ltd through its initiative ZadeCAD Academy, continues to expand and focus on providing critical professional and technical skills training in engineering and project management.
                        <br/><br/>
                        To date, we have trained over 300+ professionals from different backgrounds. Our trained students are now employed in key positions in large and small companies both locally and internationally.
                    </blockquote>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial Video Section -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h3>What Our Students Say</h3>
            <p>Hear from our students about their experiences at ZadeCAD Academy.</p>
        </div>
        <div class="row g-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative h-100">
                    <video id="testimonial-video" width="100%" height="500" controls muted>
                        <source src="{{ asset('videos/August Alsina - Benediction ft. Rick Ross (Official Music Video).mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Why Choose Us Section -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h3> Why Choose Us ? </h3>
        </div>
        <div class="row gy-5 gx-4">
            @foreach($chzn as $val)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-item">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('uploads/' . $val->image) }}" style="width: 100%;height: 300px" alt="">
                    </div>
                    <div class="text-center p-4" style="border-bottom: 2px solid #ddd;">
                        <h6>{{ $val->title }}</h6>
                        <p>{{ $val->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Courses Section -->
<div class="container-xxl py-5" style="background-color: #fff;">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h3>Our Courses</h3>
        </div>
        <div class="row gy-5 gx-4">
            @foreach($courses as $row)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-item">
                    <div class="position-relative">
                        <a href="{{ route('course.details', ['id' => $row->id]) }}" style="color:#ff7900;">
                            <img class="img-fluid" src="{{ asset('uploads/' . $row->pg_image) }}" style="width: 100%;height: 300px" alt="">
                        </a>
                    </div>
                    <div class="text-center p-4">
                        <h6>{{ $row->pg_name }}</h6>
                        <p>{{ Str::limit($row->description, 150) }}</p>
                        <a href="{{ route('course.details', ['id' => $row->id]) }}" style="color:#ff7900;">
                            Read More <i class="fa fa-angle-double-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <center>
                <button onclick="window.location.href='{{ route('courses.index') }}'" class="btn btn-secondary py-3 px-5" style="background-color:#ff7900;color:#fff">
                    <i class="fa fa-book"></i> ALL COURSES
                </button>
            </center>
        </div>
    </div>
</div>


<!-- Partners Section -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h3>Our Partners</h3>
            <p>We are proud to collaborate with these esteemed organizations.</p>
        </div>
        <div class="row gy-5 gx-4 d-flex justify-content-center">
            <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="partner-logo text-center rounded-bg">
                    <img src="{{ asset('logos/nbs logo.jfif') }}" class="img-fluid" alt="Partner 1">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="partner-logo text-center rounded-bg">
                    <img src="{{ asset('logos/airtel logo.png') }}" class="img-fluid" alt="Partner 2">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="partner-logo text-center">
                    <img src="{{ asset('logos/mak logo.jfif') }}" class="img-fluid" alt="Partner 3">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="partner-logo text-center">
                    <img src="{{ asset('logos/mtn logo.png') }}" class="img-fluid" alt="Partner 4">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="partner-logo text-center">
                    <img src="{{ asset('logos/ntv logo.png') }}" class="img-fluid" alt="Partner 5">
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="partner-logo text-center">
                    <img src="{{ asset('logos/amazon.jfif') }}" class="img-fluid" alt="Partner 5">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="partner-logo text-center">
                    <img src="{{ asset('logos/dfcu logo.jfif') }}" class="img-fluid" alt="Partner 5">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="partner-logo text-center">
                    <img src="{{ asset('logos/guvnor logo.png') }}" class="img-fluid" alt="Partner 5">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="partner-logo text-center">
                    <img src="{{ asset('logos/johnnie walker logo.png') }}" class="img-fluid" alt="Partner 5">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="partner-logo text-center">
                    <img src="{{ asset('logos/serena logo.png') }}" class="img-fluid" alt="Partner 5">
                </div>
            </div>
        </div>
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
