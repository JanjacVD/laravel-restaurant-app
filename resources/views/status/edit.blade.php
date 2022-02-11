@extends('layouts.nav')

@section('title', 'Promijeni status')

@section('content')

<h1 class="text-center p-3 fw-bold">Promijeni status</h1>

<div class=".container-fluid p-2">


    <form class="py-5" action="{{ route('status.update', ['status' => $status->id]) }}" method="POST">
        @csrf
        @method('put')
        @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <fieldset class="form-group fs-2">
            <div class="row">
                <legend class="col-form-label col-sm-5 pt-0">Status</legend>
                <div class="col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="Closed" value="0" @if($status->status == 0) checked @endif>
                        <label class="form-check-label" for="Closed">
                            Zatvoreno
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="Winter" value="1" @if($status->status == 1) checked @endif>
                        <label class="form-check-label" for="Winter">
                            Zima
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="Summer" value="2" @if($status->status == 2) checked @endif>
                        <label class="form-check-label" for="Summer">
                            Ljeto
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