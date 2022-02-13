@extends('layouts.public-nav')
@section('title', __("messages.nav1") )
@section('index','index')
@section('content')

<!------HEADER-->
<header class="index-header">
    <div class="hero">
        <h1 style="text-transform:uppercase"class="title">{{__('messages.title')}}<br>ŠIMUN</h1>
        @forelse ($time as $row)
        @if ($row->active == 1)
        <h2 style="text-transform:uppercase"class='hours'>{{__('messages.work')}}</h2>
        <h2 class='hours'>
            @if($row->day1 == 0){{__('messages.mon')}} @endif
            @if($row->day1 == 1){{__('messages.tue')}} @endif
            @if($row->day1 == 2){{__('messages.wed')}} @endif
            @if($row->day1 == 3){{__('messages.thu')}} @endif
            @if($row->day1 == 4){{__('messages.fri')}} @endif
            @if($row->day1 == 5){{__('messages.sat')}} @endif
            @if($row->day1 == 6){{__('messages.sun')}} @endif
            -
            @if($row->day2 == 0){{__('messages.mon')}} @endif
            @if($row->day2 == 1){{__('messages.tue')}} @endif
            @if($row->day2 == 2){{__('messages.wed')}} @endif
            @if($row->day2 == 3){{__('messages.thu')}} @endif
            @if($row->day2 == 4){{__('messages.fri')}} @endif
            @if($row->day2 == 5){{__('messages.sat')}} @endif
            @if($row->day2 == 6){{__('messages.sun')}} @endif
            <br>{{$row->time1}} - {{$row->time2}}
        </h2>
        @else
        <h2 class='hours'>{{ __('messages.closed') }}</h2>
        @endif
        @empty
        <h2 class='hours'>{{ __('messages.closed') }}</h2>
        @endforelse
    </div>
</header>



<!------------------------END OF HEADER-->




<section id="about">
    <img src="images/about.jpg" alt="Bottles of welcome drinks">
    <div class="aboutus-box">
        <h2 class="title-text">{{__('messages.meet')}}</h2>
        <p class="randomtext">
           {{__('messages.about')}}</p>
        <div class="buttons">
            <a class="about-btn" href="make-a-reservation">{{__('messages.bookBtn')}}</a>
            <a class="about-btn" href="make-a-reservation">{{__('messages.menuBtn')}}</a>
        </div>
    </div>



    <div class="friendly-box">
        <div class="icon">
            <i class="fa fa-wheelchair" aria-hidden="true"></i>
            <p class="icon-text">{{__('messages.icon1')}}</p>
        </div>
        <div class="icon">
            <i class="fa fa-paw" aria-hidden="true"></i>
            <p class="icon-text">Pet friendly</p>
        </div>
        <div class="icon">
            <i class="fa fa-google-wallet" aria-hidden="true"></i>
            <p class="icon-text">{{__('messages.icon3')}}</p>
        </div>
        <div class="icon">
            <i class="fa fa-credit-card" aria-hidden="true"></i>
            <p class="icon-text">{{__('messages.icon4')}}</p>
        </div>
        <div class="icon">
            <i class="fa fa-leaf" aria-hidden="true"></i>
            <p class="icon-text">{{__('messages.icon5')}}</p>
        </div>
        <div class="icon">
            <i class="fa fa-birthday-cake" aria-hidden="true"></i>
            <p class="icon-text">{{__('messages.icon6')}}</p>
        </div>
    </div>

</section>
@include('layouts.footer')
@endsection