<?php
		function conexion(){
			$servidor="localhost";
			$usuario="root";
			$password="";
			$bd="crudv2";
			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
			return $conexion;
		}

 ?>
