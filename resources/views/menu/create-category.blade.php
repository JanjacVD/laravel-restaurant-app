@extends('layouts.nav')

@section('title', 'Stvori novu kategoriju')

@section('content')

<form action="{{ route('category.store'); }}" method="post">
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
    <div class="container-fluid p-2">

        <div class="form-group row">
            <label for="title" class="col-sm-5 col-form-label">Naslov</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="title" id="title" placeholder="Naslov" ">
                </div>
            </div>

            <div class=" form-group row">
                <label for="title_en" class="col-sm-5 col-form-label">Naslov engleski</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Naslov engleski" ">
                </div>
            </div>
            <div class=" form-group row">
                    <select name="section_id" class="form-select form-select-lg my-3 mx-auto col-sm-10" style="width:98%;border-radius:10px; align-self:center">
                        @forelse ($section as $row)
                        <option hidden selected disabled>Odjeljak</option>
                        <option value="{{ $row->id }}">{{ $row->title }}</option>
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