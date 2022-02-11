@extends('layouts.public-nav')
@section('title','Otkazivanje rezervacije')
@section('index','noindex')
@section('content')
<div class="booking-body">
    <form action="{{ route('reservation.destroy', $info->id) }}" method="POST" class="booking-form" autocomplete="off">
        @csrf
        @method('delete')
        <input type="hidden" name="token" value="{{ $info->token }}">
        <div class="booking-form-line">
            <h1 class="booking-title">Otkazivanje rezervacije</h1>
        </div>
        @if (session('password'))
        <div style="color:red;font-size:1.5em;grid-column: span 2;" class="booking-form-line">
            {{session('password')}}
        </div>
        @endif
        <div class="booking-form-line"></div>
        <div class="booking-form-line" style="grid-column: span 2;">
            <label for="key" class="label">Lozinka za otkazivanje:</label>
            <input id="key" class="input-text" type="password" name="key" required>
        </div>
        <div class="booking-form-line">
            <button type="submit" name="submit">Otkaži</button>
        </div>
    </form>
</div>
@include('layouts.footer')
@endsection