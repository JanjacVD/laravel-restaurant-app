@extends('layouts.public-nav')
@section('title','Rezervacije popunjene')
@section('index','noindex')
@section('content')
<div class="booking-body">
    <div class="booking-form">
        <div class="booking-form-line" style="grid-column: span 2;">
            <h1 class="booking-title">Ispričavamo se</h1>
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            Popunili smo rezervacije za taj datum
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            Ukoliko hoćete, možete napraviti rezervaciju za neki drugi dan
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