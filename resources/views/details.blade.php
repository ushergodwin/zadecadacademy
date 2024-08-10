@include('header')

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h2 class="text-white mb-4 animated slideInDown">{{ $program->pg_name }}</h2>
    </div>
</div>
<div class="container-xxl py-8" style="background-color: #fff;">
    <div class="row">
        <div class="col-md-8">
            <br>
            <p><img src="{{ asset('uploads/' . $program->pg_image) }}" title="{{ $program->pg_name }}" style="width:100%" /></p>
            <p style="text-align: justify;">{{ $program->description }}</p>
            <b>Software used:</b><br/>
            @foreach(explode('#', $program->software) as $software)
                <p style="line-height: 1em"><i class="fa fa-angle-right"></i> {{ $software }}</p>
            @endforeach
            <h2 style="font-weight: bold;">
                <a href="{{ route('enrol', ['id' => base64_encode($program->pid), 'description' => base64_encode($program->pg_name)]) }}" class="btn btn-secondary py-3 px-5">
                    <i class="fa fa-pencil"></i> ENROL NOW
                </a>
            </h2>
        </div>
        <div class="col-md-4">
            <br>
            <h4>Courses Outline</h4>
            @foreach($outline as $course)
                <p style="line-height: 1em"><i class="fa fa-angle-right"></i>
                    @if ($program->pid == $course->pid)
                        <a href="{{ route('program.details', ['read-more' => base64_encode($course->pid), 'content' => Str::slug($course->pg_name)]) }}" style="color:#ff7900;">
                            {{ $course->pg_name }}
                        </a>
                    @else
                        <a href="{{ route('program.details', ['read-more' => base64_encode($course->pid), 'content' => Str::slug($course->pg_name)]) }}">
                            {{ $course->pg_name }}
                        </a>
                    @endif
                </p>
            @endforeach
        </div>
    </div>
</div>

@include('footer')
