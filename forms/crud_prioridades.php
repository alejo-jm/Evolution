<?php
// Realiza validaciondes en la tabla prioridades
// incluye la clase Db
require_once('../clases/conexion.php');
require_once('../clases/prioridades.php');

	class CrudPrioridades{
		// constructor de la clase
		public function __construct(){}

		// método para consultar la prioridad recibe como parámetro un objeto con el nombre de la prioridad
		public function verificar_prioridad($nom_prioridad){
			$db=Db::conectar();
			$listaTareas=[];

			$select=$db->prepare('SELECT * FROM prioridades where nombre_prioridad=:nombre_prioridad ');
			$select->bindValue('nombre_prioridad',$nom_prioridad);
			$select->execute();

			foreach($select->fetchAll() as $tarea){
				$mytarea= new Prioridades();
				$mytarea->setId($tarea['id']);
				$mytarea->setCodprioridad($tarea['cod_prioridad']);
				$mytarea->setNomprioridad($tarea['nombre_prioridad']);
				$listaTareas[]=$mytarea;
			}
			return $listaTareas;
 
		}

 
 	}
?>