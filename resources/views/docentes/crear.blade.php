@extends('layouts.app')

@section("content")
	<a href="{{ route('home.admin') }}">Regresar</a>
	<form onsubmit="return false" id="formulario">
		<h1>REGISTRO DE DOCENTE</h1>
		<label>Cedula:</label><br>
		<input type="text" name="cedula" id="cedula"><br>
		<label>Nombres:</label><br>
		<input type="text" name="nombres" id="nombres"><br>
		<label>Apellidos</label><br>
		<input type="text" name="apellidos" id="apellidos"><br>
		<label>Tipo de Docente</label><br>
		<select name="tipo" id="tipo"><br>
			<option>Estable</option>
			<option>Provisional</option>
		</select><br>	
		<label>Correo</label><br>
		<input type="text" name="correo" id="correo"><br>
		<label>Contraseña</label><br>
		<input type="text" name="contrasena" id="contrasena"><br><br>
		<button name="guardar" id="guardar">Registrar</button>
	</form>

@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/notify.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#guardar").click(function(){
				$.post("{{ route('guardar.docente') }}", {
					"cedula": $("#cedula").val(),
					"nombres": $("#nombres").val(),
					"apellidos": $("#apellidos").val(),
					"correo": $("#correo").val(),
					"tipo": $("#tipo").val(),
					"contrasena": $("#contrasena").val()
				},
					function(response) {
					//console.log(response.message)
					$.notify(response.message,"success");			

					document.getElementById('formulario').reset()
				});
				
				});
			});
		
	</script>
@endsection
