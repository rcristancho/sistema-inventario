<header>
  <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #f2f2f2 !important">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="index.php"><img class="img-responsive" style="max-weight: 15%; max-width: 15%;" src="" alt="CONAPDIS"></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <?php
            if ($_SESSION["logueado"] == true) {
          ?>
          <?php
            if ($_SESSION["user_perfil"] == 1) {
          ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrador <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">Administración Usuarios</li>
              <li><a href="index.php?action=admin/usuarios_create">Creación Usuarios</a></li>
            </ul>
          </li>
          <?php    
            }
          ?>
          <li><a href="index.php?action=bienes/incorporacion">Incorporación de Bienes</a></li>
          <li><a href="index.php?action=bienes/asignacion">Asignar Bienes</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="index.php?action=reportes/consulta_cedula">Consulta Cédula</a></li>
              <li><a href="index.php?action=reportes/consulta_bien">Consulta Bien</a></li>
              <li><a href="index.php?action=reportes/consulta_historico_bien">Consulta Historico Bien</a></li>
              <li><a href="index.php?action=reportes/consulta_tipo_bien">Consulta Tipo Bien</a></li>
              <li><a href="index.php?action=reportes/consulta_inventario">Consulta Inventario</a></li>
            </ul>
          </li>      
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["user_name"] ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="index.php?action=logout">Cerrar Sesion</a></li>
            </ul>
          </li>
          <?php    
            }
          ?>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

</header>
