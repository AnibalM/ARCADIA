$(document).ready(function(){
    $('#example').DataTable({
      "processing": true,
      "serverSide": true,
      "language": {
                 "url": '{!! asset('/administradores/latino.json') !!}'
                  } ,
      "ajax": "{{ route('listar.docentes') }}",
      "columns":[
                        { "data": "idDocente"},
                        { "data": "Nombre"},
                        { "data": "Apellidos"},
                        { "data": "Tipo_Docente"}                     
                         
                  ]


    });



      });
 //listarDocente();    







  function listarDocente() {
    $('#example').DataTable({
      "processing": true,
      "serverSide": true,
      "language": {
                 "url": '{!! asset('/administradores/latino.json') !!}'
                  } ,
      "ajax": "{{ route('listar.docentes') }}",
      "columns" : [
                        { "data": "idDocente"},
                        { "data": "Nombre"},
                        { "data": "Apellidos"},
                        { "data": "Tipo_Docente"}//,
                        //{ "data": null,  render: function ( data, type, row ) {
                        //return " <button class='btn btn-xs btn-danger' onclick='eliminar("+ data.idDocente +")'>Elminar</button>" }
                         //}
                         
                  ]


    });



      };
 listarDocente();     
      
</script>  



$docente = docente::select('idDocente', 'Nombre', 'Apellidos', 'Tipo_Docente');
        return Datatables::of($docente)

        ->make(true);
        /*->addColumn('action', function($docentes){
            return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$docentes->idDocente.'"><i class="glyphicon 
            glyphicon-edit"></i>Editar</a>'
        })
        ->make(true)
    } 



    public function listar()
    {
        $docentes = docente::get();
        return Datatables::of($docentes)
        /*->addColumn('action', function($docentes){
            return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$docentes->idDocente.'"><i class="glyphicon 
            glyphicon-edit"></i>Editar</a>'
        })*/
        ->make(true);


    }




LA PRIMERA DE TODAS

public function listar()
    {

        return Datatables::of(Docente::get())->make(10);


    }