@extends('layouts.public-nav')
@section('title', 'Privacy-policy' )
@section('index','noindex')
@section('content')
<div style="padding:1rem 2rem;">
<h1>{{__('messages.pp4')}} Ugostiteljski Obrt &quot;Šimun&quot;</h1>

<p>{{__('messages.firstline')}}</p>

<p>{{__('messages.secondline')}}</p>

<p>{{__('messages.thirdline')}}</p>

<h2>{{__('messages.conset')}}</h2>

<p>{{__('messages.fourthline')}}</p>

<h2>{{__('messages.collection')}}</h2>

<p>{{__('messages.fifthline')}}</p>

<h2>{{__('messages.howuse')}}</h2>

<p>{{__('messages.sixthline')}}</p>

<h2>Log Files</h2>

<p>Restoran & Pizzeria Šimun {{__('messages.seventline')}}</p>

<h2>{{__('messages.cookies')}}</h2>

<p>{{__('messages.seventhline')}}</p>

<h2>{{__('messages.child')}}</h2>

<p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

<p>Restoran &amp; Pizzeria Šimun does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>
</div>
@include('layouts.footer')
@endsection