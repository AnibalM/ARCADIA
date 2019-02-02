<html>
    <head>
       <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    
    <body>
        <div class="contenedor">
            <img src="images/Huila.png"> 
            <h1>Institución Educativa Arcadia</h1>
        </div>
        
        <div class="rojo">
        </div>
        
        <h2>INFORMACION DEL DOCENTE</h2>

        <h3>Cedula: {{ $docente->idDocente }} </h3>
        <br>
        <h3>Apellido: {{ $docente->Apellidos }} </h3>
        <br>
        <h3>Nombre: {{ $docente->Nombre }} </h3>
        <br>
        <h3>Edad: {{ $docente->Edad }} </h3>
        <br>
        <h3>Dirección: {{ $docente->Direccion }} </h3>
        <br>
        <h3>Email: {{ $docente->Email }} </h3>
        <br>
        <h3>Tipo de Contrato: {{ $docente->Tipo_Docente }} </h3>
        <br>
        <h3>Telefono: {{ $docente->Telefono }}</h3>
        
    </body>
</html>