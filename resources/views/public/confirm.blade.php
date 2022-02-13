@extends('layouts.public-nav')
@section('title', __("messages.nav3") )
@section('index','noindex')
@section('content')
<div class="booking-body">
    <form action="{{route('reservation.store') }}" method="POST" class="booking-form" autocomplete="off">
        @csrf
        <input type="hidden" name="token" value="{{ $_GET['token'] }}">
        <div class="booking-form-line">
            <h1 class="booking-title">{{__('messages.confirm1')}}</h1>
        </div>
        @if (session('email'))
        <div style="color:red;font-size:1.5em;grid-column: span 2;" class="booking-form-line">
            {{session('email')}}
        </div>
        @endif
        <div class="booking-form-line"></div>
        <div class="booking-form-line" style="grid-column: span 2;">
            <label for="email" class="label">{{__('messages.confMail')}}:</label>
            <input id="email" class="input-text" type="email" name="email" required>
        </div>
        <div class="booking-form-line" style="grid-column: span 2;">
            <label for="message" class="label">{{__('messages.anyMsg')}}:</label>
            <textarea maxlength="50" style="background:rgba(0,0,0,0.2); width:100%; color:#fff;" id="message" placeholder="{{__('messages.messageHere') }}" class="input-text" name="message" rows="5" cols="50"></textarea>
        </div>
        <div class="booking-form-line">
            <button type="submit" name="submit">{{__('messages.confBtn')}}</button>
        </div>
    </form>
</div>
@include('layouts.footer')
@endsection