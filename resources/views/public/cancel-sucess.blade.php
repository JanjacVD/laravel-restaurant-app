@extends('layouts.public-nav')
@section('title','Rezervacija poništena')
@section('index','noindex')
@section('content')
<div class="booking-body">
    <div class="booking-form">
        <div class="booking-form-line" style="grid-column: span 2;">
            <h1 class="booking-title">Rezervacija uspješno poništena</h1>
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            Hvala vam
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