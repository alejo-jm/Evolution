function validarEmail(valor) {
  result=0;	
  correo= valor.trim();
  if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(correo)){
    result=0;
  } else {
	   	result=1;
  }
  return result
}
