<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" href="{{ asset('administradores/bootstrap.css') }}">-->
        <link rel="stylesheet" type="text/css" href="css/reporte.css">
        <title>INSTITUCION EDUCATIVA ARCADIA</title>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
    <h1 class="page-header">INSTITUCION EDUCATIVA ARCADIA</h1>
    <h2 class="page-header">Informacion del Docente</h2>
    {{ $docente->idDocente }} <br>
    {{ $docente->Nombre }} <br>
    {{ $docente->Apellidos }}<br>
    {{ $docente->Telefono }}<br>
    {{ $docente->Tipo_Docente }}
    
 </div>
            </div>
        </div>
    </body>
</html>