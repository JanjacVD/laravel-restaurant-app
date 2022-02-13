@extends('layouts.public-nav')
@section('title', __("messages.nav3") )
@section('index','noindex')
@section('content')
<div class="booking-body">
    <div class="booking-form">
        <div class="booking-form-line" style="grid-column: span 2;">
            <h1 class="booking-title">{{__('messages.full')}}</h1>
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            {{__('messages.weFull')}}
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            {{__('messages.raincheck')}}
        </div>
        <div class="booking-form-line">
            <button type="submit" onclick="redirect()">{{__('messages.bookBtn')}}</button>
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