@extends('layouts.public-nav')
@section('title','Rezervacija ne postoji')
@section('index','noindex')
@section('content')
<div class="booking-body">
    <div class="booking-form">
        <div class="booking-form-line" style="grid-column: span 2;">
            <h1 class="booking-title">Rezervacija istekla</h1>
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            Vrijeme za potvrdu vaše rezervacije je isteklo
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            Pokušajte ponovno
        </div>
        <div class="booking-form-line">
            <button type="submit" onclick="redirect()">Pokušaj ponovno</button>
        </div>
    </div>
</div>
<script>
    function redirect()
    {
        window.location.href = "{{ route('public.booking') }}";
    }
</script>
@include('layouts.footer')
@endsection