@extends('layouts.nav')

@section('title', 'Poništi rezervaciju')

@section('content')

<h1 class="text-center p-3 fw-bold">Poništi rezervaciju</h1>
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{session('status')}}
</div>
@endif
<div class=".container-fluid p-2">


    <form class="py-5" action="{{ route('reservations.delete') }}" method="post">
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
            Broj rezervacije: <input name="order_number" type="text" class="form-select form-select-lg my-3 mx-auto col-sm-8" style="width:95%;border-radius:10px; align-self:center" required>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 py-2">
                <button type="submit" name="submit" class="btn btn-primary">Spremi</button>
            </div>
        </div>
    </form>
</div>

@endsection