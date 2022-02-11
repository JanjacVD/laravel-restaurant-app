@extends('layouts.public-nav')
@section('index','noindex')
@section('title','Rezervacija uspješna')
@section('content')
<div class="booking-body">
    <div class="booking-form">
        <div class="booking-form-line" style="grid-column: span 2;">
            <h1 class="booking-title">Rezervacija uspješna</h1>
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            Uspješno ste napravili rezervaciju, poslali smo vam potvrdu vaše rezervacije na vaš E-mail
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            Hvala vam i vidimo se uskoro
        </div>
        <div class="booking-form-line">
            <button type="submit" onclick="redirect()">Zatvori</button>
        </div>
    </div>
</div>
<script>
    function redirect() {
        window.open("", "_self");
        window.close();
    }
</script>
@include('layouts.footer')
@endsection