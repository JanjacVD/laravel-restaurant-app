@extends('layouts.public-nav')
@section('title','Rezervirajte stol')
@section('content')
<script src="{{ mix('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ mix('js/jquery-1.13.1.js') }}"></script>
<link rel="stylesheet" href="{{ mix('css/jquery-1.13.1.css') }}">
<div class="booking-body">
    <form action="##" method="POST" class="booking-form" autocomplete="off">
        <div class="booking-form-line">
            <h1 class="booking-title">Rezervirajte stol</h1>
        </div>
        <div class="booking-form-line">
            <label for="name" class="label">Vrijeme:</label>
            <select name="time" id="time">
                <option selected disabled hidden>Odaberite vrijeme</option>
                @forelse ($time as $row)    
                <option value="{{$row->time}}">{{$row->time}}</option>
                @empty
                <option>Trenutno nedosutpno</option>
                @endforelse
            </select>
        </div>


        <div class="booking-form-line">
            <button type="submit" name="submit">Odaberi vrijeme</button>
        </div>
    </form>
</div>

@include('layouts.footer')
@endsection