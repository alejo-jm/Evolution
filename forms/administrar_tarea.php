<?php
// Realiza validaciondes de la tarea
session_start();
//incluye la clase Tarea y CrudTarea
require_once('crud_tareas.php');
require_once('../clases/tareas.php');
require_once('crud_prioridades.php');
require_once('../clases/prioridades.php');
 
$crud= new CrudTareas();
$crud_prioridades= new CrudPrioridades();
$datos_tarea= new Tareas();
$datos_prioridad= new Prioridades();
 
	// si el elemento insertar no viene nulo llama al crud e inserta una tarea
    if (isset($_POST['insertar'])) {
		$datos_tarea->setUsuario($_POST['usu']);
		$datos_tarea->setNombre($_POST['nombre']);
		$datos_tarea->setPrioridad($_POST['prioridad']);
		$datos_tarea->setFechavencimiento($_POST['fecha_vencimiento']);
		//llama a la función insertar definida en el crud
		$crud->insertar($datos_tarea);
//		header('Location: mostrar.php?usu=$usu&nom_usu=$nombre_usu');
		$usu=$_POST['usu'];
		$nombre_usu=$_POST['nom_usu'];
        echo "<script>window.location='mostrar.php?usu=$usu&nom_usu=$nombre_usu'; </script>";										

	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza la tarea
	}elseif(isset($_POST['actualizar'])){
		$datos_tarea->setId($_POST['id']);
		$datos_tarea->setUsuario($_POST['usu']);
		$datos_tarea->setNombre($_POST['nombre']);
		$datos_tarea->setPrioridad($_POST['prioridad']);
		$datos_tarea->setFechavencimiento($_POST['fecha_vencimiento']); 
		$datos_prioridad->setNomprioridad($_POST['prioridad']);
		$nombre= $datos_prioridad->getNomprioridad();
		$encontro= $crud_prioridades->verificar_prioridad($nombre);
		if ($encontro) {
			$crud->actualizar($datos_tarea);
		}else{
			echo "<script>alert ('La Prioridad No existe, intente nuevamente');</script>";
		}
		
		$usu=$_POST['usu'];
		$nombre_usu=$_POST['nom_usu'];
        echo "<script>window.location='mostrar.php?usu=$usu&nom_usu=$nombre_usu'; </script>";										
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina una tarea
	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id']);
		$usu=$_GET['usu'];
		$nombre_usu=$_GET['nom_usu'];
        echo "<script>window.location='mostrar.php?usu=$usu&nom_usu=$nombre_usu'; </script>";										
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
	}elseif($_GET['accion']=='a'){
		header('Location: actualizar.php');
	}
?>