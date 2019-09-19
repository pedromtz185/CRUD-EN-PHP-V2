<?php
require_once "conexion.php";
$conexion=conexion();
$id = $_POST["id"];
$sql = "DELETE FROM productos where id=$id";
if ($conexion->query($sql) === TRUE){}else{}
 ?>
