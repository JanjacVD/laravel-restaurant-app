@extends('layouts.nav')

@section('title', 'Galerija')

@section('content')

<h1 class="text-center p-3 fw-bold">Galerija</h1>
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{session('status')}}
</div>
@endif
<div class=".container-fluid p-2">

    <div class="row py-3 px-2 border bg-secondary">
        <div class="col-sm">
            Naslov
        </div>
        <div class="col-sm">
            Naslov engleski
        </div>
        <div class="col-sm">
            Aktivno
        </div>
        <div class="col-sm">
        </div>
    </div>
    @foreach ($gallery as $row)

    <div class="row p-2 border bg-light fw-bold">
        <div class="col-sm">
            {{$row->title}}
            <br>
            {{$row->title_en}}
        </div>
        <div class="col-sm">
            @if ($row->active == 0)
            No
            @else
            Yes
            @endif
        </div>
        <div class="col-sm">
            <a class="btn btn-info btn-sm my-1" href="{{ route('food.edit', ['food' => $row->id]) }}">Uredi sliku</a>
        </div>

    </div>
    @endforeach
</div>
@endsection