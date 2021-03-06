@extends('layouts.administrador')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/alertify.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/themes/default.css') }}">

@endsection


@section('contenido')  
<div class="page-header row no-gutters py-4 mb-3 border-bottom">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Areas</span>
                <h3 class="page-title">Listados</h3>
                <button class="boton" data-toggle="modal" id="add_data" name="add_data" style="position:relative; left:125px; top: -39px; padding: 5px 18px;font-size: 18px; border-style:none; border-radius:18px; border: 2px solid #0080FF; "> 
                Agregar</button>                
              </div>              
            </div>
            <div>
              <br>
              
              
                <h4><strong>GESTION AREAS</strong></h4>
            </div>

             <div>
                    <div>
                      <div>
                 <!--EMPIEZA LA TABLA AQUI-->
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                 <thead>
            <tr>


                <th>Identificacion</th>
                <th>Nombre area</th>
                <th>Estado</th>
                <th>Acciones</th>
                
            </tr>
        </thead>
        <tbody>          
        
            
            
        </tbody>
        <tfoot>
            <tr>
                <th>Identificacion</th>
                <th>Nombre area</th>
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
<div id="areaModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="area_form">
                <div class="modal-header">
                    <h5 class="modal-title"><b>REGISTRAR AREA</b></h5>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   
                </div>
                <div class="modal-body">
                      <!--{{csrf_field()}}-->                    
                    <div class="alert alert-danger" id="div">
                     
                    </div> 
                        
                    <div class="form-group">
                        <label>Identificacion</label>
                        <input type="text" name="idArea" id="idArea" class="form-control" onpaste="return false" onkeypress="return solonumero(event)" minlength="4" maxlength="4">
                        <small id="area" name="area"  class="text-danger">El numero debe ser de 4 digitos</small>
                    </div>
           
                    <div class="form-group">
                        <label>Nombre del area</label>
                        <input type="text" name="Tipo_area" id="Tipo_area" class="form-control" onpaste="return false" onkeypress="return sololetras(event)" minlength="8" maxlength="20">
                        <small id="nombre" name="nombre" class="text-danger">El nombre debe contener entre 8 y 20 letras</small>
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
                    <input type="hidden" name="area_id" id="area_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="action" id="action" value="Add" class="btn btn-outline-success" />
                    <button type="button" class="btn btn-outline-danger"" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--FIN MODAL INSERTAR MODIFICADO-->
@endsection
@section('scripts')
    
    <script type="text/javascript" src="{{ asset('administradores/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('administradores/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('administradores/alertifyjs/alertify.js') }}"></script>  
    <script type="text/javascript" src="{{ asset('js/validacionArea.js') }}"></script>
 <script type="text/javascript">

    $(document).ready(function(){
      $("#area").css({
       "display" : "none"
      });
      $("#nombre").css({
       "display" : "none"
      });
    $('#example').DataTable({
      processing: true,
      serverSide: true,
      language: {
                 "url": '{!! asset('/administradores/latino.json') !!}'
                  } ,
      ajax: '{!! route('listar.area') !!}',
      columns : [
                        
                        { data: 'idArea', name: 'idArea' },
                        { data: 'Tipo_area', name: 'Tipo_area' },
                        { data: 'Estado', name: 'Estado' },
                        { data: "action", orderable:false, searchable:false}                
                         
                  ]
    });

    $('#add_data').click(function(){ 
           let codigo = document.getElementById('idArea');
           codigo.readOnly = false;          
           $('#areaModal').modal('show');
           document.getElementById('area_form').reset();
           $('#form_output').html('');
           $('#button_action').val('insert');
           $('#action').val('Agregar');
           $('.modal-title').text('AGREGAR AREA');
           $('#div').hide();  
           $("#area").css({
             "display" : "none"
            });
            $("#nombre").css({
             "display" : "none"
            }); 
           });//FIN DEL ADD DATA

   
    $('#area_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url:"{{ route('guardar.area') }}",
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
                    let codigo = document.getElementById('idArea');
                    codigo.readOnly = false;
                    document.getElementById('area_form').reset();
                    $('#action').val('Agregar');
                    $('.modal-title').text('REGISTRAR AREA');
                    $('#button_action').val('');
                    $('#example').DataTable().ajax.reload();
                    $('#areaModal').modal('hide');
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
                      var idArea = $(this).attr("id");
                      let codigo = document.getElementById('idArea');
                      codigo.readOnly = true;
                       $.ajaxSetup({
                          headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           }
                         });                      
                        $.ajax({
                          url:"{{route('fetch.area')}}",
                          method:'GET',
                          data:{id:idArea},
                          dataType:'json',
                          success:function(response){
                            $('#idArea').val(response.idArea);
                            $('#Tipo_area').val(response.Tipo_area);
                            $('#estado').val(response.Estado);                           
                            $('#area_id').val(idArea);                          
                            $('#areaModal').modal('show');
                            $('#action').val('Editar');
                            $('.modal-title').text('EDITAR AREA');
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
           alertify.confirm('Eliminar Area','¿Desea eliminar esta Area?', function(){ 
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
          $.post("{{ route('eliminar.area') }}", {
          "id": id,         
          },
          function(response){
           if (response.error.length > 0){
           alertify.error(response.error);  
           } else{
            alertify.success(response.success);
           }           
           $('#example').DataTable().ajax.reload();
           });//FIN DEL AJAX
           },function(){ alertify.error('Cancelado')
         
           }).set({labels:{ok:'Aceptar', cancel: 'Cancelar'}}); 
        });
      </script>
@endsection    