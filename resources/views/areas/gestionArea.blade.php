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
                <button class="boton" data-toggle="modal" id="add_data"  style="position:relative; left:125px; top: -39px; padding: 5px 18px;font-size: 18px; border-style:none; border-radius:18px; border: 2px solid #0080FF; "> 
                Agregar</button>                
              </div>              
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
               
                
            </tr>
        </thead>
        <tbody>          
        
            
            
        </tbody>
        <tfoot>
            <tr>
                <th>Identificacion</th>
                <th>Nombre area</th>
                <th>Estado</th>
               
                
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
      ajax: '{!! route('listar.area') !!}',
      columns : [
                        
                        { data: 'idArea', name: 'idArea' },
                        { data: 'Tipo_area', name: 'Tipo_area' },
                        { data: 'Estado', name: 'Estado' }                
                         
                  ]


    });
    });

    </script>
@endsection    