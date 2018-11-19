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
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008/11/28</td>
                <td>$162,700</td>
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012/12/02</td>
                <td>$372,000</td>
            </tr>
            <tr>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012/08/06</td>
                <td>$137,500</td>
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010/10/14</td>
                <td>$327,900</td>
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009/09/15</td>
                <td>$205,500</td>
            </tr>
            <tr>
                <td>Sonya Frost</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td>2008/12/13</td>
                <td>$103,600</td>
            </tr>
            <tr>
                <td>Jena Gaines</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td>2008/12/19</td>
                <td>$90,560</td>
            </tr>
            <tr>
                <td>Quinn Flynn</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2013/03/03</td>
                <td>$342,000</td>
            </tr>
            <tr>
                <td>Charde Marshall</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
                <td>2008/10/16</td>
                <td>$470,600</td>
            </tr>
            <tr>
                <td>Haley Kennedy</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
                <td>2012/12/18</td>
                <td>$313,500</td>
            </tr>
            <tr>
                <td>Tatyana Fitzpatrick</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
                <td>2010/03/17</td>
                <td>$385,750</td>
            </tr>
            <tr>
                <td>Michael Silva</td>
                <td>Marketing Designer</td>
                <td>London</td>
                <td>66</td>
                <td>2012/11/27</td>
                <td>$198,500</td>
            </tr>
            <tr>
                <td>Paul Byrd</td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
                <td>2010/06/09</td>
                <td>$725,000</td>
            </tr>
            <tr>
                <td>Gloria Little</td>
                <td>Systems Administrator</td>
                <td>New York</td>
                <td>59</td>
                <td>2009/04/10</td>
                <td>$237,500</td>
            </tr>
            <tr>
                <td>Bradley Greer</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>41</td>
                <td>2012/10/13</td>
                <td>$132,000</td>
            </tr>
            <tr>
                <td>Dai Rios</td>
                <td>Personnel Lead</td>
                <td>Edinburgh</td>
                <td>35</td>
                <td>2012/09/26</td>
                <td>$217,500</td>
            </tr>
            
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

<!--hola-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <!--FIN HOLA-->  
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
      });

 </script>   

<!--<script type="text/javascript" src="{{ asset('js/axios.min.js') }}"></script>
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
    
  </script>-->
@endsection
