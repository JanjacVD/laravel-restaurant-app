@extends('layouts.public-nav')
@section('title','Rezervirajte stol')
@section('index','noindex')
@section('content')
<div class="booking-body">
    <form action="{{ route('pending.store') }}" method="POST" class="booking-form" autocomplete="off">
        @csrf
        <div class="booking-form-line" style="grid-column: span 2;">
            <h1 class="booking-title">Rezervirajte stol</h1>
        </div>
        @if ($errors->has('email'))
        <div style="color:red;font-size:1.5em;grid-column: span 2;" class="booking-form-line">
            {{'Zahtjev rezervaciju na taj E-mail već postoji, molimo provjerite svoju E-mail poštu'}}
        </div>
        @endif
        <input type="hidden" name="name" value="{{ $_GET['name'] }}">
        <input type="hidden" name="email" value="{{ $_GET['email'] }}">
        <input type="hidden" name="phone" value="{{ $_GET['phone'] }}">
        <input type="hidden" name="smoke" value="{{ $_GET['smoke'] }}">
        <input type="hidden" name="people" value="{{ $_GET['people'] }}">
        <input type="hidden" name="reservation_date" value="{{ $_GET['date'] }}">
        <div class="booking-form-line" style="grid-column: span 2;">
            <label for="time" class="label" style="font-size:1.6rem">Vrijeme:</label>
            <select class="select-time" name="reservation_time" id="time" required>
                <option hidden disabled selected>Odaberite vrijeme</option>
                @foreach ($time as $time_row)
                <option name="" value="{{$time_row->avaliable_time}}" id="" @foreach ($banned_period as $period) @if($period->reservation_time == $time_row->avaliable_time)
                    @if ($period->count >= $time_row->capacity) hidden
                    @endif
                    @endif
                    @endforeach
                    >{{$time_row->avaliable_time}}
                </option>
                @endforeach
            </select>
        </div>

        <div class="booking-form-line">
            <button type="submit" name="submit">Rezerviraj</button>
        </div>
    </form>
</div>
@include('layouts.footer')
@endsection