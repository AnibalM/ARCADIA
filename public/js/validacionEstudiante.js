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
	let ced = $("#idEstudiante").val();
	let tel = $("#Tel_Es").val();		

    if(ced.length < 7 ){
       
  		 	i=parseInt(i+1);
   			$("#id").css({
				"display" : "block"
			});
			$("#id").text("el numero debe tener entre 7 y 10 nuneros");

  		 } else if(ced.charAt(0)==="0"){
  			 i=parseInt(i+1);
      		 $("#id").css({
        	 "display" : "block"
     	 });	     

      		$("#id").text("Cedula no debe comenzar con 0");
    		
    		}
  		 
  		 else{
  		 	
	          $("#id").css({
	       	  "display" : "none"
	        });
  		 }
  		 if (tel.charAt(0)!=="5"){
  		 	i=parseInt(i+1);
  		 	$("#telefono").css({
				"display" : "block"
			});
  		 	$("#telefono").text("EL telefono debe comenzar con 5");
  		 }else 	if(tel.length > "7" || tel.length < "7"){
	        i=parseInt(i+1);
	        $("#telefono").css({
	        "display" : "block"
	      	});
	      	$("#telefono").text("EL numero debe ser de 7 digitos");
       	}
  		  else {
  		 	$("#telefono").css({
	       	  "display" : "none"
	        });
  		 }

  	   let correo = $("#Email_Es").val();  	   
       let validar = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/;
       if(!validar.test(correo)){
         i=parseInt(i+1);
        $("#correo").css({
        "display" : "block"
      });

       }else{
          $("#correo").css({
        "display" : "none"
      });
       }

         if(i >= 1 ){
          return false; 
         }else{
         $("#areaEstudiante").submit(); 
         } 




});