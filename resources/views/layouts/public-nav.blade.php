<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="robots" content="@yield('index')">
	<link rel="stylesheet" type="text/css" href="{{ mix('css/style.css') }}">
	<link rel="stylesheet" href="{{ mix('css/main.css') }}">
	<script src="https://kit.fontawesome.com/55a6169dfd.js" defer crossorigin="anonymous"></script>
	<title>Restoran & Pizzeria Šimun - @yield('title')</title>
</head>

<body>
	<header class="header">
		<!-- Remove style in case of bugs -->
		<nav class="navbar">
			<span class="open-menu">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="16">
					<g fill="#252a32" fill-rule="evenodd">
						<path d="M0 0h24v2H0zM0 7h24v2H0zM0 14h24v2H0z" />
					</g>
				</svg>
			</span>
			<h1><a href="/" class="brand">Š I M U N</a></h1>
			<div class="menu-wrapper">
				<ul class="menu">
					<li class="menu-block">
						<span class="close-menu">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
								<path fill="#252a32" fill-rule="evenodd" d="M17.778.808l1.414 1.414L11.414 10l7.778 7.778-1.414 1.414L10 11.414l-7.778 7.778-1.414-1.414L8.586 10 .808 2.222 2.222.808 10 8.586 17.778.808z" />
							</svg>
						</span>
					</li>
					<li class="menu-item"><a href="{{ route('index') }}" class="menu-link">{{__('messages.nav1')}}</a></li>
					<li class="menu-item"><a href="{{ route('public.menu') }}" class="menu-link">{{__('messages.nav2')}}</a></li>
					<li class="menu-item"><a href="{{ route('public.booking') }}" class="menu-link">{{__('messages.nav3')}}</a></li>
					<li class="menu-item"><a href="{{ route('public.gallery') }}" class="menu-link">{{__('messages.nav4')}}</a></li>
					<li class="menu-item"><a href="{{ route('public.contact') }}" class="menu-link">{{__('messages.nav5')}}</a></li>
					<li class="menu-item lang-menu-triggered"><a style="display:flex;flex-direction:row;" href="/hr" class="menu-link @if (app()->getLocale() == 'hr') active-lang @endif ">HR <img style="max-height:15px;max-width:20px;height:auto;width:auto;margin-left:8px;"src="/images/croatia.svg"></a></li>					
					<li class="menu-item lang-menu-triggered"><a style="display:flex;flex-direction:row;" href="/en" class="menu-link @if (app()->getLocale() == 'en') active-lang @endif ">EN <img style="max-height:20px;max-width:20px;height:auto;width:auto;margin-left:8px;"src="/images/english.svg"></a></li>

				</ul>
			</div>
			<div class="lang-menu">
				<a class="lang-menu-lang menu-link @if (app()->getLocale() == 'hr') active-lang @endif " style="border-left:1px solid #8a8a8a;border-right:1px solid #8a8a8a;font-size:1.5rem" href="/hr">HR</a>
				<a class="lang-menu-lang menu-link @if (app()->getLocale() == 'en') active-lang @endif " style="font-size:1.5rem" href="/en">EN</a>
			</div>
		</nav>
	</header>
	<div class="py-4 my-5">
		@yield('content')
	</div>
<!-- COOKIES -->
@if (Cookie::get('cookiesAccepted'))
@else
	<div class="cookiepopup">
		<div class="cookiemsg">
			<h4 class="cookietitle">
				{{__('messages.cookie')}}
			</h4>
			<p class="cookienotif">{{__('messages.cookieuse')}} <a href="{{route('public.privacy')}}">{{__('messages.findOutMore')}}</a>
			</p>
		</div>
		<button onclick=acceptCookies() class="cookiebtn">{{__('messages.getit')}}</button>
	</div>
	<script>
		function acceptCookies(){
			document.cookie = "cookiesAccepted; expires=Fri, 31 Dec 9999 23:59:59 GMT";
			let cookiePopUp = document.querySelector('.cookiepopup');
			cookiePopUp.style.display = "none";
		}
	</script>
@endif
	<script>
		const openMenu = document.querySelector(".open-menu");
		const closeMenu = document.querySelector(".close-menu");
		const menuWrapper = document.querySelector(".menu-wrapper");
		const hasCollapsible = document.querySelectorAll(".has-collapsible");

		// Sidenav Toggle
		openMenu.addEventListener("click", function() {
			menuWrapper.classList.add("offcanvas");
		});

		closeMenu.addEventListener("click", function() {
			menuWrapper.classList.remove("offcanvas");
		});

		// Collapsible Menu
		hasCollapsible.forEach(function(collapsible) {
			collapsible.addEventListener("click", function() {
				collapsible.classList.toggle("active");

				// Close Other Collapsible
				hasCollapsible.forEach(function(otherCollapsible) {
					if (otherCollapsible !== collapsible) {
						otherCollapsible.classList.remove("active");
					}
				});
			});
		});
	</script>