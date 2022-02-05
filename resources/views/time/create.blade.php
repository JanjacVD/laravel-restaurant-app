@extends('layouts.nav')

@section('title', 'Dodaj vrijeme')

@section('content')

<h1 class="text-center p-3 fw-bold">Dodaj vrijeme</h1>

<div class=".container-fluid p-2">


    <form class="py-5" action="{{ route('time.store') }}" method="post">
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
        <div class="form-group row p-3 fw-bold fs-3">
            Vrijeme:<input name="avaliable_time" type="time" class="form-select form-select-lg my-3 mx-auto col-sm-8" style="width:95%;border-radius:10px; align-self:center">
        </div>
        <div class="form-group row p-3 fw-bold fs-3">
            Kapacitet:<input name="capacity" type="number" min="1" class="form-select form-select-lg my-3 mx-auto col-sm-8" style="width:95%;border-radius:10px; align-self:center">
        </div>
        <div class="form-group row">
            <div class="col-sm-12 py-2">
                <button type="submit" name="submit" class="btn btn-primary">Spremi</button>
            </div>
        </div>
    </form>
</div>

@endsection