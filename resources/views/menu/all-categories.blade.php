@extends('layouts.nav')

@section('title', 'Sve kategorije')

@section('content')
<h1 class="text-center p-3 fw-bold">Sve kategorije</h1>
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
            Naslov(engleski)
        </div>
        <div class="col-sm">
            Aktivno
        </div>
        <div class="col-sm">
            Odjeljak
        </div>
        <div class="col-sm">
        </div>
    </div>
    @foreach ($category as $row)
    <div class="row p-2 border bg-light fw-bold">
        <div class="col-sm">
            {{$row->title}}
        </div>
        <div class="col-sm">
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
            @foreach ($section as $section_row) @if($row->section_id == $section_row->id) {{ $section_row->title }} @endif @endforeach
        </div>
        <div class="col-sm">
            <a class="btn btn-info btn-sm my-1" href="{{ route('category.edit', ['category' => $row->id]) }}">Uredi kategoriju</a>
            <a class="btn btn-success btn-sm my-1" href="{{ route('category.show', ['category' => $row->id]) }}">Pogledaj kategoriju</a>
        </div>

    </div>
    @endforeach
</div>
@endsection