@extends('layouts.nav')

@section('title', 'Uredi kategoriju')

@section('content')
<h1 class="text-center p-3 fw-bold">{{$category->title}}</h1>
<div class="position-absolute end-0 px-2 py-2">
    <form action="{{ route('category.destroy', ['category' => $category->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="Izbriši">
    </form>
</div>
<div class=".container-fluid p-2">


    <form class="py-5" action="{{ route('category.update', ['category' => $category->id]) }}" method="post">
        @csrf
        @method('PUT')
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group row">
            <label for="title" class="col-sm-5 col-form-label">Naslov</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="title" id="title" placeholder="Naslov" value="{{ old('title', optional($category ?? null)->title) }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="title_en" class="col-sm-5 col-form-label">Naslov engleski</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Naslov engleski" value="{{ old ('title_en', optional($category ?? null)->title_en) }}">
            </div>
        </div>

        <div class="form-group row">
            <select name="section_id" class="form-select form-select-lg my-3 mx-auto col-sm-10" style="width:98%;border-radius:10px; align-self:center">
                @forelse ($section as $section_row)
                <option value="{{ $section_row->id }}" @if($section_row->id == $category->section_id) {{'selected'}} @endif >{{ $section_row->title }}</option>
                @empty
                <option value="0">{{ 'Nema dodanih odjeljaka' }}</option>
                @endforelse
            </select>
        </div>

        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-5 pt-0">Aktivno</legend>
                <div class="col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" id="Yes" value="1" @if($category->active == '1'){{'checked'}}@endif >
                        <label class="form-check-label" for="Yes">
                            Da
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" id="No" value="0" @if($category->active == '0'){{'checked'}}@endif >
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