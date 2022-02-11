@extends('layouts.public-nav')
@section('title','Rezervacija već postoji')
@section('index','noindex')
@section('content')
<div class="booking-body">
    <div class="booking-form">
        <div class="booking-form-line" style="grid-column: span 2;">
            <h1 class="booking-title">Rezervacija već postoji</h1>
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            Vaša rezervacija već postoji
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            Provjerite vaš E-mail i vidimo se uskoro.
        </div>
        <div class="booking-form-line">
            <button type="submit" onclick="redirect()">Pogledaj jelovnik</button>
        </div>
    </div>
</div>
<script>
    function redirect()
    {
        window.location.href = "{{ route('public.menu') }}";
    }
</script>
@include('layouts.footer')
@endsection