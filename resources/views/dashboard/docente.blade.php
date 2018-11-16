@extends('layouts.app')

@section('content')
    <form action="{{ route('logout') }}" method="GET">
    	<button type="submit">Cerrar sesión</button>
    </form>
    Vista del docente
@endsection
