@extends('layouts.public-nav')
@section('title','Rezervirajte stol')
@section('content')
<script src="{{ mix('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ mix('js/jquery-1.13.1.js') }}"></script>
<link rel="stylesheet" href="{{ mix('css/jquery-1.13.1.css') }}">
<div class="booking-body">
    <form action="##" method="POST" class="booking-form" autocomplete="off">
        <div class="booking-form-line"><h1 class="booking-title">Rezervirajte stol</h1></div>
        <div class="booking-form-line"></div>
        <div class="booking-form-line">
            <label for="name" class="label">Name:</label>
            <input id="name" class="input-text" type="text" name="name">
        </div>

        <div class="booking-form-line">
            <label for="email" class="label">E-mail:</label>
            <input id="email" class="input-text" type="email" name="email">
        </div>

        <div class="booking-form-line">
            <label for="datepicker" class="label">Datum:</label>
            <input type="text" class="input-text" id="datepicker" name="date">
        </div>

        <div class="booking-form-line">
            <label class="label" for="people">Broj osoba:</label>
            <input id="people" class="input-text" type="number" min="1" max="8" name="people">
        </div>

        <div class="booking-form-line">
            <label for="phone" class="label">Mobitel:</label>
            <input id="phone" class="input-text" type="number" name="phone">
        </div>

        <div class="booking-form-line">
            Pušači:
            <br>
            <div class="booking-radio">
                <div class="booking-radio-single">
                    <input type="radio" id="smokeYes" name="smoke" value="1">
                    <label for="smokeYes">Da</label>
                </div>
                <div class="booking-radio-single">
                    <input type="radio" id="smokeNo" name="smoke" value="0">
                    <label for="smokeNo">Ne</label>
                </div>
            </div>
        </div>

        <div class="booking-form-line">
            <button type="submit" name="submit">Odaberi vrijeme</button>
        </div>
    </form>
</div>
<script>
    var dateMin = new Date();
    dateMin.setDate(dateMin.getDate() + (dateMin.getHours() >= 12 ? 1 : 0));
    $(function() {
        var disabledDays = [];
        $("#datepicker").datepicker({
            minDate: dateMin,
            beforeShowDay: function(date) {
                var day = date.getDay();
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                var isDisabled = ($.inArray(string, disabledDays) != -1);

                //day != 0 disables all Sundays
                return [day != 0 && !isDisabled];
            }
        });
    });
</script>

@include('layouts.footer')
@endsection