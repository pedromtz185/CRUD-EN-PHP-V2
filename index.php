<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Alertify CSS -->
    <link rel="stylesheet" href="css/plugins/alertifyjs/css/alertify.min.css">
    <!-- Alertify theme default -->
    <link rel="stylesheet" href="css/plugins/alertifyjs/css/themes/default.min.css"/>
    <script src="css/plugins/Popper/popper.min.js"></script>
    <script src="css/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="css/plugins/alertifyjs/js/alertify.min.js"></script>

    <script type="text/javascript" >
      $(document).ready(function(){
        function obtener_datos(){
          $.ajax({
            url:"controllers/datos.php",
            method:"POST",
            success:function(data){
              $("#tabla").html(data)
            }
          })
        }
        obtener_datos();
        //insert
        $(document).on("click","#add",function(){
            var nombre_add = $("#nombre_add").text();
            var descripcion_add = $("#descripcion_add").text();
            var precio_add = $("#precio_add").text();
            var cantidad_add = $("#cantidad_add").text();
            $.ajax({
              url:"controllers/insert.php",
              method:"POST",
              data:{
                nombre_add:nombre_add,
                descripcion_add:descripcion_add,
                precio_add:precio_add,
                cantidad_add:cantidad_add
              },
              success:function(data){
                obtener_datos();
                alertify.notify('Agregado Correctamente', 'success', 5, function(){});
                alert(datos);
              }
            })
        })
        // update
          function updatedata(id,valor,bd){
            $.ajax({
              url:"controllers/update.php",
              method:"POST",
              data:{
                id:id,
                valor:valor,
                bd:bd
              },
              success:function(data){
                alertify.notify('Actualización Correctamente', 'success', 5, function(){});
                obtener_datos();
              }
            })
          }
        //update nombre
        $(document).on("blur","#nombre_usuario",function(){
          var id = $(this).data("id_usuario");
          var nombre = $(this).text();
          updatedata(id,nombre,'nombre');
        })
        //update descripcion
        $(document).on("blur","#descripcion",function(){
          var id = $(this).data("descripcion");
          var descripcion = $(this).text();
          updatedata(id,descripcion,'descripcion');
        })
        //update precio
        $(document).on("blur","#precio",function(){
          var id = $(this).data("precio");
          var precio = $(this).text();
          updatedata(id,precio,'precio');
        })
        //update cantidad
        $(document).on("blur","#cantidad",function(){
          var id = $(this).data("cantidad");
          var cantidad = $(this).text();
          updatedata(id,cantidad,'cantidad');
        })
        //delete
        $(document).on("click","#eliminar",function(){
          var id = $(this).data('id');
          swal({
    			  title: "Confirmación",
    			  text: "¡Confirmar Eliminación de Registro!",
    			  icon: "success",
    			  buttons: true,
    			  dangerMode: true,
    			})
    			.then((willDelete) => {
    			  if (willDelete) {
              $.ajax({
                url:"controllers/delete.php",
                method:"POST",
                data:{
                  id:id
                },
                success:function(data){
                  obtener_datos();
                }
              })
    				swal("Registro Eliminado", {
    				  icon: "success",

    				});
    			  } else {
    				swal("Eliminación Cancelada!");
    			  }
    			});
        })

      });
    </script>
    <title></title>
  </head>
  <body>
    <div class="card-header">
      <div class=""  align="center">
        EJEMPLO CRUD V2
      </div>
    </div>
    <br>
    <div class="container">
      <div class="tabla" id="tabla" >
      </div>
    </div>
  </body>
</html>
