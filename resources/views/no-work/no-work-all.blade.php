@extends('layouts.nav')

@section('title', 'Neradni dani')

@section('content')
<a class="btn btn-info btn-sm py-3 px-4" style="margin-top:10px;margin-left:5px;" href="{{ route('day-off.create') }}">Dodaj dan</a>

<h1 class="text-center p-3 fw-bold">Svi dani</h1>


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
    @foreach ($day as $row)

    <div class="row p-2 border bg-light fw-bold">
        <div class="col-sm-8 fs-2">
            @if($row->day == 0)
            {{'Ponedjeljak'}}
            @elseif($row->day == 1)
            {{'Utorak'}}
            @elseif($row->day == 2)
            {{'Srijeda'}}
            @elseif($row->day == 3)
            {{'Četvrtak'}}
            @elseif($row->day == 4)
            {{'Petak'}}
            @elseif($row->day == 5)
            {{'Subota'}}
            @elseif($row->day == 6)
            {{'Nedjelja'}}
            @endif
        </div>
        <div class="col-sm-4">
            <form action="{{ route('day-off.destroy', ['day_off' => $row->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger btn-sm p-2 my-1" value="Izbriši" style="width:50%">
            </form>
        </div>

    </div>
    @endforeach
</div>
@endsection