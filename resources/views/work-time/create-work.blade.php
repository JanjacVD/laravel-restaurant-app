@extends('layouts.nav')

@section('title', 'Dodaj radno vrijeme')

@section('content')

<h1 class="text-center p-3 fw-bold">Dodaj radno vrijeme</h1>

<div class=".container-fluid p-2">


    <form class="py-5" action="{{ route('work-time.store') }}" method="post">
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
            Od:<select name="day1" class="form-select form-select-lg my-3 mx-auto col-sm-8" style="width:95%;border-radius:10px; align-self:center">
                <option value="0">Ponedjeljak</option>
                <option value="1">Utorak</option>
                <option value="2">Srijeda</option>
                <option value="3">Četvrtak</option>
                <option value="4">Petak</option>
                <option value="5">Subota</option>
                <option value="6">Nedjelja</option>
            </select>
        </div>
        <div class="form-group row p-3 fw-bold fs-3">
            Do:<select name="day2" class="form-select form-select-lg my-3 mx-auto col-sm-8" style="width:95%;border-radius:10px; align-self:center">
                <option value="0">Ponedjeljak</option>
                <option value="1">Utorak</option>
                <option value="2">Srijeda</option>
                <option value="3">Četvrtak</option>
                <option value="4">Petak</option>
                <option value="5">Subota</option>
                <option value="6">Nedjelja</option>
            </select>
        </div>
        <div class="form-group row p-3 fw-bold fs-3">
            Od:<input name="time1" type="time" class="form-select form-select-lg my-3 mx-auto col-sm-8" style="width:95%;border-radius:10px; align-self:center">

        </div>
        <div class="form-group row p-3 fw-bold fs-3">
            Do:<input name="time2" type="time" class="form-select form-select-lg my-3 mx-auto col-sm-8" style="width:95%;border-radius:10px; align-self:center">
        </div>
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-5 pt-0">Aktivno</legend>
                <div class="col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" id="Yes" value="1">
                        <label class="form-check-label" for="Yes">
                            Da
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" id="No" value="0">
                        <label class="form-check-label" for="No">
                            Ne
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <div class="col-sm-12 py-2">
                <button type="submit" name="submit" class="btn btn-primary">Spremi</button>
            </div>
        </div>
    </form>
</div>

@endsection