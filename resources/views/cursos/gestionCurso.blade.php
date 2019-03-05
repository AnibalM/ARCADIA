@extends('layouts.administrador')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/alertify.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/themes/default.css') }}">
@endsection

@section('contenido')  
<div class="page-header row no-gutters py-4 mb-3 border-bottom">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Cursos</span>
                <h3 class="page-title">Listados</h3>
                <button class="boton" data-toggle="modal" id="add_data"  style="position:relative; left:125px; top: -39px; padding: 5px 18px;font-size: 18px; border-style:none; border-radius:18px; border: 2px solid #0080FF; "> 
                Agregar</button>                
              </div>              
            </div>
            <div>
              <button type="button" id="agregarAsignaturaCurso" class="btn btn-primary">
                Agregar Asignatura
                </button> 
                <button type="button" id="agregarEstudianteCurso" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter">
                Agregar Estudiantes
                </button>               
                <br>
                <br>  
              
              
                <h4><strong>GESTION CURSOS</strong></h4>
            </div>

             <div>
                    <div>
                      <div>
                 <!--EMPIEZA LA TABLA AQUI-->
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                 <thead>
            <tr>


                <th>Identificacion</th>
                <th>Grado</th>
                <th>Estado</th>
                <th>Acciones</th>
                
            </tr>
        </thead>
        <tbody>          
        
            
            
        </tbody>
        <tfoot>
            <tr>
                <th>Identificacion</th>
                <th>Grado</th>
                <th>Estado</th>
                <th>Acciones</th>
                
            </tr>
        </tfoot>
    </table>


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
     <!--MODAL INSERTAR MODIFICAR-->
<div id="cursoModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="curso_form">
                <div class="modal-header">
                    <h5 class="modal-title"><b>REGISTRAR CURSO</b></h5>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   
                </div>
                <div class="modal-body">
                      <!--{{csrf_field()}}-->                    
                    <div class="alert alert-danger" id="div">
                     
                    </div> 
                        
                    <div class="form-group">
                        <label>Identificacion</label>
                        <input type="text" name="idCurso" id="idCurso" class="form-control" onpaste="return false" onkeypress="return solonumero(event)" minlength="2" maxlength="2">
                        <small id="curso" name="curso"  class="text-danger">El numero debe ser de 2 digitos</small>
                    </div>
                    <div class="form-group">
                        <label>Grado</label>
                        <select class="form-control" name="Grado" id="Grado">
                        <option selected value="">--Selecciona--</option>	
                        <option value="6">Sexto</option>
                        <option value="7">Septimo</option>
                        <option value="8">Octavo</option>
                        <option value="9">Noveno</option>
                        <option value="10">Decimo</option>
                        <option value="11">Undecimo</option>
                        </select>
                    </div>                     
                    <div class="form-group">
                        <label for="estado" class="col-form-label">Estado:</label>
                        <select class="form-control" name="estado" id="estado">
                        <option selected value="">--Selecciona--</option>	
                        <option>Habilitado</option>
                        <option>Deshabilitado</option>
                        </select>
                        </div>
                       
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="curso_id" id="curso_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-outline-success" />
                    <button type="button" class="btn btn-outline-danger"" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--FIN MODAL INSERTAR MODIFICADO-->
<!-- Modal -->
<div class="modal fade" id="asignaturaCurso"  role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form method="post" id="asignar">
                <div class="modal-header">
                    <h5><b>AGREGAR ASIGNATURA A CURSO</b></h5>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>                   
                </div>
                <div class="modal-body"> 
                  <span id="error"></span>                     
                    <div class="form-group">
                        <label for="tipo" class="col-form-label"><b>Nombres del curso:</b></label>
                        <select class="form-control" name="Curso_idCurso" id="Curso_idCurso">                                                
                        @foreach($cursos as $curso)                         
                        <option >{{ $curso->Grado}}</option>
                        @endforeach                                            
                        </select>
                        </div>                      
                       <div class="form-group">
                        <label for="tipo" class="col-form-label"><b>Asignatura:</b></label>
                        <select class="form-control" name="Asignatura_idAsignatura" id="Asignatura_idAsignatura">
                        @foreach($asignaturas as $materia)
                        <option value="{{ $materia->idAsignatura}}">{{ $materia->Nombre_Asignatura }}</option>
                        @endforeach
                        </select>
                        </div>
                </div>               
            
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Asignar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="asignaturaEstudiante"  role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form method="post" id="asignarEstudiantes">
                <div class="modal-header">
                    <h5><b>AGREGAR ESTUDIANTE A CURSO</b></h5>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>                   
                </div>
                <div class="modal-body"> 
                  <span id="errorDos"></span>                     
                    <div class="form-group">
                        <label for="tipo" class="col-form-label"><b>Nombres del curso:</b></label>
                        <select class="form-control" name="curso_idCurso" id="curso_idCurso">                                                
                        @foreach($cursos as $curso)                         
                        <option value="{{ $curso->idCurso }}" >{{ $curso->Grado}}</option>
                        @endforeach                                            
                        </select>
                        </div>                      
                       <div class="form-group">
                        <label for="tipo" class="col-form-label"><b>Estudiante:</b></label>
                        <select class="form-control" name="estudiante_idEstudiante" id="estudiante_idEstudiante">
                        @foreach($estudiantes as $estudiante)
                        <option value="{{ $estudiante->idEstudiante}}">{{ $estudiante->Nom_Es }} {{ $estudiante->Apell_Es }}</option>
                        @endforeach
                        </select>
                        </div>
                </div>               
            
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Asignar</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('scripts')
    
    <script type="text/javascript" src="{{ asset('administradores/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('administradores/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('administradores/alertifyjs/alertify.js') }}"></script>  
     <script  src="{{ asset('js/validacionCurso.js') }}"></script> 

    <script type="text/javascript">
    $(document).ready(function(){
       $("#curso").css({
        "display" : "none"
          });
    $('#example').DataTable({
      processing: true,
      serverSide: true,
      language: {
                 "url": '{!! asset('/administradores/latino.json') !!}'
                  } ,
      ajax: '{!! route('listar.curso') !!}',
      columns : [
                        
                        { data: 'idCurso', name: 'idCurso' },
                        { data: 'Grado', name: 'Grado' },
                        { data: 'Estado', name: 'Estado' },
                        { data: "action", orderable:false, searchable:false}                
                         
                  ]


    });



           $('#add_data').click(function(){
           $('#cursoModal').modal('show');
           document.getElementById('curso_form').reset();
           $('#form_output').html('');
           $('#button_action').val('insert');
           $('#action').val('Agregar');
           $('#div').hide(); 
           $('.modal-title').text('REGISTRAR CURSO'); 
           let codigo = document.getElementById('idCurso');
           codigo.readOnly = false; 
            $("#curso").css({
             "display" : "none"
          });        
            });

           $('#agregarAsignaturaCurso').click(function(){
           $('#asignaturaCurso').modal('show');           
           $('#error').hide();
           });
           $('#agregarEstudianteCurso').click(function(){
           $('#asignaturaEstudiante').modal('show');           
           $('#errorDos').hide();
           });


    	$('#curso_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();               
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url:"{{ route('guardar.curso') }}",
            method:"POST",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
                if(data.error.length > 0)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<li>'+data.error[count]+'</li>';
                    }
                    $('#div').show();
                    $('#div').html(error_html);                   

                    //alert(form_data);
                }
                else
                {
                    
                    //$('#form_output').html(data.success);
                    document.getElementById('curso_form').reset();
                    $('#action').val('Agregar');
                    $('.modal-title').text('REGISTRAR CURSO');
                    $('#button_action').val('');
                    $('#example').DataTable().ajax.reload();
                    $('#cursoModal').modal('hide');
                    alertify.success(data.success);
                        }
                    },
                    error : function(xhr){
                      /*if (xhr.status == 500) {
                        alert(xhr.statusText)
                      }
                      else*/ if (xhr.status == 401) {
                        alert("Tiempo de sesion finalizado")
                        window.location.href = "/"
                      }
                    }
                    
                      })
                        });

    		 $(document).on('click', '.edit', function(){
                      var idCurso = $(this).attr("id");
                       let codigo = document.getElementById('idCurso');
                       codigo.readOnly = true;  
                       $.ajaxSetup({
                          headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           }
                         });                      
                        $.ajax({
                          url:"{{route('fetch.curso')}}",
                          method:'GET',
                          data:{id:idCurso},
                          dataType:'json',
                          success:function(response){

                            $('#idCurso').val(response.idCurso);
                            $('#Grado').val(response.Grado);
                            $('#estado').val(response.Estado);                           
                            $('#curso_id').val(idCurso);                          
                            $('#cursoModal').modal('show');
                            $('#action').val('Editar');
                            $('.modal-title').text('EDITAR CURSO');
                            $('#button_action').val('update'); 
                            $('#div').hide();                 


                          }

                      })


                  });//FIN DEL DOCUMENTS EDITAR 

    });//CIERRE DEL DOCUMENTS
    </script>
    
      <script>
        $(document).on('click', '.delete', function(){
          var id = $(this).attr("id");  
           alertify.confirm('Eliminar Curso','¿Desea eliminar este curso?', function(){ 
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
          $.post("{{ route('eliminar.curso') }}", {
          "id": id,         
          },
          function(response){
           alertify.success(response.message); 
           $('#example').DataTable().ajax.reload();
           });//FIN DEL AJAX
           },function(){ alertify.error('Cancelado')
         
           }).set({labels:{ok:'Aceptar', cancel: 'Cancelar'}}); 
        });
      </script>

      <script type="text/javascript">
       
  
  $('#asignar').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();                 
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url:"{{ route('guardar.curso_asignatura') }}",
            method:"POST",
            data:form_data,
            dataType:"json",
            success:function(data)
               {

                if(data.error.length > 0)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                    }
                    $('#error').show();
                    $('#error').html(error_html);

                }
                else
                {
                    
                    $('#exampleModalCenter').modal('hide');
                    alertify.success(data.success);
                   
                 }
                                      }



                  });    
                    
              
         });//FIN DE LA FUNCION

</script>
     <script type="text/javascript">   
     $('#asignarEstudiantes').on('submit', function(event){
          event.preventDefault();
          var form_data = $(this).serialize();                          
          $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
          $.ajax({
              url:"{{ route('guardar.curso_estudiante') }}",
              method:"POST",
              data:form_data,
              dataType:"json",
              success:function(data)
                 {

                  if(data.error.length > 0)
                  {
                      var error_html = '';
                      for(var count = 0; count < data.error.length; count++)
                      {
                          error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                      }
                      $('#errorDos').show();
                      $('#errorDos').html(error_html);
                   }
                else
                 {
                    $('#asignaturaEstudiante').modal('hide');
                    alertify.success(data.success);                   
                 }
                 }
         }); 
              });//FIN DE LA FUNCION
      </script>
@endsection   