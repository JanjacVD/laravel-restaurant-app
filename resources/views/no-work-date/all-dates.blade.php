@extends('layouts.nav')

@section('title', 'Neradni datumi')

@section('content')
<a class="btn btn-info btn-sm py-3 px-4"style="margin-top:10px;margin-left:5px;" href="{{ route('date-off.create') }}">Dodaj datum</a>
<h1 class="text-center p-3 fw-bold">Neradni datumi</h1>


@if (session('status'))
<div class="alert alert-success" role="alert">
    {{session('status')}}
</div>
@endif
<div class=".container-fluid p-2">
    <div class="row py-3 px-2 border bg-secondary">
        <div class="col-sm-8">
            Datum
        </div>
        <div class="col-sm-4">
        </div>
    </div>
    @foreach ($date as $row)

    <div class="row p-2 border bg-light fw-bold">
        <div class="col-sm-8 fs-2">
            {{ date("d-m-Y",strtotime($row->noDate)) }}
        </div>

        <div class="col-sm-4 fs-2">
            <form action="{{ route('date-off.destroy', ['date_off' => $row->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger btn-sm p-3" style="width:60%;"value="Izbriši">
        </form>
    </div>
        </div>
    </div>
    @endforeach
</div>
@endsection