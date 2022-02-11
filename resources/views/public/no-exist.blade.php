@extends('layouts.public-nav')
@section('title','Rezervacija ne postoji')
@section('index','noindex')
@section('content')
<div class="booking-body">
    <div class="booking-form">
        <div class="booking-form-line" style="grid-column: span 2;">
            <h1 class="booking-title">Rezervacija ne postoji</h1>
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            Rezervacija ne postoji, vrlo vjerovatno je već poništena
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            Hvala vam
        </div>
        <div class="booking-form-line">
            <button type="submit" onclick="redirect()">Rezerviraj</button>
        </div>
    </div>
</div>
<script>
    function redirect() {
        window.location.href = "{{ route('public.booking') }}";
    }
</script>
@include('layouts.footer')
@endsection