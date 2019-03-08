  @extends('layouts.docente')
  @section('style')
  <style type="text/css">
    .hide {
      display: none !important;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="{{ asset('administradores/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/alertify.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/themes/default.css') }}">

  @endsection
  @section('contenido')
  <div class="page-header row no-gutters py-4 mb-3 border-bottom">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">ASIGNACION DE NOTAS</span>
      <h3 class="page-title">ESTUDIANTES</h3>
    </div>              
  </div>
  <div>
    <br>


    <h4><strong>GESTION DE NOTAS</strong></h4>
  </div>

  <div>
    <div>
      <div>
        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="tipo" class="col-form-label"><b>Nombres del curso:</b></label>
            <select onchange="consultar()" class="form-control" name="Curso_idCurso" id="Curso_idCurso">
              <option selected value="">--Elige--</option>                                                 
              @foreach($cursos as $curso)                         
              <option value="{{ $curso->idCurso}}">{{ $curso->Grado}}</option>
              @endforeach                                            
            </select>
          </div> 
          <div class="form-group col-md-2">
            <label for="tipo" class="col-form-label"><b>Asignatura:</b></label>
            <select onchange="consultar()" class="form-control" name="Asignatura_idAsignatura" id="Asignatura_idAsignatura">
              <option selected value="">--Elige--</option>  
              @foreach($asignaturas as $materia)
              <option value="{{ $materia->idAsignatura}}">{{ $materia->Nombre_Asignatura }}</option>
              @endforeach
            </select>
          </div>                         
        </div>
        <!--EMPIEZA LA TABLA AQUI-->
        <div id="tabla_contenedor"></div>


      <!--TERMINA LA TABLA AQUI-->

    </div>
  </div>
</div>
</div>

<br>
<br>
<br>
<br>




<footer class="main-footer d-flex p-2 px-3 bg-white border-top">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="#">ANDRES CACERES</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">-</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">ANIBAL MANJARREZ</a>
    </li>
                <!--
                <li class="nav-item">
                  <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Blog</a>
                </li>
              -->
            </ul>
            <span class="copyright ml-auto my-auto mr-2">Software
              <a href="http://www.unicesar.edu.co" rel="nofollow">Arcadia</a>
            </span>
          </footer>
        </main>
      </div>

    </main>
  </div>
</div> 

@endsection

@section('scripts')

<script type="text/javascript" src="{{ asset('administradores/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('administradores/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('administradores/alertifyjs/alertify.js') }}"></script>  


<script type="text/javascript">
  var countTabla = 0;
  function listar() {
    countTabla += 1;
    pintar();
      var id = $("#Curso_idCurso").val();
      $('#example_'+countTabla).DataTable({
        processing: true,
        serverSide: true,
        language: {
         "url": '{!! asset('/administradores/latino.json') !!}'
       },

       ajax:{
         url : '{!! route('listar.Estudiantescurso') !!}',
         type: "GET",
         data: {"id": id, "asignatura": $("#Asignatura_idAsignatura").val()},
       },             
       columns : [
         { data: 'idEstudiante', name: 'idEstudiante' },
         { data: 'Nom_Es', name: 'Nom_Es' },
         { data: 'Apell_Es', name: 'Apell_Es'},
         { data: 'Email_Es', name: 'Email_Es'} ,
         { data: 'nota1', name: null} ,
         { data: 'nota2', name: null} ,
         { data: 'nota3', name: null},
         { data: 'definitiva', name: null},
       ]
        });//CIERRE DEL DATATABLES
  
  }
  $(document).ready(()=>{
    pintar();
  });
  function pintar() {
    $("#tabla_contenedor").html(`
      <table id="example_${countTabla}" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>Identificacion</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Definitiva</th>
          </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
          <tr>
            <th>Identificacion</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Definitiva</th>
          </tr>
        </tfoot>
      </table>
    `);
  }
  function consultar() {
    if ($("#Asignatura_idAsignatura").val() && $("#Curso_idCurso").val()) listar();
  }
function guardar(campo,e, nota, idEstudiante) {
  if (e.keyCode == 13) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    let dat = {
      "curso": $("#Curso_idCurso").val(),
      "asignatura": $("#Asignatura_idAsignatura").val(),
      "estudiante": idEstudiante,
      "campo": campo,
      "nota": nota,
    }
    $.ajax({
      type: "POST",
      url: "{{ route('guardar.nota') }}",
      data: dat,
      success: (success) => {
        if (success.statusCode == 201) {
          $("#msg_" + campo + "_" + idEstudiante).removeClass("hide");
          $("#msg_" + campo + "_" + idEstudiante).text(success.statusText);
          listar();
        }
        else alert("no se pudo guardar la nota");
      },
      beforeSend: () => {
        $("#loading_" + campo + "_" + idEstudiante).removeClass("hide");
      },
      complete: () => {
        $("#loading_" + campo + "_" + idEstudiante).addClass("hide");        
      }
    });
  }
}
</script>
@endsection    