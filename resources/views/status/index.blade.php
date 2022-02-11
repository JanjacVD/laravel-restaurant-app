@extends('layouts.nav')

@section('title', 'Status rezervacija')

@section('content')

@php
$count = count($status);
@endphp
@if ($count == 0)
<a class="btn btn-info btn-sm py-3 px-4" style="margin-top:10px;margin-left:5px;" href="{{ route('status.create') }}">Dodaj status</a>
@endif
<h1 class="text-center p-3 fw-bold">Status rezervacija</h1>

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{session('status')}}
</div>
@endif

@foreach ($status as $row)
<div class="card">
    <div class="card-body fs-2 my-3">
        <h3 class="card-title">Status rezervacija</h3>
        <p class="card-text">Trenutni status rezervacija:
            @if($row->status == 0)Zatvoreno @elseif ($row->status == 1)Zima @elseif ($row->status == 2)Ljeto @endif
        <div class="col-sm-2 fs-2">
            <a href="{{route('status.edit', ['status' => $row->id]) }}" class="btn btn-primary p-2">Promijeni status</a>
        </div>
        </p>
    </div>
</div>
@endforeach
@endsection