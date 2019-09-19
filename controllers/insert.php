<?PHP
require_once "conexion.php";
$conexion=conexion();
 $nombre_add = $_POST["nombre_add"];
 $descripcion_add = $_POST["descripcion_add"];
 $precio_add = $_POST["precio_add"];
 $cantidad_add = $_POST["cantidad_add"];

 $sql = "INSERT INTO productos(id,nombre,descripcion,precio,cantidad)
 VALUES (NULL,'$nombre_add','$descripcion_add','$precio_add','$cantidad_add')";
 if ($conexion->query($sql) === TRUE){}else{}
?>
