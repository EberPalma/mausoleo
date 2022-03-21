@extends('index')
@if(!isset(Auth::user()->name))
    <meta http-equiv="refresh" content="0; url={{ route('login') }}">
@else
@section('Contenidoprincipal')
<link href='fullcalendar/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />

    <script src='fullcalendar/core/main.js'></script>
    <script src='fullcalendar/daygrid/main.js'></script>
    <div class="content">
<div class="container-fluid">
    <div class="section-image">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="row">

            <div class="card col-md-12">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <h3 class="mb-0">{{ __('Calendario') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="/api/userupdate/{{ auth()->user()->id }}" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')


                        <div id='calendar'></div>






                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            
          plugins: [ 'dayGrid' ]


        });
        calendar.setOption('locale','Es');


        calendar.render();
      });
</script>
@endpush
@endif
