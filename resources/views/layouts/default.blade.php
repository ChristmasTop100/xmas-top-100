<!DOCTYPE html>
<html>
<head>
	<title>Christmastop 100</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>

	<header>
		@yield('header')
	</header>

	<main>
		@yield('content')
	</main>

	<footer>
		@yield('footer')
	</footer>

	@yield('scripts')
</body>
</html>