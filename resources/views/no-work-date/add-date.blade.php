@extends('layouts.nav')

@section('title', 'Dodaj datum')

@section('content')

<h1 class="text-center p-3 fw-bold" id="date">Dodaj datum</h1>

<div class=".container-fluid p-2">


    <form autocomplete="off" class="py-5" action="{{ route('date-off.store') }}" method="post">
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
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Datum</span>
                </div>
                <input type="text" class="form-control" name="noDate" id="datepicker" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 py-2">
                <button type="submit" name="submit" class="btn btn-primary">Spremi</button>
            </div>
        </div>
    </form>
</div>
<script>
    $(function() {
        $("#datepicker").datepicker({
        dateFormat: 'yy/mm/dd'
        });
    });
</script>
@endsection
<script src="{{ mix('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ mix('js/jquery-1.13.1.js') }}"></script>
<link rel="stylesheet" href="{{ mix('css/jquery-1.13.1.css') }}">