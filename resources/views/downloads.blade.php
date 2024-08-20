@include('header')

<div class="container-fluid page-header py-1 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-1">
        <h3 class="text-white mb-4 animated slideInDown">Course Outline Downloads</h3>
    </div>
</div>

<div class="container-xxl py-5" style="background-color: #fff;">
    <div class="container">
        <div class="row g-5">
            @foreach($courses as $course)
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><?= $course->cs_name; ?></h5>
                    </div>
                    <div class="card-body">
                        <iframe src="uploads/<?= $course->attachment; ?>" width="100%" height="200px"
                            style="border: none;"></iframe>
                    </div>
                    <div class="card-footer text-center">
                        <a href="uploads/<?= $course->attachment; ?>" target="_blank" class="btn btn-primary">Download</a>
                        <p class="mt-2">Size: <?= getSize(filesize("uploads/" . $course->attachment)); ?></p>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div>
@include('footer')
