@include('header')

<div class="container-fluid page-header py-1 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-2">
        <h2 class="text-white mb-4 animated slideInDown">{{ $program->pg_name }}</h2>
    </div>
</div>
<div class="container-xxl py-8">
    <div class="row">
        <div class="col-md-8">
            <br>
            <p><img src="{{ asset('uploads/' . $program->pg_image) }}" title="{{ $program->pg_name }}" style="width:100%" /></p>
            <p style="text-align: justify;">{{ $program->description }}</p>
            <b>Software used:</b><br/>
            @if($program->soft->isEmpty())
                <div class="alert alert-info" role="alert" style="margin-top: 20px;">
                    <strong>No software listed yet.</strong> This course currently has no software associated with it.
                </div>
            @else
                <div style="margin-top: 20px;">
                    @foreach($program->soft as $software)
                        <p style="line-height: 1em; margin-bottom: 10px;">
                            <i class="fa fa-angle-right"></i>
                            <a href="{{ route('software.documents', $software->id) }}" 
                            style="color: #007bff; text-decoration: none; font-weight: bold; transition: color 0.3s ease;"
                            onmouseover="this.style.color='#0056b3'; this.style.textDecoration='underline';" 
                            onmouseout="this.style.color='#007bff'; this.style.textDecoration='none';">
                            {{ $software->software_name }}
                            </a>
                        </p>
                    @endforeach
                </div>
            @endif

            <h2 style="font-weight: bold;">
                <a href="{{ route('program.enrol', ['id' => $program->id]) }}" class="btn btn-secondary py-3 px-5">
                    <i class="fa fa-pencil"></i> APPLY NOW
                </a>
            </h2>
        </div>
        <div class="col-md-4">
            <br>
            <h4>Other Courses</h4>
            @foreach($outline as $course)
                <p style="line-height: 1em"><i class="fa fa-angle-right"></i>
                    @if ($program->id == $course->id)
                        <a href="{{ route('course.details', ['id' => $course->id]) }}" style="color:#ff7900;">
                            {{ $course->pg_name }}
                        </a>
                    @else
                        <a href="{{ route('course.details', ['id' => $course->id]) }}">
                            {{ $course->pg_name }}
                        </a>
                    @endif
                </p>
            @endforeach
        </div>
    </div>
</div>

@include('footer')
