@include('header')

<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
    }

    .card-title {
        color: #ff7900;
        font-weight: bold;
    }

    .card-text {
        font-size: 0.9rem;
    }

    .shadow-sm {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5">Training Calendar</h1>
        @if($calendars->isNotEmpty())
            <div class="row gy-4">
                @foreach($calendars as $calendar)
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $calendar->course->cs_name }}</h5>
                                <p class="card-text"><strong>Start Date:</strong> {{ $calendar->start_date }} at {{ $calendar->start_time }}</p>
                                <p class="card-text"><strong>End Date:</strong> {{ $calendar->end_date }} at {{ $calendar->end_time }}</p> 
                                <p class="card-text"><strong>Location:</strong> {{ $calendar->location }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">No training sessions scheduled.</div>
        @endif
    </div>
</div>

@include('footer')
