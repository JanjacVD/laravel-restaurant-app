@extends('layouts.nav')

@section('title', 'Vrijeme rezervacija')

@section('content')

<h1 class="text-center p-3 fw-bold">Vrijeme rezervacija</h1>
<a class="btn btn-info btn-sm py-3 px-4" style="margin-top:10px;margin-left:5px;" href="{{ route('time.create') }}">Dodaj vrijeme</a>


@if (session('status'))
<div class="alert alert-success" role="alert">
    {{session('status')}}
</div>
@endif
<div class=".container-fluid p-2">
    <div class="row py-3 px-2 border bg-secondary">
        <div class="col-sm">
            Dan
        </div>
        <div class="col-sm">
            Kapacitet
        </div>
        <div class="col-sm">
        </div>
    </div>
    @foreach ($time as $row)

    <div class="row p-2 border bg-light fw-bold">
        <div class="col-sm fs-2">
            {{$row->avaliable_time}}
        </div>
        <div class="col-sm fs-2">
            {{$row->capacity}}
        </div>
        <div class="col-sm fs-2">
            <a class="btn btn-warning btn-sm p-3" href="{{ route('time.edit', ['time' => $row->id]) }}">Promijeni vrijeme</a>
            <form class="btn btn-danger btn-sm p-2" action="{{ route('time.destroy', ['time' => $row->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger btn-sm p-2"  onclick="return confirm('Are you sure you want to delete this time option?')"value="Izbriši">
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection