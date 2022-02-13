@extends('layouts.public-nav')
@section('title','Rezervirajte stol')
@section('index','index')
@section('content')
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<div class="contact-body">
    <div class="contact-form-body">
        <h1 style="color:#ff9966; font-family:poppins,sans-serif;">Kontaktirajte nas</h3>
            <h5 style="font-family: 'Poppins', sans-serif;padding-bottom:10px">Pobrinut ćemo se da vam ogdovorimo u što kraćem roku.</h4>
                @if (session('status'))
                <div class="contact-status">
                    {{session('status')}}
                </div>
                @endif
                <form action="{{ route('public.sendmail') }}" method="POST" class="contact-form">
                    @csrf
                    <label for="name" class="contact-label">Ime:</label>
                    <input type="text" name="name" id="name" placeholder="Vaše ime" class="contact-input" required>

                    <label for="subject" class="contact-label">Predmet:</label>
                    <input type="text" name="subject" id="subject" placeholder="Predmet" class="contact-input" required>

                    <label for="email" class="contact-label">E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="Vaša E-mail adresa" class="contact-input" required>

                    <label for="message" class="contact-label">Poruka:</label>
                    <textarea class="contact-textarea" name="message" id="message" placeholder="Vaša poruka ovdje..." cols="30" rows="5" required></textarea>

                    <button type="submit" class="contact-submit">Pošalji</button>
                </form>
    </div>
</div>

@include('layouts.footer')
@endsection