@extends('layouts.administrador')




@section('contenido')  
<div class="page-header row no-gutters py-4 mb-3 border-bottom">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Docentes</span>
                <h3 class="page-title">Listados</h3>
                <button class="boton" data-toggle="modal" data-target="#exampleModalCenter" style="position:relative; left:125px; top: -39px; padding: 5px 18px;font-size: 18px; border-style:none; border-radius:18px; border: 2px solid #0080FF; "> 
                Agregar</button>
              </div>
            </div>

                
                
                
                <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">LISTADO DE DOCENTE</h6>
                  </div>
                 <!--EMPIEZA LA TABLA AQUI-->
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                 <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Tipo</th>
                <th>Telefono</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>          
        
            
            
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
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
                <a class="nav-link" href="#">Andrés Cáceres</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">-</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Anibal Manjarrez</a>
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
              <a href="https://designrevision.com" rel="nofollow">La Arcadia</a>
            </span>
          </footer>
        </main>
      </div>
          
  </main>
      </div>
    </div> 
    <!-- Modal -->          
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>CREAR DOCENTE</b></h5>
        <button type="boton" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body">
        <form onsubmit="return false" id="formulario">
          <div class="form-group">
            <label for="documento" class="col-form-label">Cedula:</label>
            <input type="text" class="form-control" name="ceduladoc" id="ceduladoc">
          </div>
          <div class="form-group">
            <label for="nombre" class="col-form-label">Nombres:</label>
            <input type="text" class="form-control" name="nombredoc" id="nombredoc"></input>
          </div>
          <div class="form-group">
            <label for="apellido" class="col-form-label">Apellidos:</label>
            <input type="text" class="form-control" name="apellidodoc" id="apellidodoc"></input>
          </div>
          <div class="form-group">
            <label for="tipo" class="col-form-label">Tipo de docente:</label>
            <select class="form-control" name="tipodoc" id="tipodoc">
              <option>Estable</option>
          <option>Provisional</option>
            </select>
          </div>
          <div class="form-group">
            <label for="correo" class="col-form-label">Correo Electronico:</label>
            <input type="text" class="form-control" name="correodoc" id="correodoc"></input>
          </div>
          <div class="form-group">
            <label for="contraseña" class="col-form-label">Contraseña:</label>
            <input type="text" class="form-control" name="contradoc" id="contradoc"></input>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-outline-success" data-dismiss="modal" name="guardar" id="guardar">Registrar</button>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('scripts')

   
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
      });

 </script>   





@endsection
