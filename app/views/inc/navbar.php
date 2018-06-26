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
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrador <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">Administración Usuarios</li>
              <li><a href="index.php?action=admin/usuarios_create">Creación Usuarios</a></li>
              <li><a href="index.php?action=admin/usuarios_edit">Editar Usuarios</a></li>
              <li><a href="index.php?action=admin/usuarios_consult">Consultar Usuarios</a></li>
            </ul>
          </li>
          <li><a href="index.php?action=login">Login</a></li>
          <li><a href="index.php?action=bienes/incorporacion">Incorporación de Bienes</a></li>
          <li><a href="index.php?action=bienes/asignacion">Asignar Bienes</a></li>
          <li><a href="./app/vista/incorporacion.php">Incorporación</a></li>
          <li><a href="./app/controlador/cerrar_session.php">Cerrar sesion</a></li>
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
