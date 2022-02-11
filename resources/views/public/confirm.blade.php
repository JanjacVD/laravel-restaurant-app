@extends('layouts.public-nav')
@section('title','Potvrdite rezervaciju')
@section('index','noindex')
@section('content')
<div class="booking-body">
    <form action="{{route('reservation.store') }}" method="POST" class="booking-form" autocomplete="off">
        @csrf
        <input type="hidden" name="token" value="{{ $_GET['token'] }}">
        <div class="booking-form-line">
            <h1 class="booking-title">Potvrdite rezervaciju</h1>
        </div>
        @if (session('email'))
        <div style="color:red;font-size:1.5em;grid-column: span 2;" class="booking-form-line">
            {{session('email')}}
        </div>
        @endif
        <div class="booking-form-line"></div>
        <div class="booking-form-line" style="grid-column: span 2;">
            <label for="email" class="label">Potvrdite E-mail:</label>
            <input id="email" class="input-text" type="email" name="email" required>
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            <label for="message" class="label">Ukoliko imate neku poruku:</label>
            <textarea style="background:rgba(0,0,0,0.2); width:100%; color:#fff;" id="message" placeholder="Vaša poruka..." class="input-text" name="message" rows="5" cols="50"></textarea>
        </div>
        <div class="booking-form-line">
            <button type="submit" name="submit">Potvrdi</button>
        </div>
    </form>
</div>
@include('layouts.footer')
@endsection