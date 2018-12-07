<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <title>INSTITUCION EDUCATIVA ARCADIA</title>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
    <h1 class="page-header">INSTITUCION EDUCATIVA ARCADIA</h1>
    <h2 class="page-header">Listado de Docentes</h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Tipo Docente</th>
                <th>Telefono</th>
            </tr>                            
        </thead>
        <tbody>
            @foreach($docente as $docente)
            <tr>
                <td>{{ $docente->idDocente }}</td>
                <td>{{ $docente->Nombre }}</td>
                <td>{{ $docente->Apellidos }}</td>
                <td>{{ $docente->Tipo_Docente }}</td>
                <td>{{ $docente->Telefono }}</td>                
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <!--<p>
        <a href="{{ route('docente.pdf') }}" class="btn btn-sm btn-primary">
            Descargar listado en PDF
        </a>
    </p>-->
 </div>
            </div>
        </div>
    </body>
</html>