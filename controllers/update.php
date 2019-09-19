<?php
require_once "conexion.php";
$conexion=conexion();
$id = $_POST["id"];
$valor = $_POST["valor"];
$bd = $_POST["bd"]; 
$sql = "UPDATE productos SET $bd = '$valor' where id='$id'";
if ($conexion->query($sql) === TRUE){}else{}
 ?>
