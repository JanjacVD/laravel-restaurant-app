@extends('layouts.nav')

@section('title', 'Osoblje')

@section('content')
<a class="btn btn-info btn-sm py-3 px-4"style="margin-top:10px;margin-left:5px;" href="{{ route('register') }}">Dodaj radnika</a>
<h1 class="text-center p-3 fw-bold">Osoblje</h1>

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{session('status')}}
</div>
@endif
<div class=".container-fluid p-2">
    <div class="row py-3 px-2 border bg-secondary fs-3">
        <div class="col-sm">
            Ime:
        </div>
        <div class="col-sm">
            Korisničko ime:
        </div>
        <div class="col-sm">
            Uloga:
        </div>
        <div class="col-sm">
        </div>
    </div>
    @foreach ($users as $row)

    <div class="row p-2 border bg-light fw-bold fs-3">
        <div class="col-sm">
           {{ $row->name }}
        </div>
        <div class="col-sm">
           {{ $row->username }}
        </div>
        <div class="col-sm">
           {{ $row->role }}
        </div>
        <div class="col-sm fs-1">
            <form action="{{ route('staff.destroy', ['staff' => $row->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger btn-sm p-1" onclick="return confirm('Are you sure you want to delete this user?')" style="width:100%" value="Izbriši">
        </form>
        <a href="{{ route('staff.edit', ['staff' => $row->id]) }}"class="btn btn-success btn-sm p-1" style="width:100%">Uredi</a>
    </div>
  
        </div>
    </div>
    @endforeach
</div>
@endsection