@include('header')

<div class="container-fluid page-header py-1 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-1">
        <h3 class="text-white mb-4 animated slideInDown">Course Outline Downloads</h3>
    </div>
</div>

<div class="container-xxl py-5" style="background-color: #fff;">
    <div class="container">
        <div class="row g-4">
            @foreach($courses as $course)
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header text-white text-center" style="padding: 10px 15px; height: 60px;">
                        <h5 class="card-title mb-0">{{ $course->cs_name }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="document-preview" style="height: 200px; overflow: hidden;">
                            <iframe src="{{ asset('uploads/' . $course->attachment) }}" width="100%" height="100%" style="border: none;"></iframe>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ asset('uploads/' . $course->attachment) }}" target="_blank" class="btn btn-secondary">
                            <i class="fa fa-download"></i> Download
                        </a>
                        <p class="mt-2">Size: {{ getSize(filesize(public_path('uploads/' . $course->attachment))) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('footer')
