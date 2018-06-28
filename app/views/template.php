<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Inventario de Bienes</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css"><!--
  <link rel="stylesheet" href="css/responsive-slider.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">-->
  <link rel="stylesheet" href="css/style.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
  <script src="js/scripts.js"></script>
  <script>
    wow = new WOW(
    {

    }	)
    .init();
  </script>
</html>
