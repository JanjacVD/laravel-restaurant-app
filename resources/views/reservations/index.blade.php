@extends('layouts.nav')

@section('title', 'Rezervacije')

@section('content')

<h1 class="text-center p-3 fw-bold">Rezervacije</h1>
<a class="btn btn-info btn-sm py-3 px-4" style="margin-top:10px;margin-left:5px;" href="{{ route('reservation.today') }}">Printaj za danas</a>

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{session('status')}}
</div>
@endif
<div class=".container-fluid p-2">

    <div class="row py-3 px-2 border bg-secondary">
        <div class="col-sm">
            Broj rezervacije
        </div>
        <div class="col-sm">
            Ime
        </div>
        <div class="col-sm">
            Broj osoba
        </div>
        <div class="col-sm">
            Datum
        </div>
        <div class="col-sm">
            Vrijeme
        </div>
        <div class="col-sm">
            Pušači
        </div>
        <div class="col-sm">
            Mobitel
        </div>
        <div class="col-sm">
            Poruka
        </div>
    </div>
    @foreach ($customer as $row)
    <div class="row p-2 border bg-light fw-bold">
        <div class="col-sm">
            {{$row->order_number}}
        </div>

        <div class="col-sm">
            {{ $row->name }}
        </div>
        <div class="col-sm">
            {{ $row->people }}
        </div>
        <div class="col-sm">
            {{ date('d-m-Y', strtotime($row->reservation_date));}}
        </div>
        <div class="col-sm">
            {{$row->reservation_time}}
        </div>
        <div class="col-sm">
            @if ($row->smoke == 0)
            Ne
            @elseif ($row->smoke == 1)
            Da
            @endif
        </div>
        <div class="col-sm">
            {{$row->phone}}
        </div>
        <div class="col-sm">
            @if ($row->message != 'No-message')
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop{{$row->id}}" aria-controls="offcanvasTop">Pokaži poruku</button>
            @endif
        </div>
    </div>
    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop{{$row->id}}" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h2 id="offcanvasTopLabel">Poruka</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            {{$row->message}}
        </div>
    </div>
    @endforeach
</div>
@endsection