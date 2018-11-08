<?php
// Realiza las sentencias sql a la tabla tareas
// incluye la clase Db
require_once('../clases/conexion.php');
require_once('../clases/tareas.php');
require_once('../clases/usuarios.php');

	class CrudTareas{
		// constructor de la clase
		public function __construct(){}

		// m�todo para consultar, recibe como par�metro un objeto de tipo tarea
		public function consultar($usu){
			$db=Db::conectar();
			$listaTareas=[];
			$select=$db->prepare('SELECT * FROM tareas where usuario=:usu ');
			$select->bindValue('usu',$usu);
			$select->execute();

			foreach($select->fetchAll() as $tarea){
				$mytarea= new Tareas();
				$mytarea->setId($tarea['id']);
				$mytarea->setNombre($tarea['nombre']);
				$mytarea->setPrioridad($tarea['prioridad']);
				$mytarea->setFechavencimiento($tarea['fecha_vencimiento']);
				$mytarea->setUsuario($tarea['usuario']);
				$listaTareas[]=$mytarea;
			}
			return $listaTareas;
 
		}

 
		// m�todo para insertar, recibe como par�metro un objeto de tipo libro
		public function insertar($tarea){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO tareas values(NULL,:nombre,:prioridad,:fecha_vencimiento,:usuario)');
			$insert->bindValue('nombre',$tarea->getNombre());
			$insert->bindValue('prioridad',$tarea->getPrioridad());
			$insert->bindValue('fecha_vencimiento',$tarea->getFechavencimiento());
			$insert->bindValue('usuario',$tarea->getUsuario());
			$insert->execute();
 
		}
  
		// m�todo para eliminar una tarea, recibe como par�metro el id de la tarea
		public function eliminar($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM tareas WHERE ID=:id');
			$eliminar->bindValue('id',$id);
			$eliminar->execute();
		}
 
		// m�todo para buscar un libro, recibe como par�metro el id de la tarea
		public function obtenertarea($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM tareas WHERE ID=:id');
			$select->bindValue('id',$id);
			$select->execute();
			$tarea=$select->fetch();
			$mytarea= new Tareas();
			$mytarea->setId($tarea['id']);
			$mytarea->setNombre($tarea['nombre']);
			$mytarea->setPrioridad($tarea['prioridad']);
			$mytarea->setFechavencimiento($tarea['fecha_vencimiento']);
			$mytarea->setUsuario($tarea['usuario']);
			return $mytarea;
		}
 
		// m�todo para actualizar un libro, recibe como par�metro la tarea
		public function actualizar($tarea){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE tareas SET nombre=:nombre, prioridad=:prioridad,fecha_vencimiento=:fecha_vencimiento,usuario=:usuario  WHERE ID=:id');
			$actualizar->bindValue('id',$tarea->getId());
			$actualizar->bindValue('nombre',$tarea->getNombre());
			$actualizar->bindValue('prioridad',$tarea->getPrioridad());
			$actualizar->bindValue('fecha_vencimiento',$tarea->getFechavencimiento());
			$actualizar->bindValue('usuario',$tarea->getUsuario());
			$actualizar->execute();
		}
	}
?>