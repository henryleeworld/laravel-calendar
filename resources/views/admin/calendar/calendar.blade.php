@extends('layouts.admin')
@section('content')
<h3 class="page-title">{{ trans('global.systemCalendar') }}</h3>
<div class="card">
    <div class="card-header">
        {{ trans('global.systemCalendar') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.systemCalendar') }}" method="GET">
            場地：
            <select name="venue_id">
                <option value="">-- 全部場地 --</option>
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}"
                            @if (request('venue_id') == $venue->id) selected @endif>{{ $venue->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-sm btn-primary">篩選</button>
        </form>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css' />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css' />

        <div id='calendar'></div>


    </div>
</div>
@endsection

@section('scripts')
@parent
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/locales/zh-tw.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    // page is now ready, initialize the calendar...
    events={!! json_encode($events) !!};
    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'dayGrid' ],
        defaultView: 'dayGridMonth',
        locale: 'zh-tw',
        // put your options and callbacks here
        events: events,
    });

    calendar.render();
});
</script>
@stop