@extends('layouts.public-nav')
@section('title','Menu')
@section('content')


<div class="banner">
    <div class="banner-box">
        <div class="banner-box-inner">
                <h3>Menu</h3>            
        </div>
    </div>
</div>

<div class="menu-category">
    @foreach ($section as $section_row)

    <p class="section-title">{{ $section_row->title }}</p>

    @foreach ($category as $category_row)

    @if ($category_row->section_id == $section_row->id)

    <p class="category-title">{{$category_row->title}}</p>

    @foreach ($food as $food_row)

    @if ($food_row->category_id == $category_row->id)

    <div class="food-item">

        <div class="title-price">

            <p class="food-title">{{$food_row->title}}</p>

            <p class="food-price">{{$food_row->price}} kn</p>


        </div>

        <div class="food-description">

            <p class="food-desc">{{$food_row->desc}}</p>

        </div>

    </div>
    @endif
    @endforeach
    @endif
    @endforeach
    @endforeach
    @endsection