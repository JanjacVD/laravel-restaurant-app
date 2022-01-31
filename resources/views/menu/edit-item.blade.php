    @extends('layouts.nav')

    @section('title', 'Uredi odjeljak')

    @section('content')
    <h1 class="text-center p-3 fw-bold">{{$item->title}}</h1>
    <div class="position-absolute end-0 px-2 py-2">
        <form action="{{ route('food.destroy', ['food' => $item->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Izbriši">
        </form>
    </div>
    <div class="container-fluid p-2">


        <form class="py-5" action="{{ route('food.update', ['food' => $item->id]) }}" method="post">
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
                    <input type="text" class="form-control" name="title" id="title" placeholder="Naslov" value="{{ old ('title', optional($item ?? null)->title) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="title_en" class="col-sm-5 col-form-label">Naslov engleski</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Naslov engleski" value="{{ old('title_en', optional($item ?? null)->title_en) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="desc" class="col-sm-5 col-form-label">Opis</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="desc" id="desc" placeholder="Opis engleski" value="{{ old('desc', optional($item ?? null)->desc) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="desc_en" class="col-sm-5 col-form-label">Opis engleski</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="desc_en" id="desc_en" placeholder="Naslov engleski" value="{{ old('desc_en', optional($item ?? null)->desc_en) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-sm-5 col-form-label">Cijena</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" name="price" id="price" placeholder="Naslov engleski" value="{{ old('price', optional($item ?? null)->price) }}">
                </div>
            </div>
            <div class="form-group row">
            <select name="category_id" class="form-select form-select-lg my-3 mx-auto col-sm-10" style="width:98%;border-radius:10px; align-self:center">
                @forelse($category as $row)
                <option value="{{ $row->id }}" @if($item->category_id == $row->id) {{ 'selected' }}@endif>{{ $row->title }}</option>
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
                            <input class="form-check-input" type="radio" name="active" id="Yes" value="1" @if($item->active == '1'){{'checked'}}@endif >
                            <label class="form-check-label" for="Yes">
                                Da
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="active" id="No" value="0" @if($item->active == '0'){{'checked'}}@endif >
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