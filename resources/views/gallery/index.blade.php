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
            Opis / engleski
        </div>
        <div class="col-sm">
            Slika
        </div>
        <div class="col-sm">
            Aktivno
        </div>
        <div class="col-sm">
        </div>
    </div>
    @foreach ($gallery as $row)
    @php
    $url = asset('storage/images/thumbs/thumb');
    @endphp
    <div class="row p-2 border bg-light fw-bold">
        <div class="col-sm">
            {{$row->title}}
        </div>
        <div class="col-sm">
            {{$row->title_en}}
        </div>
        <div class="col-sm">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop{{$row->id}}" aria-controls="offcanvasTop">Pokaži opis</button>
        </div>
        <div class="col-sm">
            <img src="{{$url}}{{$row->order}}.jpg" style="max-height:250px;max-width:100%;height:auto;width:auto;" alt="Slika">
        </div>
        <div class="col-sm">
            @if ($row->active == 0)
            Ne
            @else
            Da
            @endif
        </div>
        <div class="col-sm">
            <a class="btn btn-info btn-sm my-1" href="{{ route('gallery.edit', ['gallery' => $row->id]) }}">Uredi sliku</a>
        </div>

    </div>
    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop{{$row->id}}" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasTopLabel">Opis</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            {{$row->img_desc}}
            <br>
            <br>
            <br>
            <br>
            <h5>Opis engleski</h5>
            {{$row->img_desc_en}}
        </div>
    </div>
    @endforeach
</div>
@endsection