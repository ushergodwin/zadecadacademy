@include('header')

<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5">Training Calendar</h1>
        @if($calendars->isNotEmpty())
            <div id="calendar"></div>
        @else
            <div class="alert alert-info text-center">No training sessions scheduled.</div>
        @endif
    </div>
</div>

@include('footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: [
                @foreach($calendars as $calendar)
                {
                    title: '{{ $calendar->course->pg_name }}',
                    start: '{{ $calendar->start_date }}',
                    end: '{{ \Carbon\Carbon::parse($calendar->end_date)->addDay()->format('Y-m-d') }}', // Add a day to end date to include the entire end date
                    description: '{{ $calendar->location }}'
                },
                @endforeach
            ],
            eventDidMount: function(info) {
                // Add location to event
                var tooltip = new Tooltip(info.el, {
                    title: info.event.extendedProps.description,
                    placement: 'top',
                    trigger: 'hover',
                    container: 'body'
                });
            }
        });

        calendar.render();
    });
</script>
