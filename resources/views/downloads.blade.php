@include('header')

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h3 class="text-white mb-4 animated slideInDown">Course Outline Downloads</h3>
    </div>
</div>
<div class="container-xxl py-5" style="background-color: #fff;">
    <div class="container">
        <div class="row g-5 align-items-end">
            <div class="col-lg-12">
                @foreach($courses as $course)
                <p>
                    <i class="fa fa-file-pdf fa-fw"></i>
                    <a href="{{ asset('uploads/' . $course->attachment) }}" target="_blank" style="color:blue">
                        Course Outline-{{ $course->cs_name }} [{{ getSize(filesize(public_path('uploads/' . $course->attachment))) }}]
                    </a>
                </p>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('footer')
