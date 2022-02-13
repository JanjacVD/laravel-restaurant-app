@extends('layouts.nav')

@section('title', 'Uredi sliku')

@section('content')
<h1 class="text-center p-3 fw-bold">{{$gallery->title}}</h1>
    <div class="position-absolute end-0 px-2 py-2">
        <form action="{{ route('gallery.destroy', ['gallery' => $gallery->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this photo?')" value="Izbriši">
        </form>
    </div>
    <div class="container-fluid p-2">
<form action="{{ route('gallery.update', ['gallery' => $gallery->id]) }}" method="post">
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
    <div class="container-fluid p-2">

        <div class="form-group row">
            <label for="title" class="col-sm-5 col-form-label">Naslov</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="title" id="title" value="{{ old ('title', optional($gallery ?? null)->title) }}">
            </div>
        </div>

        <div class=" form-group row">
            <label for="title_en" class="col-sm-5 col-form-label">Naslov engleski</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="title_en" id="title_en" value="{{ old ('title_en', optional($gallery ?? null)->title_en) }}">
            </div>
        </div>

        
        <div class=" form-group row">
                <label for="img_desc" class="col-sm-5 col-form-label">Opis</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="img_desc" id="img_desc" value="{{ old ('img_desc', optional($gallery ?? null)->img_desc) }}">
                </div>
            </div>

            <div class=" form-group row">
                <label for="img_desc_en" class="col-sm-5 col-form-label">Opis engleski</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="img_desc_en" id="img_desc_en" value="{{ old ('img_desc_en', optional($gallery ?? null)->img_desc_en) }}">
                </div>
            </div>

        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-5 pt-0">Aktivno</legend>
                <div class="col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" id="Yes" value="1" @if($gallery->active == 1) checked @endif >
                        <label class="form-check-label" for="Yes">
                            Da
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" id="No" value="0" @if($gallery->active == 0) checked @endif >
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