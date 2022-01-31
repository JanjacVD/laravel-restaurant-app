@extends('layouts.nav')

@section('title', 'Dodaj neradni dan')

@section('content')

<h1 class="text-center p-3 fw-bold">Dodaj neradni dan</h1>

<div class=".container-fluid p-2">


    <form class="py-5" action="{{ route('day-off.store') }}" method="post">
        @csrf
        @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group row">
            <select name="day" class="form-select form-select-lg my-3 mx-auto col-sm-10" style="width:98%;border-radius:10px; align-self:center">
                <option value="0">Ponedjeljak</option>
                <option value="1">Utorak</option>
                <option value="2">Srijeda</option>
                <option value="3">Četvrtak</option>
                <option value="4">Petak</option>
                <option value="5">Subota</option>
                <option value="6">Nedjelja</option>
            </select>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 py-2">
                <button type="submit" name="submit" class="btn btn-primary">Spremi</button>
            </div>
        </div>
    </form>
</div>

@endsection