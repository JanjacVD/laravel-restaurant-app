@extends('layouts.public-nav')
@section('index','noindex')
@section('title','Rezervacija uspješna')
@section('content')
@php
$url = asset('storage/images/thumbs/thumb');
@endphp
<h1 style="text-align:center;margin-top:20px;font-size:3.5rem;text-transform:uppercase;width:100%;background:#0692bd;color:#fff;letter-spacing:6px;">Galerija</h1>
<section id="index-gallery" class="wrapper-gallery">
    @foreach ($gallery as $row)
    <div class="gallery-image image{{$row->order}}">
        <div><a>{{$row->title}}</a></div>
    </div>
    <style>
#index-gallery .image{{$row->order}} {
    background-image: url('{{$url}}{{$row->order}}.jpg');
}
#index-gallery .desc-{{$row->order}}{
    display:none
}
</style>
<div class="img-desc desc-{{$row->order}}">{{$row->img_desc}}</div>
    @endforeach
</section>

<script src="{{ mix('js/gallery.js') }}" defer></script>
@include('layouts.footer')
@endsection