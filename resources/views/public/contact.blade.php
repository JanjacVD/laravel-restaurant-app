@extends('layouts.public-nav')
@section('title', __("messages.nav5") )
@section('index','index')
@section('content')
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<div class="contact-body">
    <div class="contact-form-body">
        <h1 style="color:#ff9966; font-family:poppins,sans-serif;">{{__('messages.contactUs')}}</h3>
            <h5 style="font-family: 'Poppins', sans-serif;padding-bottom:10px">{{__('messages.weRespond')}}.</h4>
                @if (session('status'))
                <div class="contact-status">
                    {{session('status')}}
                </div>
                @endif
                <form action="{{ route('public.sendmail') }}" method="POST" class="contact-form">
                    @csrf
                    <label for="name" class="contact-label">{{__('messages.name')}}:</label>
                    <input type="text" name="name" id="name" placeholder="{{__('messages.KimiNoNaWa') }}" class="contact-input" required>

                    <label for="subject" class="contact-label">{{__('messages.subject')}}:</label>
                    <input type="text" name="subject" id="subject" placeholder="{{ __('messages.subject') }}" class="contact-input" required>

                    <label for="email" class="contact-label">E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="{{__('messages.YourEmail') }}" class="contact-input" required>

                    <label for="message" class="contact-label">{{__('messages.message')}}:</label>
                    <textarea class="contact-textarea" name="message" id="message" placeholder="{{__('messages.messageHere')}}" cols="30" rows="5" required></textarea>

                    <button type="submit" class="contact-submit">{{__('messages.sendTheShit')}}</button>
                </form>
    </div>
</div>

@include('layouts.footer')
@endsection