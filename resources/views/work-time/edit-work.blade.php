@extends('layouts.nav')

@section('title', 'Dodaj radno vrijeme')

@section('content')

<h1 class="text-center p-3 fw-bold">Dodaj radno vrijeme</h1>

<div class=".container-fluid p-2">


    <form class="py-5" action="{{ route('work-time.update', ['work_time' => $time->id]) }}" method="post">
        @csrf
        @method('PUT')
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
                <option value="0" @if($time->day1 == 0){{'selected'}}@endif>Ponedjeljak</option>
                <option value="1" @if($time->day1 == 1){{'selected'}}@endif>Utorak</option>
                <option value="2" @if($time->day1 == 2){{'selected'}}@endif>Srijeda</option>
                <option value="3" @if($time->day1 == 3){{'selected'}}@endif>Četvrtak</option>
                <option value="4" @if($time->day1 == 4){{'selected'}}@endif>Petak</option>
                <option value="5" @if($time->day1 == 5){{'selected'}}@endif>Subota</option>
                <option value="6" @if($time->day1 == 6){{'selected'}}@endif>Nedjelja</option>
            </select>
        </div>
        <div class="form-group row p-3 fw-bold fs-3">
            Do:<select name="day2" class="form-select form-select-lg my-3 mx-auto col-sm-8" style="width:95%;border-radius:10px; align-self:center">
                <option value="0" @if($time->day2 == 0){{'selected'}}@endif>Ponedjeljak</option>
                <option value="1" @if($time->day2 == 1){{'selected'}}@endif>Utorak</option>
                <option value="2" @if($time->day2 == 2){{'selected'}}@endif>Srijeda</option>
                <option value="3" @if($time->day2 == 3){{'selected'}}@endif>Četvrtak</option>
                <option value="4" @if($time->day2 == 4){{'selected'}}@endif>Petak</option>
                <option value="5" @if($time->day2 == 5){{'selected'}}@endif>Subota</option>
                <option value="6" @if($time->day2 == 6){{'selected'}}@endif>Nedjelja</option>
            </select>
        </div>
        <div class="form-group row p-3 fw-bold fs-3">
            Od:<input name="time1" type="time" class="form-select form-select-lg my-3 mx-auto col-sm-8" style="width:95%;border-radius:10px; align-self:center" value="{{ old('time1', optional($time ?? null)->time1) }}">

        </div>
        <div class="form-group row p-3 fw-bold fs-3">
            Do:<input name="time2" type="time" class="form-select form-select-lg my-3 mx-auto col-sm-8" style="width:95%;border-radius:10px; align-self:center" value="{{ old('time2', optional($time ?? null)->time2) }}">
        </div>
<input name="active" value="{{$time->active}}" style='visibility:hidden;'>      
        <div class="form-group row">
            <div class="col-sm-12 py-2">
                <button type="submit" name="submit" class="btn btn-primary">Spremi</button>
            </div>
        </div>
    </form>
</div>

@endsection