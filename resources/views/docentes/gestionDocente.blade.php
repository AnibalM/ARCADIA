@extends('layouts.administrador')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/alertify.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/themes/default.css') }}">
@endsection


@section('contenido')  
<div class="page-header row no-gutters py-4 mb-3 border-bottom">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Docentes</span>
                <h3 class="page-title">Listados</h3>
                <button class="boton" data-toggle="modal" id="add_data" style="position:relative; left:125px; top: -39px; padding: 5px 18px;font-size: 18px; border-style:none; border-radius:18px; border: 2px solid #0080FF; "> 
                Agregar</button>                
              </div>              
            </div>
            <div>
                <a href="{{ route('docente.pdf') }}" class="btn btn-success">
                Descargar listado
                </a>
                <button type="button" id="agregar" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                Agregar Asignatura
                </button>               
                <br>
                <br>                
                <h4><strong>GESTION DOCENTES</strong></h4>
              </div>
              
                
                
                
              <!--<div clas>
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">LISTADO DE DOCENTE</h6>
                  </div> POR SI LA QUIERO DEJAR COMO ANTES-->
                  <div>
                    <div>
                      <div>
                 <!--EMPIEZA LA TABLA AQUI-->
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                 <thead>
            <tr>


                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellidos</th>                
                <th>Tipo Docente</th>
                <th>Correo</th>                
                <th>Estado</th>                
                <th>Acciones</th>
                
                
            </tr>
        </thead>
        <tbody>          
        
            
            
        </tbody>
        <tfoot>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellidos</th>                
                <th>Tipo Docente</th>
                <th>Correo</th>                
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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter"  role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form method="post" id="impartir">
                <div class="modal-header">
                    <h5><b>AGREGAR ASIGNATURA A IMPARTIR</b></h5>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>                   
                </div>
                <div class="modal-body"> 
                  <span id="error"></span>                     
                    <div class="form-group">
                        <label for="tipo" class="col-form-label"><b>Nombres del docente:</b></label>
                        <select class="form-control" name="Docente_idDocente" id="Docente_idDocente"> 
                        @foreach($docentes as $docente)                         
                        <option value="{{ $docente->idDocente}}">{{ $docente->Nombre}} {{ $docente->Apellidos }}</option>
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
   
<!--MODAL INSERTAR MODIFICAR-->
<div id="docenteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="docente_form">
                <div class="modal-header">
                    <h5 class="modal-title"><b>AGREGAR DOCENTE</b></h5>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   
                </div>
                <div class="modal-body">
                      <!--{{csrf_field()}}-->
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Cedula</label>
                        <input type="text" name="idDocente" id="idDocente" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" />
                    </div>
                     <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="tipo" class="col-form-label">Tipo de docente:</label>
                        <select class="form-control" name="tipo" id="tipo">
                        <option>Estable</option>
                        <option>Provisional</option>
                        </select>
                        </div>
                       <div class="form-group">
                        <label>Correo Electronico</label>
                        <input type="text" name="Email" id="Email" class="form-control" />
                    </div> 
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="text" name="contrasena" id="contrasena" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="tipo" class="col-form-label">Estado:</label>
                        <select class="form-control" name="Estado" id="Estado">
                        <option>Habilitado</option>
                        <option>Deshabilitado</option>
                        </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="docente_id" id="docente_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-outline-success" />
                    <button type="button" class="btn btn-outline-danger"" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--FIN MODAL INSERTAR MODIFICADO-->
@endsection

@section('scripts')
    
    <script type="text/javascript" src="{{ asset('administradores/scripts/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('administradores/scripts/datatables/dataTables.bootstrap4.min.js') }}"></script>
     <script src="{{ asset('administradores/alertifyjs/alertify.js') }}"></script>  



    <script type="text/javascript">
    $(document).ready(function(){
    $('#example').DataTable({
      processing: true,
      serverSide: true,
      language: {
                 "url": '{!! asset('/administradores/latino.json') !!}'
                  } ,
      ajax: '{!! route('listar.docentes') !!}',
      columns : [
                        
                        { data: 'idDocente', name: 'idDocente' },
                        { data: 'Nombre', name: 'Nombre' },
                        { data: 'Apellidos', name: 'Apellidos'},
                        { data: 'Tipo_Docente', name: 'Tipo_Docente'}, 
                        { data: 'Email', name: 'Email'},                      
                        { data: 'Estado', name: 'Estado'},
                        { data: "action", orderable:false, searchable:false}                      
                         
                  ]


    });//CIERRE DEL DATATABLES

           $('#add_data').click(function(){
           $('#docenteModal').modal('show');
           document.getElementById('docente_form').reset();
           $('#form_output').html('');
           $('#button_action').val('insert');
           $('#action').val('Agregar');
           $('.modal-title').text('AGREGAR DOCENTE');
            });

            $('#agregar').click(function(){
           
           document.getElementById('impartir').reset();
           $('#error').html('');
           
            });


        $('#docente_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();        
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url:"{{ route('guardar.docente') }}",
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
                    $('#form_output').html(error_html);
                }
                else
                {
                    
                    //$('#form_output').html(data.success);
                    document.getElementById('docente_form').reset();
                    $('#action').val('Agregar');
                    $('.modal-title').text('AGREGAR DOCENTE');
                    $('#button_action').val('insert');
                    $('#example').DataTable().ajax.reload();
                    $('#docenteModal').modal('hide');
                    alertify.success(data.success);
                        }
                    }
                    
                      })
                        });                    

                

                  $(document).on('click', '.edit', function(){
                      var idDocente = $(this).attr("id");
                       $('#form_output').html('');                    
                        $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                         });                        
                        $.ajax({
                          url:"{{route('fetch.docentes')}}",
                          method:'GET',
                          data:{id:idDocente},
                          dataType:'json',
                          success:function(response){

                            $('#idDocente').val(response.idDocente);
                            $('#nombre').val(response.Nombre);
                            $('#apellido').val(response.Apellidos);
                            $('#tipo').val(response.tipo);
                            $('#Email').val(response.Email);
                            $('#Estado').val(response.Estado);                           
                            $('#docente_id').val(idDocente);                          
                            $('#docenteModal').modal('show');
                            $('#action').val('Editar');
                            $('.modal-title').text('EDITAR DOCENTE');
                            $('#button_action').val('update');
                            

                          }

                      })


                  });//FIN DEL DOCUMENTS EDITAR

              });//FIN DEL DOCUMENTS...     
      
</script>  

      <!--<script type="text/javascript">   

      $(document).ready(function(){
      $("#guardar").click(function(){
        $.post("{{ route('guardar.docente') }}", {
          "cedula": $("#ceduladoc").val(),
          "nombres": $("#nombredoc").val(),
          "apellidos": $("#apellidodoc").val(),
          "correo": $("#correodoc").val(),
          "tipo": $("#tipodoc").val(),
          "contrasena": $("#contradoc").val()
        },
          function(response) {
          //console.log(response.message)
          alertify.success(response.message);     

          document.getElementById('formulario').reset()
          $("#example").dataTable().fnDestroy();
          listarDocente();
        });

        
        });

       
      });

 </script> -->

<script type="text/javascript"> 

      function eliminar(id){
      alertify.confirm('Eliminar Docente','¿Desea eliminar este docente?', function(){ 

          $.post("{{ route('eliminar.docente') }}", {
          "id": id,         
          },
          function(response){
           alertify.success(response.message); 
           $('#example').DataTable().ajax.reload();

          });//FIN DEL AJAX

           },function(){ alertify.error('CANCELADO')
         
         }).set({labels:{ok:'Aceptar', cancel: 'Cancelar'}});



         //FIN DEL ALERTIFY



              };//FIN DE LA FUNCION ELIMINAR        

</script>

<script type="text/javascript">
  
  $('#impartir').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();                 
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url:"{{ route('guardar.docente_asignatura') }}",
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





@endsection
