@extends('layouts.nav')

@section('title', 'Postavke rezervacija')

@section('content')

<h1 class="text-center p-3 fw-bold">Postavke rezervacija</h1>

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{session('status')}}
</div>
@endif

    <div class="card">
      <div class="card-body fs-2">
        <h3 class="card-title">Status rezervacija</h3>
        <p class="card-text">Trenutni status rezervacija: @foreach ($status as $row)
         @if($row->status == 0)Zatvoreno @elseif ($row->status = 1)Zima @elseif ($row->status = 2)Ljeto @endif
         @endforeach
        <br>
        <a href="{{route('status.index') }}" class="btn btn-primary p-2">Upravljaj statusom</a>
        </p>
      </div>
    </div>
    <div class="card my-5">
      <div class="card-body">
        <h3 class="card-title">Vremena</h3>
        <p class="card-text"><a href="{{ route('time.index') }}" class="btn btn-primary p-2">Upravljaj vremenima</a></p>
      </div>
    </div>
  </div>
@endsection