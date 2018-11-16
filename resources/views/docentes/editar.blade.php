@extends('layouts.app')

@section('content')
	<a href="{{ route('home.admin') }}">Regresar</a>
	<form method="post" action="{{ route('actualizar.docente') }}" id="formulario">
		<h1>EDICIÓN DE DOCENTE</h1>
		<label>Cedula:</label><br>
		<input value="{{ $docente->idDocente }}" type="text" name="cedula" id="cedula"><br>
		<label>Nombres:</label><br>
		<input value="{{ $docente->Nombre }}" type="text" name="nombres" id="nombres"><br>
		<label>Apellidos</label><br>
		<input value="{{ $docente->Apellidos }}" type="text" name="apellidos" id="apellidos"><br>
		<label>Tipo de Docente</label><br>
		<select name="tipo" id="tipo"><br>
			<option>Estable</option>
			<option>Provisional</option>
		</select><br>	
		<label>Correo</label><br>
		<input value="{{ $docente->Email }}" type="text" name="correo" id="correo"><br>
		<label>Contraseña</label><br>
		<input type="text" name="contrasena" id="contrasena"><br><br>
		<button type="submit" name="guardar" id="guardar">Actualizar</button>
	</form>
@endsection

@section("scripts")
	<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tipo").val("{{ $docente->Tipo_Docente }}")
		})
	</script>
endsection