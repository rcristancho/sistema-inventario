<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Inventario de Bienes</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/responsive-slider.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/buttons.dataTables.min.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
  .dropdown-submenu {
      position: relative;
  }

  .dropdown-submenu .dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
  }
  </style>
</head>
<body>
  <?php
    include "inc/navbar.php";
  ?>
  <br>
  <div class="container">
    <br>
    <?php
      $mvc = new EnlacesController();
      $mvc->enlacesPaginaController();
    ?>
  </div>
  <br>
  <?php
    include "inc/footer.php";
  ?>
</body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/responsive-slider.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/select_dep_tipobien.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.buttons.min.js"></script>
  <script src="js/buttons.flash.min.js"></script>
  <script src="js/jszip.min.js"></script>
  <script src="js/pdfmake.min.js"></script>
  <script src="js/vfs_fonts.js"></script>
  <script src="js/buttons.html5.min.js"></script>
  <script src="js/buttons.print.min.js"></script>
  <script src="js/scripts.js"></script>
  <script>
    wow = new WOW(
    {

    }	)
    .init();
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#tabla').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      } );
    } );
  $(document).ready(function(){
    $('.dropdown-submenu a.test').on("click", function(e){
      $(this).next('ul').toggle();
      e.stopPropagation();
      e.preventDefault();
    });
  });

  $(document).ready(function(){
    $("#checkbox").click(function(){
      if ($(this).is(':checked')) {
        $("input[type=checkbox]").prop('checked', true);
      }else{
        $("input[type=checkbox]").prop('checked', false);
      };
    });
  });


  $(document).ready(function(){
    $(".editTipoBien").click(function(){
      var id = $(this).attr('id');
      $.get('/sib/app/controllers/AjaxController.php?tipo_bien='+id, function(data){
          $("#id").val(data.id_tipo_bien);
          $("#descripcion").val(data.descripcion_tipobien);
          $("#edit_modal").modal('show');
      });
    });
  });

  $(document).ready(function(){
    $(".create-empleado").click(function(){
      $("#create-empleado").modal("show");
    });
  });
  
  $(document).ready(function(){
    $(".edit-empleado").click(function(){
      var id = $(this).attr('id');
      $.get('/sib/app/controllers/AjaxController.php?cedula='+id, function(data){
          $("#cedula").val(data.cedula).prop('readonly', true);
          $("#nombre").val(data.nombre_empleado);
          $("#apellido").val(data.apellido_empleado);
          $("#email").val(data.correo_empleado);
          $("#cargo").val(data.id_cargo);
          $("#gerencia").val(data.id_gerencia);
          $("#institucion").val(data.id_institucion);
          $("#submit").val("edit");
          $("#create-empleado").modal('show');
      });
    });
  });

  $(document).ready(function(){
    $(".suspender-usuario").click(function(){
      var id = $(this).attr('id');
      $.get('/sib/app/controllers/AjaxController.php?suspender='+id, function(data){
        alert(data);
        window.location.reload(true);
      });
    });
  });

  $(document).ready(function(){
    $(".activar-usuario").click(function(){
      var id = $(this).attr('id');
      $.get('/sib/app/controllers/AjaxController.php?activar='+id, function(data){
        alert(data);
        window.location.reload(true);
      });
    });
  });
  </script>
</html>
