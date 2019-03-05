
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