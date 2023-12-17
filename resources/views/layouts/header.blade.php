<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/eda2657632.js" crossorigin="anonymous"></script>
	<title>Social network</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

</head>
<body>

	<nav class="navbar navbar-dark navbar-expand-lg bg-dark px-lg-5">
		<div class="container-fluid">
		  <a href="/" class="navbar-brand me-5 fs-4">Socialty</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
			<div class="offcanvas-header">
			  <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
			  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body d-flex">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						@if(Auth::check())
							<a class="nav-link fs-5" href="{{ route('feed') }}">Home</a>
						@else
							<a class="nav-link fs-5" href="{{ route('index') }}">Home</a>
						@endif
					</li>
					<li class="nav-item">
						<a href="{{ route('about') }}" class="nav-link fs-5" href="#">About</a>
					</li>

					<li class="nav-item">
						<a href="{{ route('connect') }}" class="nav-link fs-5" href="#">Connect</a>
					</li>

				</ul>
				<ul class="navbar-nav justify-content-end">
				@if(Auth::check())
					<li class="nav-item">
						<a class="nav-link fs-5" href="{{ route('profile.index') }}"><i class="fa-solid fa-user me-2"></i>{{ Auth::user()->name }}</a>
					</li>
					<li class="nav-item">
						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<button class="btn nav-link fs-5"><i class="fa-solid fa-right-from-bracket me-2"></i>Log out</button>
						</form>
					</li>
				@else
					<li class="nav-item">
						<a class="nav-link fs-5" href="{{ route('login') }}">Log in</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fs-5" href="{{ route('register') }}">Sign up</a>
					</li>
				@endif
				</ul>
			</div>
		  </div>
		</div>
	  </nav>
