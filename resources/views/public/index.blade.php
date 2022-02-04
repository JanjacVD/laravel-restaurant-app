@extends('layouts.public-nav')
@section('title','Naslovnica')
@section('content')

<!------HEADER-->
<header class="index-header">
    <div class="hero">
        <h1 class="title">RESTORAN & PIZZERIA <br>ŠIMUN</h1>
        @forelse ($time as $row)
        @if ($row->active == 1)
        <h2 class='hours'>RADNO VRIJEME:</h2>
        <h2 class='hours'>
            @if($row->day1 == 0)Pon @endif
            @if($row->day1 == 1)Uto @endif
            @if($row->day1 == 2)Sri @endif
            @if($row->day1 == 3)Čet @endif
            @if($row->day1 == 4)Pet @endif
            @if($row->day1 == 5)Sub @endif
            @if($row->day1 == 6)Ned @endif
            -
            @if($row->day2 == 0)Pon @endif
            @if($row->day2 == 1)Uto @endif
            @if($row->day2 == 2)Sri @endif
            @if($row->day2 == 3)Čet @endif
            @if($row->day2 == 4)Pet @endif
            @if($row->day2 == 5)Sub @endif
            @if($row->day2 == 6)Ned @endif
            <br>{{$row->time1}} - {{$row->time2}}
        </h2>
        @else
        <h2 class='hours'>Privremeno zatvoreno</h2>
        @endif
        @empty
        <h2 class='hours'>Privremeno zatvoreno</h2>
        @endforelse
    </div>
</header>



<!------------------------END OF HEADER-->




<section id="about">
    <img src="images/about.jpg" alt="Bottles of welcome drinks">
    <div class="aboutus-box">
        <h2 class="title-text">Upoznajte nas</h2>
        <p class="randomtext">
            Restoran & Pizzeria Šimun je obiteljski ugostiteljski objekt gdje možete uživati u dobroj hrani dok se osjećate kao kod kuće.
            Stvoren u 1997 iz vizije da se pruži jednostavno, ali toplo i ugodno iskustvo.
            Nudeći svježe proizvode svakog dana, pobrinut ćemo se da upamtite iskustvo vaše posjete.
            Smješten u centru malog, ali predivnog grada Vodica, nije teško naletjeti na nas.
            Uživajte u večeri na prekrasnoj terasi, popijte piće, ili možda dva i istražite čuda lokalne kuhinje.</p>
        <div class="buttons">
            <a class="about-btn" href="make-a-reservation">Rezervirajte stol</a>
            <a class="about-btn" href="make-a-reservation">Pogledajte meni</a>
        </div>
    </div>



    <div class="friendly-box">
        <div class="icon">
            <i class="fa fa-wheelchair" aria-hidden="true"></i>
            <p class="icon-text">Pristupačno za osobe s invaliditetom</p>
        </div>
        <div class="icon">
            <i class="fa fa-paw" aria-hidden="true"></i>
            <p class="icon-text">Pet friendly</p>
        </div>
        <div class="icon">
            <i class="fa fa-google-wallet" aria-hidden="true"></i>
            <p class="icon-text">Mogućnosti plaćanja s Google pay ili Apple pay</p>
        </div>
        <div class="icon">
            <i class="fa fa-credit-card" aria-hidden="true"></i>
            <p class="icon-text">Mogućnosti plaćanja s kreditnim ili debitnim karticama</p>
        </div>
        <div class="icon">
            <i class="fa fa-leaf" aria-hidden="true"></i>
            <p class="icon-text">Vegeterijanske opcije</p>
        </div>
        <div class="icon">
            <i class="fa fa-birthday-cake" aria-hidden="true"></i>
            <p class="icon-text">Mogućnost održavanja privatnih proslava</p>
        </div>
    </div>

</section>
@include('layouts.footer')
@endsection