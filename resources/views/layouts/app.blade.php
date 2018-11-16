<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=-1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('styles')
</head>
<body>

	@if (\Auth::check())
		@if (\Auth::user()->ADMIN == 0)
			{{ \Auth::user()->Nombre }} {{ \Auth::user()->Apellidos }}
		@else
			Admin
		@endif
	@endif


    @yield('content')
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/axios.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
