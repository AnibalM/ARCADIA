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
                    <h6 class="m-0">Listado de Docentes</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">CEDULA</th>
                          <th scope="col" class="border-0">NOMBRES</th>
                          <th scope="col" class="border-0">APELLIDOS</th>
                          <th scope="col" class="border-0">TIPO</th>
                          <th scope="col" class="border-0">ACCIONES</th>
                          
                        </tr>
                      </thead>
                      <tbody id="listar"></tbody>                     
                      
                    </table>
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
<script type="text/javascript" src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
     <script type="text/javascript">
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
          $.notify(response.message,"success");     

          document.getElementById('formulario').reset()
          listar();
        });

        
        });

      });
   </script> 

  <script type="text/javascript">
    $(document).ready(function(){
      listar()
    })
    function listar(){
      axios.get("{{ route('listar.docentes') }}")
      .then(function (response) {
        let trs = ""
        response.data.map(function(item){
          trs += `
            <tr>
              <th scope="col" class="border-0">${item.idDocente}</td>
              <td th scope="col" class="border-0">${item.Nombre}</td>
              <th scope="col" class="border-0">${item.Apellidos}</td>
              <th scope="col" class="border-0">${item.Tipo_Docente}</td>
              <th scope="col" class="border-0">
                <a class="btn btn-primary" href="editar-docente/${item.idDocente}">Editar</a>
                <button class="btn btn-danger" onclick="eliminar(${item.idDocente})">Eliminar</button>
              </td>
            </tr>
          `
        })
        $("#listar").html(trs)
      })
      .catch(function (error) {
        console.log(error);
      });
    } 

    function eliminar(id){
       axios.post("{{ route('eliminar.docente') }}", {
        "id": id
       })
      .then(function (response) {
        $.notify(response.data.message,"success");
        listar()
      })
      .catch(function (error) {
        console.log(error);
      });
    } 
    
  </script>
@endsection


