<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <!--<link rel="stylesheet" href="{{ asset('administradores/bootstrap.css') }}">-->

        <title>INSTITUCION EDUCATIVA ARCADIA</title>
        <style>
        

        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        th, td {
          padding: 5px;
          text-align: left;
        }
        h1{
            text-align: center;
            position: relative;
            top: -80px;
            right: -370px;
            padding: 0px;
            margin: 0px;
            font-size: 25px;
        }

        img{
            width:128px;
            height:128px;
            position:relative;
            left:-150px;
        }
</style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
    <img src="images/Huila.png" alt="ARCADIA icon">                
    <h1 class="page-header">INSTITUCION EDUCATIVA ARCADIA</h1>
    <h2 class="page-header">Listado de Docentes</h2>
    <table style="width:100%">
            <tr>
                <th background="aqua">Cedula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Tipo Docente</th>
                <th>Telefono</th>
            </tr> 
            @foreach($docente as $docente)
            <tr>
                <td>{{ $docente->idDocente }}</td>
                <td>{{ $docente->Nombre }}</td>
                <td>{{ $docente->Apellidos }}</td>
                <td>{{ $docente->Tipo_Docente }}</td>
                <td>{{ $docente->Telefono }}</td>  
            </tr>
            @endforeach
    </table>    
    
                </div>
            </div>
        </div>
    </body>
</html>