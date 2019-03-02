
function solonumero(e){

key=e.keycode || e.which;
teclado= String.fromCharCode(key);
numero="0123456789";
especiales="8-37-38-46";

teclado_especial=false;

for(var i in especiales){
	if(key==especiales[i]){
teclado_especial=true;
}

} 

if(numero.indexOf(teclado)==-1 && !teclado_especial){
       return false;
	}
}


function sololetras(e){
 key=e.keycode || e.which;

teclado=String.fromCharCode(key).toLowerCase();
 letras=" abcdefghijklmnopqrstuvwxyz";
 
especiales="8_37_38_46_164";

teclado_especial=false;

for(var i in especiales){

if(key==especiales[i]){
   teclado_especial=true;break;

}

}
if(letras.indexOf(teclado)==-1 && !teclado_especial){

    return false;	
}
}

$('#action').click(function(){
 		var i = 0;
      	var cod=$("#idCurso").val();       
       	if(cod.length > "2" || cod.length < "2"){
        i=parseInt(i+1);
        $("#curso").css({
        "display" : "block"
      	});
       	}else{
       
        $("#curso").css({
       	"display" : "none"
          });
       }  

		 if(i >= 1 ){
          return false; 
         }else{
         $("#cursoModal").submit(); 
         } 
  	   });





        function eliminar(id){
        alertify.confirm('Eliminar Curso','¿Desea eliminar este Curso?', function(){ 
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
          $.post("{{ route('eliminar.curso') }}", {
          "id": id,         
          },
          function(response){
           alertify.success(response.message); 
           $('#example').DataTable().ajax.reload();
           });//FIN DEL AJAX
           },function(){ alertify.error('CANCELADO')
         
           }).set({labels:{ok:'Aceptar', cancel: 'Cancelar'}});
           };//FIN DE LA FUNCION ELIMINAR        

    
