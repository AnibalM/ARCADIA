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
			$("#id").text("La identificacion debe tener entre 7 y 10 nuneros");

  		 } else if(ced.charAt(0)==="0"){
  			 i=parseInt(i+1);
      		 $("#id").css({
        	 "display" : "block"
     	 });	     

      		$("#id").text("identificacion no debe comenzar con 0");
    		
    		}
  		 
  		 else{
  		 	
	          $("#id").css({
	       	  "display" : "none"
	        });
  		 }
  		 	if(tel.length > "7" || tel.length < "7"){
	        i=parseInt(i+1);
	        $("#telefono").css({
	        "display" : "block"
	      	});
	      	$("#telefono").text("EL telefono debe ser de 7 digitos");
       		}else if (tel.charAt(0)!=="5"){  		 
  		 	i=parseInt(i+1);
  		 	$("#telefono").css({
				"display" : "block"
			});
  		 	$("#telefono").text("EL telefono debe comenzar con 5");
  		 	}
  		  else {
  		 	$("#telefono").css({
	       	  "display" : "none"
	        });
  		 }

  	   let correo = $("#Email_Es").val();  	   
       let validar = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;
       if(correo.length > "40" || correo.length < "5"){
       	i=parseInt(i+1);
        $("#correo").css({
        "display" : "block"
      	});
        $("#correo").text("El correo debe tener entre 5 y 40 valores");
        }
        else if(validar.test(correo) == false){
         i=parseInt(i+1);
        $("#correo").css({
        "display" : "block"
      	});
        $("#correo").text("Formato invalido [Ejemplo: usuario+@+servidor+dominio]");
        }else{
          $("#correo").css({
          "display" : "none"
      	   });         
        }

        let nombre = $("#Nom_Es").val();
        if(nombre.length > "20" || nombre.length < "3"){
       	i=parseInt(i+1);
        $("#nombre").css({
        "display" : "block"
      	});
        $("#nombre").text("El nombre debe tener entre 3 y 20 letras");
        }else{
          $("#nombre").css({
          "display" : "none"
      	   });         
        }
        let apellido = $("#Apell_Es").val();
        if(apellido.length > "20" || apellido.length < "3"){
       	i=parseInt(i+1);
        $("#apellido").css({
        "display" : "block"
      	});
        $("#apellido").text("El apellido debe tener entre 3 y 20 letras");
        }else{
          $("#apellido").css({
          "display" : "none"
      	   });         
        }
        let edad = $("#Edad_es").val();
        if(edad.length > "2" || edad.length < "2"){
	        i=parseInt(i+1);
	        $("#edad").css({
	        "display" : "block"
	      	});
	      	$("#edad").text("La edad debe ser de 2 digitos");
       		}else if (edad.charAt(0)==="0"){  		 
  		 	i=parseInt(i+1);
  		 	$("#edad").css({
				"display" : "block"
			});
  		 	$("#edad").text("La edad minima es de 10 años");
  		 	}
  		  else {
  		 	$("#edad").css({
	       	  "display" : "none"
	        });
  		 }
  		 let direccion = $("#Direcc_Es").val();
  		 if(direccion.length > "40" || direccion.length < "5"){
       	 i=parseInt(i+1);
         $("#direccion").css({
         "display" : "block"
      	 });
        $("#direccion").text("La direccion debe tener entre 5 y 40 valores");
        }else{
          $("#direccion").css({
          "display" : "none"
      	   });         
        }

        let celular = $("#Celular_Es").val();
        if(celular.length > "10" || celular.length < "10"){
	        i=parseInt(i+1);
	        $("#celular").css({
	        "display" : "block"
	      	});
	      	$("#celular").text("EL celular debe ser de 10 digitos");
       		}else if (celular.charAt(0)!=="3"){  		 
  		 	i=parseInt(i+1);
  		 	$("#celular").css({
				"display" : "block"
			});
  		 	$("#celular").text("EL numero de celular debe comenzar con 3");
  		 	}
  		  else {
  		 	$("#celular").css({
	       	  "display" : "none"
	        });
  		 }

  		let acudiente = $("#Nom_Acudiente").val();
  		if(acudiente.length > "15" || acudiente.length < "25"){
       	i=parseInt(i+1);
        $("#acudiente").css({
        "display" : "block"
      	});
        $("#acudiente").text("El nombre del acudiente debe tener entre 15 y 25 letras");
        }else{
          $("#acudiente").css({
          "display" : "none"
      	   });         
        }



         if(i >= 1 ){
          return false; 
         }else{
         $("#estudianteModal").submit(); 
         } 




});