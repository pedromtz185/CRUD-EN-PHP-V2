<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
   (function($) {
       $('#FiltrarContenido').keyup(function () {
            var ValorBusqueda = new RegExp($(this).val(), 'i');
            $('.BusquedaRapida tr').hide();
             $('.BusquedaRapida tr').filter(function () {
                return ValorBusqueda.test($(this).text());
              }).show();
                })
      }(jQuery));
});
</script>
<?php
require_once "conexion.php";
$conexion=conexion();
  $sql="SELECT * from productos";
  $result=mysqli_query($conexion,$sql);
?>
<span class="pull-right" >
  <button onclick="tableToExcel('testTable', 'Lista')" class="pull-right btn btn-success glyphicon glyphicon-list-alt " data-toggle="modal" type="button" name="button" data-toggle="tooltip" data-placement="top" title="Exporta a Excel ">Excel</button>
  <div class="input-group-prepend">
    <input id="FiltrarContenido" type="text" class="form-control pull-right" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon1"data-toggle="tooltip" data-placement="top" title="Ingrese el valor a Buscar">
</div>
</span>
<div class="col-sm-12" style=" height:500px; width:100%; overflow: scroll;">
      <table id="testTable" class="table table-hover table-bordered">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Acciones</th>
        </tr>
        <tbody class="BusquedaRapida" >
  <?php
while($res=mysqli_fetch_array($result)){
  ?>
  <tr>
    <td><?php echo $res["id"]; ?></td>
    <td id="nombre_usuario" data-id_usuario="<?php echo $res["id"]; ?>" contenteditable><?php echo  $res["nombre"];?></td>
    <td id="descripcion" data-descripcion="<?php echo $res["id"]; ?>" contenteditable><?php echo $res["descripcion"];?></td>
    <td id="precio" data-precio="<?php echo $res["id"]; ?>" contenteditable><?php echo $res["precio"];?></td>
    <td id="cantidad" data-cantidad="<?php echo $res["id"]; ?>" contenteditable><?php echo $res["cantidad"];?></td>
    <td><button class='btn btn-danger' id='eliminar'  data-id="<?php echo $res["id"]; ?>" >Eliminar</button></td>
  </tr>
  <?php 
}
?>
  <tr>
    <td></td>
    <td id='nombre_add' contenteditable></td>
    <td id='descripcion_add' contenteditable></td>
    <td id='precio_add' contenteditable></td>
    <td id='cantidad_add' contenteditable></td>
    <td><button class='btn btn-info' id='add'><h6>Agregar</h6></button></td>
  </tr>
</tbody>
</table>
</div>
<script src="js/tableToExcel.js"> </script>
