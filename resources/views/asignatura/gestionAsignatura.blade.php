@extends('layouts.administrador')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/alertify.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/themes/default.css') }}">
@endsection

@section('contenido')

<div class="page-header row no-gutters py-4 mb-3 border-bottom">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Asignaturas</span>
                <h3 class="page-title">Listados</h3>
                <button class="boton" data-toggle="modal" id="add_data"  style="position:relative; left:125px; top: -39px; padding: 5px 18px;font-size: 18px; border-style:none; border-radius:18px; border: 2px solid #0080FF; "> 
                Agregar</button>                
              </div>              
            </div>
            <div>
              <br>
              
              
                <h4><strong>GESTION ASIGNATURAS</strong></h4>
            </div>

             <div>
                    <div>
                      <div>
                 <!--EMPIEZA LA TABLA AQUI-->
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                 <thead>
            <tr>


                <th>Identificacion</th>
                <th>Nombre asignatura</th>                
                <th>Area asociada</th>
                <th>Estado</th>
                <th>Acciones</th>
                <!--<th>Acciones</th>-->
                
            </tr>
        </thead>
        <tbody>          
        
            
            
        </tbody>
        <tfoot>
            <tr>
                <th>Identificacion</th>
                <th>Nombre asignatura</th>                
                <th>Area asociada</th>
                <th>Estado</th>
                <th>Acciones</th>
                <!--<th>Acciones</th>-->
                
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
<div id="asignaturaModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="asignatura_form">
                <div class="modal-header">
                    <h5 class="modal-title"><b>REGISTRAR ASIGNATURA</b></h5>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   
                </div>
                <div class="modal-body">
                      <!--{{csrf_field()}}-->                    
                    <div class="alert alert-danger" id="div">
                     
                    </div> 
                        
                    <div class="form-group">
                        <label>Identificacion</label>
                        <input type="text" name="idAsignatura" id="idAsignatura" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Nombre de la Asignatura</label>
                        <input type="text" name="Nombre_Asignatura" id="Nombre_Asignatura" class="form-control" />
                    </div>                     
                    <div class="form-group">
                        <label for="areaasociada" class="col-form-label">Area Asociada:</label>
                        <select class="form-control" name="Area_idArea" id="Area_idArea">
                        @foreach($areas as $area)
                        <option value= "{{ $area->idArea }}">{{ $area->Tipo_area }}</option>
                        @endforeach
                        </select>
                        </div>
                      <div class="form-group">
                        <label for="estado" class="col-form-label">Estado:</label>
                        <select class="form-control" name="estado" id="estado">
                        <option>Habilitado</option>
                        <option>Deshabilitado</option>
                        </select>
                        </div>   
                       
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="asignatura_id" id="asignatura_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-outline-success" />
                    <button type="button" class="btn btn-outline-danger"" data-dismiss="modal">Cancelar</button>
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


    <script type="text/javascript">
    $(document).ready(function(){
    $('#example').DataTable({
      processing: true,
      serverSide: true,
      language: {
                 "url": '{!! asset('/administradores/latino.json') !!}'
                  } ,
      ajax: '{!! route('listar.asignatura') !!}',
      columns : [
                        
                        { data: 'idAsignatura', name: 'idAsignatura' },
                        { data: 'Nombre_Asignatura', name: 'Nombre_Asignatura' },
                        { data: 'Tipo_area', name: 'Tipo_area' },
                        { data: 'Estado', name: 'Estado' },
                        { data: "action", orderable:false, searchable:false}                
                         
                  ]


    });


          $('#add_data').click(function(){
           $('#asignaturaModal').modal('show');
           document.getElementById('asignatura_form').reset();
           $('#form_output').html('');
           $('#button_action').val('insert');
           $('#action').val('Agregar');
           $('#div').hide();
           //$('.modal-title').text('REGISTRAR AREA');
            });

        $('#asignatura_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url:"{{ route('guardar.asignatura') }}",  
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
                    document.getElementById('asignatura_form').reset();
                    $('#action').val('Agregar');
                    $('.modal-title').text('REGISTRAR ASIGNATURA');
                    $('#button_action').val('');
                    $('#example').DataTable().ajax.reload();
                    $('#asignaturaModal').modal('hide');
                    alertify.success(data.success);
                        }
                    }
                    
                      })
                        }); 


                    $(document).on('click', '.edit', function(){
                      var idAsignatura = $(this).attr("id"); 
                       $.ajaxSetup({
                          headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           }
                         });                      
                        $.ajax({
                          url:"{{route('fetch.asignatura')}}",
                          method:'GET',
                          data:{id:idAsignatura},
                          dataType:'json',
                          success:function(response){

                            $('#idAsignatura').val(response.idAsignatura);
                            $('#Nombre_Asignatura').val(response.Nombre_Asignatura);
                            $('#Area_idArea').val(response.Area_idArea);
                            $('#estado').val(response.Estado);                           
                            $('#asignatura_id').val(idAsignatura);                          
                            $('#asignaturaModal').modal('show');
                            $('#action').val('Editar');
                            $('.modal-title').text('EDITAR ASIGNATURA');
                            $('#button_action').val('update'); 
                            $('#div').hide();                 


                          }

                      })


                  });//FIN DEL DOCUMENTS EDITAR 



     });//CIERRE DEL DOCUMENTS

    </script>


    <script type="text/javascript"> 

        function eliminar(id){
        alertify.confirm('Eliminar Asignatura','¿Desea eliminar esta asignatura?', function(){ 
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
          $.post("{{ route('eliminar.asignatura') }}", {
          "id": id,         
          },
          function(response){
           alertify.success(response.message); 
           $('#example').DataTable().ajax.reload();
           });//FIN DEL AJAX
           },function(){ alertify.error('Cancelado')
         
           }).set({labels:{ok:'Aceptar', cancel: 'Cancelar'}});
           };//FIN DE LA FUNCION ELIMINAR        

      </script> 



@endsection
