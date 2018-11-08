<?php
// Permite Ingresar tareas, y mediante jquery ingresa prioridades
$usuario=$_GET['usu'];
$nombre_usuario=$_GET['nom_usu'];

include_once '../clases/ListaPrioridades.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ingresar Tarea</title>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<link rel="stylesheet" href="jquery-ui-1.11.4.custom/jquery-ui.css">

<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.autocomplete.min.js"></script>
<script type="text/javascript">
$(function(){

 var prioridad = [
   <?php
  for ($i=0; $i<count($listaprioridades); $i++){
    $param = explode("-",$listaprioridades[$i]);
      $col=($param[0]);
   ?>
    "<?php echo $col?>",
  <?php } ?>   
  ];


  $('#prioridad').autocomplete({
    lookup: prioridad,
    onSelect: function (suggestion) {
    }
  });



});



</script>


<style type="text/css">
  form { width:26em; padding:1em; margin:auto; border:double 7px black; }
  h3 { font-size:1.4em; color:blue; text-align:center; }
</style>
</head>


<form action='administrar_tarea.php' method='post'>
 <h3>Ingresar los datos de la Tarea para </h3>
 <h3><?php echo $nombre_usuario?></h3>


	<table>
		<tr>
			<td>Tarea:</td>
			<td> <input type='text' name='nombre' placeholder="Nombre de la Tarea"></td>
		</tr>
		<tr>
			<td>Prioridas:</td>
			<td>
			   <input type='text' name='prioridad' id="prioridad" placeholder="Ingrese prioridad">

			</td>
		</tr>
		<tr>
			<td>Fecha Vencimiento:</td>
			<td>
			   <input type='date' name='fecha_vencimiento' placeholder="Fecha de Vencimiento Tarea">
			   <input type='hidden' name='insertar' value='insertar'>
				<input type='hidden' name='usu' value=<?php echo $usuario ?> >
				<input type='hidden' name='nom_usu' value=<?php echo $nombre_usuario ?> >
			</td>
		</tr>
	</table>
	<input type='submit' value='Guardar'>
	<a href="mostrar.php?usu=<?php echo $usuario?>&nom_usu=<?php echo $nombre_usuario?>">Mostrar Tareas</a>

</form>
 
</html>