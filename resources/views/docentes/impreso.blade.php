<html>
    <head>
       <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/estilo.css">
        <style type="text/css">
           table, th, td {
          border: 1px solid black;
          border-collapse: collapse;

         
        }
        th, td {
          padding: 5px;
          text-align: left;
          text-align: center;
        } 

        </style>
    </head>
    
    <body>
        <div class="contenedor">
            <img src="images/Huila.png"> 
            <h1>Institución Educativa Arcadia</h1>
            <h2>INFORMACION DEL DOCENTE</h2>    
        </div>
        
        <div class="rojo">
        </div>
        <table style="width:100%;position:relative;top: -70px;">
                <tr><th>Cedula</th>
                    <td>{{ $docente->idDocente }}</td>
                </tr>    
                <tr><th>Nombres</th>
                    <td>{{ $docente->Nombre }}</td>
                </tr>
                <tr><th>Apellidos</th>
                    <td>{{ $docente->Apellidos }}</td>
                </tr>
                <tr><th>Edad</th>
                     <td>{{ $docente->Edad }}</td>
                 </tr>
                <tr><th>Dirección</th>
                    <td>{{ $docente->Direccion }}</td>
                </tr>
                <tr><th>Email</th>
                    <td>{{ $docente->Email }}</td>
                </tr>
                <tr><th>Tipo de contrato</th>
                    <td>{{ $docente->Tipo_Docente }}</td>
                </tr>
                <tr><th>Telefono</th>
                    <td>{{ $docente->Telefono }}</td>
                </tr>
        </table>       
        
    </body>
</html>