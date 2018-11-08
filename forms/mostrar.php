<?php
// Muestra datos de la tarea
//incluye la clase Tareas y CrudTareas
require_once('crud_tareas.php');
require_once('../clases/tareas.php');
$crud=new CrudTareas();
$tarea= new Tareas();
$usuario=$_GET['usu'];
$nombre_usuario=$_GET['nom_usu'];
$fecha=date("Y-m-d");
//obtiene todos los libros con el método mostrar de la clase crud
$listatareas=$crud->consultar($usuario);
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Actualizar Tarea</title>
<style type="text/css">
  form { width:36em; padding:1em; margin:auto; border:double 7px black; }
  h3 { font-size:1.4em; color:blue; text-align:center; }
</style>
</head>

<body>
	<form>
	<a href="../index.php" title="Salir del Sistema" >Salir del Sistema</a>
		
	 		<h3>Tareas de</h3>
	 		<h3><?php echo $nombre_usuario?></h3>
		
	<table border=1>

			<td>Nombre</td>
			<td>Prioridad</td>
			<td>Fecha Vencimiento</td>
			<td>Gestion</td>			
			<td>Actualizar</td>
			<td>Eliminar</td>

			<?php foreach ($listatareas as $tarea) {?>
			<tr>
				<td nowrap=""><?php echo $tarea->getNombre() ?></td>
				<td> <?php echo $tarea->getPrioridad()?></td>

				<td><?php echo $tarea->getFechaVencimiento()?> </td>
				<td><?php if ( $tarea->getFechaVencimiento() >= $fecha ) {?>
					          <a style="color: red" > <?php  echo "Por Vencer"; ?> </a>
					<?php }else{
					          echo "Vencida";						  	
						  }?> 
					  </td>				
				<td><a href="actualizar.php?id=<?php echo $tarea->getId()?>&accion=a&usu=<?php echo $usuario?>&nom_usu=<?php echo $nombre_usuario?>" >Actualizar</a> </td>
				<td><a href="administrar_tarea.php?id=<?php echo $tarea->getId()?>&accion=e&usu=<?php echo $usuario?>&nom_usu=<?php echo $nombre_usuario?>">Eliminar</a>   </td>
			</tr>
			<?php }?>
	</table>
	<br>
	<br>
	<a href="ingresar_tarea.php?usu=<?php echo $usuario?>&nom_usu=<?php echo $nombre_usuario?>" title="Ingresar Nueva Tarea" >Ingresar Nueva Tarea</a>
 </form>	
</body>
</html>