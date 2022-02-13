@extends('layouts.public-nav')
@section('title','Rezervirajte stol')
@section('index','index')
@section('content')

<script src="{{ mix('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ mix('js/jquery-1.13.1.js') }}"></script>
<link rel="stylesheet" href="{{ mix('css/jquery-1.13.1.css') }}">
<div class="booking-body">
    @foreach($bookingStatus as $row)

    @if($row->status === 0)

    <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%); width:80%; height:60%; background:rgba(0,0,0,0.2);display:flex; color:#fff; text-transform:uppercase;">
        <h1 style="margin:auto;">Rezervacije trenutno onemogućene</h1>
    </div>

    @else

    <form action="{{route('public.choose-time') }}" method="GET" class="booking-form" autocomplete="off">
        <div class="booking-form-line">
            <h1 class="booking-title">Rezervirajte stol</h1>
        </div>
        <div class="booking-form-line"></div>
        <div class="booking-form-line">
            <label for="name" class="label">Name:</label>
            <input id="name" class="input-text" type="text" name="name" required>
        </div>

        <div class="booking-form-line">
            <label for="email" class="label">E-mail:</label>
            <input id="email" class="input-text" type="email" name="email" required>
        </div>

        <div class="booking-form-line">
            <label for="datepicker" class="label">Datum:</label>
            <input type="text" class="input-text" id="datepicker" name="date" required>
        </div>

        <div class="booking-form-line">
            <label class="label" for="people">Broj osoba:</label>
            <input id="people" class="input-text" type="number" min="1" max="8" name="people" required>
        </div>

        <div class="booking-form-line">
            <label for="phone" class="label">Mobitel:</label>
            <input id="phone" class="input-text" type="number" name="phone" required>
        </div>
        <div class="booking-form-line">
            @if($row->status == 1)
            <input type="hidden" name="smoke" value="0">
            @elseif($row->status == 2)
            Pušači:
            <br>
            <div class="booking-radio">
                <div class="booking-radio-single">
                    <input type="radio" id="smokeYes" name="smoke" value="1" required>
                    <label for="smokeYes">Da</label>
                </div>
                <div class="booking-radio-single">
                    <input type="radio" id="smokeNo" name="smoke" value="0">
                    <label for="smokeNo">Ne</label>
                </div>
            </div>
            @endif

        </div>

        <div class="booking-form-line">
            <button type="submit" name="submit">Odaberi vrijeme</button>
        </div>
    </form>
    @endif
    @endforeach

</div>
<script>
    var dateMin = new Date();
    dateMin.setDate(dateMin.getDate() + (dateMin.getHours() >= 12 ? 1 : 0));
    $(function() {
        var disabledDays = [@foreach($dateOff as $date)
            "{{$date->noDate}}", @endforeach
            @foreach($booked as $bookedDate)
            "{{$bookedDate}}", @endforeach

        ];
        $("#datepicker").datepicker({
            minDate: dateMin,
            beforeShowDay: function(date) {
                var day = date.getDay();
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                var isDisabled = ($.inArray(string, disabledDays) != -1);

                //day != 0 disables all Sundays
                return [@foreach($dayOff as $day) day != {
                    {
                        $day - > day
                    }
                } && @endforeach!isDisabled];
            }
        });
    });
</script>

@include('layouts.footer')
@endsection