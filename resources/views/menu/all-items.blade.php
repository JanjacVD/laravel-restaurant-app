@extends('layouts.nav')

@section('title', 'Sve stavke')

@section('content')

<h1 class="text-center p-3 fw-bold">Sve stavke</h1>
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{session('status')}}
</div>
@endif
<div class=".container-fluid p-2">

    <div class="row py-3 px-2 border bg-secondary">
        <div class="col-sm">
            Naslov / engleski
        </div>
        <div class="col-sm">
            Opis / engleski
        </div>
        <div class="col-sm">
            Aktivno
        </div>
        <div class="col-sm">
            Cijena
        </div>
        <div class="col-sm">
            Kategorija
        </div>
        <div class="col-sm">
        </div>
    </div>
    @foreach ($item as $row)

    <div class="row p-2 border bg-light fw-bold">
        <div class="col-sm">
            {{$row->title}}
            <br>
            {{$row->title_en}}
        </div>
        <div class="col-sm">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop{{$row->id}}" aria-controls="offcanvasTop">Pokaži opis</button>
        </div>
        <div class="col-sm">
            @if ($row->active == 0)
            No
            @else
            Yes
            @endif
        </div>
        <div class="col-sm">
            {{$row->price}}.00 kn
        </div>
        <div class="col-sm">
            @foreach ($category as $category_row) @if($row->category_id == $category_row->id) {{ $category_row->title }} @endif @endforeach
        </div>
        <div class="col-sm">
            <a class="btn btn-info btn-sm my-1" href="{{ route('food.edit', ['food' => $row->id]) }}">Uredi stavku</a>
        </div>

    </div>
    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop{{$row->id}}" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasTopLabel">Opis</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            {{$row->desc}}
            <br>
            <br>
            <br>
            <br>
            <h5>Opis engleski</h5>
            {{$row->desc_en}}
        </div>
    </div>
    @endforeach
</div>
@endsection