@extends('layouts.administrador')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/alertify.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/themes/default.css') }}">
@endsection

@section('contenido')  
<div class="page-header row no-gutters py-4 mb-3 border-bottom">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Estudiante</span>
                <h3 class="page-title">Listados</h3>
                <button class="boton" data-toggle="modal" id="add_data"  style="position:relative; left:125px; top: -39px; padding: 5px 18px;font-size: 18px; border-style:none; border-radius:18px; border: 2px solid #0080FF; "> 
                Agregar</button>                
              </div>              
            </div>
            <div>
              <br>
              
              
                <h4><strong>GESTION ESTUDIANTE</strong></h4>
            </div>

             <div>
                    <div>
                      <div>
                 <!--EMPIEZA LA TABLA AQUI-->
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                 <thead>
            <tr>


                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Estado</th>
                <th>Acciones</th>
                
            </tr>
        </thead>
        <tbody>          
        
            
            
        </tbody>
        <tfoot>
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Email</th>
                <th>Celular</th>
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

<div id=estudianteModal class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="post" id="estudiante_form">
                <div class="modal-header">
                    <h5 class="modal-title"><b>REGISTRAR ESTUDIANTE</b></h5>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   
                </div>
                <div class="modal-body">
                      <!--{{csrf_field()}}-->                    
                    <div class="alert alert-danger" id="div">                     
                    </div>                        
                    
                 <div class="form-row">
   				    <div class="form-group col-md-6">
     			    <label for="inputNombre">Nombre</label>
      			    <input type="text" class="form-control" name="Nom_Es" id="Nom_Es" placeholder="Nombre del estudiante">
    			</div>
    				<div class="form-group col-md-6">
     			    <label for="inputApellido">Apellido</label>
      			    <input type="text" class="form-control" name="Apell_Es" id="Apell_Es" placeholder="Apellido del estudiante">
    			</div>
    				<div class="form-group col-md-6">
      		    	<label for="inputTipo">Tipo de documento</label>
      				<select name="Tp_Documen_Es" id="Tp_Documen_Es" class="form-control">
       		    	<option selected value="">--Selecciona--</option>
        	    	<option>Cédula de ciudadanía (CC)</option>
        	    	<option>Tarjeta de identidad (TI)</option>
        	    	<option>Registro civil (RC)</option>        	    	
      		   	</select>
    				</div>
    			<div class="form-group col-md-6">
     			    <label for="inputidentificacion">Identificacion</label>
      			    <input type="text" class="form-control" name="idEstudiante" id="idEstudiante" placeholder="Numero de documento" onpaste="return false" onkeypress="return solonumero(event)" minlength="7" maxlength="10">
                <small id="id" name="id"  class="text-danger"></small>
    			</div>
    			<div class="form-group col-md-4">
      		    	<label for="inputTipo">Sexo:</label>
      				<select name="Sex_es" id="Sex_es" class="form-control">
       		    	<option selected value="">--Selecciona--</option>
        	    	<option>M</option>
        	    	<option>F</option>
      		   	    </select>	    				
  				</div>
  				<div class="form-group col-md-4">
     			    <label for="inputidentificacion">Edad</label>
      			    <input type="number" class="form-control" name="Edad_es" id="Edad_es" placeholder="Edad">
    			</div>
  				<div class="form-group col-md-4">
      		    	<label for="inputTipo">Estrato:</label>
      				<select name="Estrato_Es" id="Estrato_Es" class="form-control">
       		    	<option selected value="">--Selecciona--</option>
        	    	<option>1</option>
        	    	<option>2</option>
        	    	<option>3</option>
        	    	<option>4</option>
        	    	<option>5</option>
        	    	<option>6</option>
      		   	    </select>	    				
  				</div>
  				<div class="form-group col-md-6">
     			    <label for="inputEmail">Email</label>
      			    <input type="text" class="form-control" name="Email_Es" id="Email_Es" placeholder="Email del estudiante">
                <small id="correo" name="correo" class="text-danger"></small>
    			</div>
    			<div class="form-group col-md-6">
     			    <label for="inputdireccion">Direccion</label>
      			    <input type="text" class="form-control" name="Direcc_Es" id="Direcc_Es" placeholder="Direccion del estudiante">
    			</div>
    			 
   				    <div class="form-group col-md-6">
     			    <label for="inputNombre">Celular</label>
      			    <input type="text" class="form-control"  name="Celular_Es" id="Celular_Es" placeholder="Celular del estudiante">
    			</div>
    				<div class="form-group col-md-6">
     			    <label for="inputApellido">Telefono</label>
      			    <input type="text" class="form-control" name="Tel_Es" id="Tel_Es" placeholder="Telefono del estudiante" onpaste="return false" onkeypress="return solonumero(event)" minlength="7" maxlength="7">
                <small id="telefono" name="telefono" class="text-danger"></small>
    				</div>
    				<div class="form-group col-md-8">
     			    <label for="inputNombre">Acudiente</label>
      			    <input type="text" class="form-control" name="Nom_Acudiente" id="Nom_Acudiente" placeholder="Nombre del Acudiente">
    			</div>

    			<div class="form-group col-md-4">
      		    	<label for="inputTipo">Estado:</label>
      				<select name="Estado" id="Estado" class="form-control">
       		    	<option selected value="">--Selecciona--</option>
        	    	<option>Habilitado</option>
        	    	<option>Deshabilitado</option>
      		   	    </select>	    				
  				</div>
  
  
                       
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="estudiante_id" id="estudiante_id" value="" />
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
    
    <script type="text/javascript" src="{{ asset('administradores/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('administradores/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('administradores/alertifyjs/alertify.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/validacionEstudiante.js') }}"></script> 

    <script type="text/javascript">
    $(document).ready(function(){
      $("#id").css({
       "display" : "none"
      });
      $("#telefono").css({
       "display" : "none"
      });
      $("#correo").css({
       "display" : "none"
      });
    $('#example').DataTable({
      processing: true,
      serverSide: true,
      language: {
                 "url": '{!! asset('/administradores/latino.json') !!}'
                  } ,
      ajax: '{!! route('listar.estudiante') !!}',
      columns : [
                        
                        { data: 'idEstudiante', name: 'idEstudiante' },
                        { data: 'Nom_Es', name: 'Nom_Es' },
                        { data: 'Apell_Es', name: 'Apell_Es' },
                        { data: 'Edad_es', name: 'Edad_es' },
                        { data: 'Email_Es', name: 'Email_Es' },
                        { data: 'Celular_Es', name: 'Celular_Es' },
                        { data: 'Estado', name : 'Estado'},
                        { data: "action", orderable:false, searchable:false}                
                         
                  ]


    });

    $('#add_data').click(function(){
           $('#estudianteModal').modal('show');
           document.getElementById('estudiante_form').reset();
           $('#form_output').html('');
           $('#button_action').val('insert');
           $('#action').val('Agregar');
           $('#div').hide();
           //$('.modal-title').text('REGISTRAR AREA');
            });


    	$('#estudiante_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();       
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url:"{{ route('guardar.estudiante') }}",
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
                    document.getElementById('estudiante_form').reset();
                    $('#action').val('Agregar');
                    $('.modal-title').text('REGISTRAR ESTUDIANTE');
                    $('#button_action').val('');
                    $('#example').DataTable().ajax.reload();
                    $('#estudianteModal').modal('hide');
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
                      var idEstudiante = $(this).attr("id"); 
                       $.ajaxSetup({
                          headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           }
                         });                      
                        $.ajax({
                          url:"{{route('fetch.estudiante')}}",
                          method:'GET',
                          data:{id:idEstudiante},
                          dataType:'json',
                          success:function(response){

                            $('#idEstudiante').val(response.idEstudiante);
                            $('#Nom_Es').val(response.Nom_Es);
                            $('#Apell_Es').val(response.Apell_Es);
                            $('#Sex_es').val(response.Sex_es);
                            $('#Celular_Es').val(response.Celular_Es);
                            $('#Edad_es').val(response.Edad_es);
                            $('#Direcc_Es').val(response.Direcc_Es);
                            $('#Estrato_Es').val(response.Estrato_Es);
                            $('#Email_Es').val(response.Email_Es);
                            $('#Tp_Documen_Es').val(response.Tp_Documen_Es);
                            $('#Nom_Acudiente').val(response.Nom_Acudiente);
                            $('#Tel_Es').val(response.Tel_Es);
                            $('#Estado').val(response.Estado);

                            //FIN                          
                            $('#estudiante_id').val(idEstudiante);                          
                            $('#estudianteModal').modal('show');
                            $('#action').val('Editar');
                            $('.modal-title').text('EDITAR ESTUDIANTE');
                            $('#button_action').val('update'); 
                            $('#div').hide();                 


                          }

                      })


                  });//FIN DEL DOCUMENTS EDITAR 



     });//CIERRE DEL DOCUMENTS
</script>

<script type="text/javascript"> 

        function eliminar(id){
        alertify.confirm('Eliminar Estudiante','¿Desea eliminar este Estudiante?', function(){ 
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
          $.post("{{ route('eliminar.estudiante') }}", {
          "id": id,         
          },
          function(response){
           alertify.success(response.message); 
           $('#example').DataTable().ajax.reload();
           });//FIN DEL AJAX
           },function(){ alertify.error('CANCELADO')
         
           }).set({labels:{ok:'Aceptar', cancel: 'Cancelar'}});
           };//FIN DE LA FUNCION ELIMINAR        

      </script> 
@endsection  





