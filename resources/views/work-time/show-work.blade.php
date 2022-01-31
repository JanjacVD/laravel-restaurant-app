@extends('layouts.nav')

@section('title', 'Radno vrijeme')

@section('content')
@php
    $count = count($time);
@endphp
@if ($count == 0)
<a class="btn btn-info btn-sm py-3 px-4"style="margin-top:10px;margin-left:5px;" href="{{ route('work-time.create') }}">Dodaj radno vrijeme</a>
@endif
<h1 class="text-center p-3 fw-bold">Radno vrijeme</h1>


@if (session('status'))
<div class="alert alert-success" role="alert">
    {{session('status')}}
</div>
@endif
<div class=".container-fluid p-2">
    <div class="row py-3 px-2 border bg-secondary">
        <div class="col-sm-8">
            Dan
        </div>
        <div class="col-sm-4">
        </div>
    </div>
    @foreach ($time as $row)

    <div class="row p-2 border bg-light fw-bold">
        <div class="col-sm-8 fs-2">
        @if($row->day1 == 0)
            {{'Ponedjeljak'}}
            @elseif($row->day1 == 1)
            {{'Utorak'}}
            @elseif($row->day1 == 2)
            {{'Srijeda'}}
            @elseif($row->day1 == 3)
            {{'Četvrtak'}}
            @elseif($row->day1 == 4)
            {{'Petak'}}
            @elseif($row->day1 == 5)
            {{'Subota'}}
            @elseif($row->day1 == 6)
            {{'Nedjelja'}}
            @endif
             - 
             @if($row->day2 == 0)
            {{'Ponedjeljak'}}
            @elseif($row->day2 == 1)
            {{'Utorak'}}
            @elseif($row->day2 == 2)
            {{'Srijeda'}}
            @elseif($row->day2 == 3)
            {{'Četvrtak'}}
            @elseif($row->day2 == 4)
            {{'Petak'}}
            @elseif($row->day2 == 5)
            {{'Subota'}}
            @elseif($row->day2 == 6)
            {{'Nedjelja'}}
            @endif
        </div>
        <div class="col-sm-2 fs-2">
        <a class="btn btn-warning btn-sm p-3" href="{{ route('work-time.edit', ['work_time' => $row->id]) }}">Promijeni radno vrijeme</a>
        </div>
        <div class="col-sm-2 fs-2">
        @if($row->active == '1')
            <a class="btn btn-success btn-sm p-3" href="{{ route('work-time.show', ['work_time' => $row->id]) }}">Otvoreno</a>
        @elseif($row->active == '0')
            <a class="btn btn-danger btn-sm p-3" href="{{ route('work-time.show', ['work_time' => $row->id]) }}">Zatvoreno</a>
        @endif
        </div>
        <div class="col-sm-8 fs-2">
        {{ $row->time1 }} - {{ $row->time2 }}
        </div>
       
    </div>
    @endforeach
</div>
@endsection