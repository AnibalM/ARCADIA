 
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


 			$('#add_data').click(function(){
           $('#areaModal').modal('show');
           document.getElementById('area_form').reset();
           $('#form_output').html('');
           $('#button_action').val('insert');
           $('#action').val('Agregar');
           $('#div').hide();
           });//FIN DEL ADD DATA


 		$('#action').click(function(){
 		var i = 0;
      	var cod=$("#idArea").val();
       
       	if(cod.length > "4" || cod.length < "4"){
        i=parseInt(i+1);
        $("#area").css({
        "display" : "block"
      	});
       	}else{
       
        $("#area").css({
       	"display" : "none"
          });
       }  

       var nom=$("#Tipo_area").val();
       alert(nom.length);
       if(nom.length < "8" || nom.length > "20"){
        i=parseInt(i+1);
        $("#nombre").css({
        "display" : "block"
      	});
       	}else{
       
        $("#nombre").css({
       	"display" : "none"
          });
       } 


       if(i >= 1 ){
        return false; 
       }else{
       $("#areaModal").submit(); 
       } 
	   });

  