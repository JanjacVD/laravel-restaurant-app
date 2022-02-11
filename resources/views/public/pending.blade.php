@extends('layouts.public-nav')
@section('title','Potvrdite rezervaciju')
@section('index','noindex')
@section('content')

<div class="booking-body">
    <div class="booking-form">
        <div class="booking-form-line" style="grid-column: span 2;">
            <h1 class="booking-title">Potvrdite rezervaciju</h1>
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            Molimo vas potvrdite vašu rezervaciju, poslali smo vam E-mail za potvrdu
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            Ukoliko ne potvrdite vašu rezervaciju u roku od 15 minuta, zahtjev će biti poništen.
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