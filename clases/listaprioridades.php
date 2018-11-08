<?php

require_once('conexion.php');
require_once('prioridades.php');

		
		$cont = 0;

		$db=Db::conectar();
		$listaprioridades = array();
		$select=$db->query('SELECT * FROM prioridades');
		$select->execute();

		foreach($select->fetchAll() as $prioridad){
			$myprioridad= new Prioridades();
			$myprioridad->setId($prioridad['id']);
			$myprioridad->setCodprioridad($prioridad['cod_prioridad']);
			$myprioridad->setNomprioridad($prioridad['nombre_prioridad']);
			$listaprioridades[]=$myprioridad->getNomprioridad();
		}
        $sigue="";
?>
