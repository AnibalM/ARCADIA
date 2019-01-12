@extends('layouts.administrador')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/alertify.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administradores/alertifyjs/css/themes/default.css') }}">
<style type="text/css">
  .hide {
    display: none !important;
  }
</style>
@endsection


@section('contenido')  
<div class="page-header row no-gutters py-4 mb-3 border-bottom">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Areas</span>
                <h3 class="page-title">Listados</h3>
                <button class="boton" data-toggle="modal" id="add_data"  style="position:relative; left:125px; top: -39px; padding: 5px 18px;font-size: 18px; border-style:none; border-radius:18px; border: 2px solid #0080FF; "> 
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
                 <table class="table table-striped table-bordered" style="width:100%">
                 <thead>
            <tr>


                <th onclick="ordenar('idArea')">Identificacion</th>
                <th>Nombre area</th>
                <th>Estado</th>
                <th>Acciones</th>
                
            </tr>
        </thead>
        <tbody id="cuerpo_listado">          
        
            
            
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
    <div id="paginacion"></div>


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
                        <input type="text" name="idArea" id="idArea" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Nombre del area</label>
                        <input type="text" name="Tipo_area" id="Tipo_area" class="form-control" />
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
                    <input type="hidden" name="area_id" id="area_id" value="" />
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


 <script type="text/javascript">
  var ordenamiento = 'idArea';
  var formato = 'asc';
  var control_formato = 1;
  function ordenar(campo) {
    control_formato += 1;
    if (control_formato % 2 == 0) formato = 'desc';
    else formato = 'asc';
    ordenamiento = campo;
    consultar_listado();
  }
  function consultar_listado(url = "{{route('listar.area')}}") {
    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });                      
    $.ajax({
      url:url,
      method:'POST',
      data:{
        'orden': ordenamiento,
        'formato': formato,
      },
      dataType:'json',
      success:function(response){
        let datos = response.data;
        let paginacion = {
          'current_page': response.current_page,
          'first_page_url': response.first_page_url,
          'from': response.from,
          'last_page': response.last_page,
          'last_page_url': response.last_page_url,
          'next_page_url': response.next_page_url,
          'path': response.path,
          'per_page': response.per_page,
          'prev_page_url': response.prev_page_url,
          'to': response.to,
          'total': response.total,
        }
        $("#cuerpo_listado").html("")
        datos.map(function(item) {
          $("#cuerpo_listado").append(`
            <tr>
              <td>${item.idArea}</td>
              <td>${item.Tipo_area}</td>
              <td>${item.Estado}</td>
              <td></td>
            </tr>
          `);
        })
        let disable_anterior = '';
        if (paginacion.prev_page_url == null){
          disable_anterior = 'hide';
        }
        let disable_siguiente = '';
        if (paginacion.next_page_url == null){
          disable_siguiente = 'hide';
        }
        let numeros_anibal = paginacion.total;
        let btn_numeros_anibal = "";
        for(let i=1; i<=numeros_anibal; i++) {
          let tipo = 'default';
          if (i == paginacion.current_page) tipo = 'primary';
          btn_numeros_anibal += `
            <a href="http://localhost:8000/listar-area?page=${i}" class="pagination-a btn btn-${tipo}">${i}</a>
          `;
        }
        $("#paginacion").html(`
          <div class="btn-group">
            ${btn_numeros_anibal}
          </div>
        `);
      }
    })
  }
    $(document).ready(function(){
      $('body').on('click', '.pagination-a', function(e) {//con numeros
        //$('body').on('click', '.pager li a', function(e) {//para simple
            e.preventDefault();
            var url = $(this).attr('href');  
            consultar_listado(url);
            //window.history.pushState("", "", url);
        });
      consultar_listado();
    /*$('#example').DataTable({
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


    });*/

    $('#add_data').click(function(){
           $('#areaModal').modal('show');
           document.getElementById('area_form').reset();
           $('#form_output').html('');
           $('#button_action').val('insert');
           $('#action').val('Agregar');
           $('#div').hide();
           //$('.modal-title').text('REGISTRAR AREA');
            });

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

    <script type="text/javascript"> 

        function eliminar(id){
        alertify.confirm('Eliminar Area','¿Desea eliminar esta area?', function(){ 
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
          $.post("{{ route('eliminar.area') }}", {
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