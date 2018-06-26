<?php
  require_once "../app/controllers/SelectController.php";
  $tipo_bien = SelectController::selectTipoBien();
  echo "<br>";

  $bienes = SelectController::selectBienes();
  echo "<br>";
  //var_dump(pg_fetch_row($bienes));
?>
<br>
<div class="container">
  <div class="row">
    <h2 class="text-center">Incorporación de Bienes</h2>
  </div>
  <br>
  <hr>
  <div class="form-group">
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="tipo_bien">Tipo de Bien:</label>
        <select class="form-control" name="tipo_bien">
          <option value="">Seleccione...</option>
          <?php
            while ($resultado = pg_fetch_assoc($tipo_bien)){
              echo "<option value='".$resultado['id_tipo_bien']."'>".$resultado['descripcion_tipobien']."</option>";
            }
          ?>
        </select>
      </div>
      <div class="col-sm-4">
        <label for="bienes">Bien:</label>
        <select class="form-control" name="bienes">
          <option value="">Seleccione...</option>
          <?php
            while ($resultado = pg_fetch_assoc($bienes)){
              echo "<option value='".$resultado['id_bienes']."'>".$resultado['descripcion_bien']."</option>";
            }
          ?>
        </select>
      </div>
      <div class="col-sm-4">
        <label for="insti">Institución:</label>
        <select class="form-control" name="insti">
          <option value="">Seleccione...</option>
        </select>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="grupo">Grupo:</label>
        <input class="form-control" type="text" name="grupo" value="" maxlength="3" placeholder="Grupo">
      </div>
      <div class="col-sm-4">
        <label for="sub_grupo">Sub-Grupo:</label>
        <input class="form-control" type="text" name="sub_grupo" value="" maxlength="3" placeholder="Sub-Grupo">
      </div>
      <div class="col-sm-4">
        <label for="seccion">Sección:</label>
        <input class="form-control" type="text" name="seccion" value="" maxlength="3" placeholder="Sección">
      </div>
    </div>
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="numero_bien">Número del Bien:</label>
        <input class="form-control" type="text" name="numero_bien" value="" pattern="[0-9]{4}" maxlength="4" placeholder="Numero del Bien">
      </div>
      <div class="col-sm-8">
        <label for="caracteristicas_bien">Caracteristicas del Bien:</label>
        <input class="form-control" type="text" name="caracteritsticas_bien" value="" maxlength="100" pattern="[A-Za-z]{100}" placeholder="Caracteristicas">
      </div>
    </div>
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="serial_bien">Serial del Bien:</label>
        <input class="form-control" type="text" name="serial_bien" value="" pattern="[0-9]{5}" maxlength="5" placeholder="Serial del Bien">
      </div>
      <div class="col-sm-4">
        <label for="tipo_incorporacion">Concepto Incorporación:</label>
        <select class="form-control" name="tipo_incorporacion">
          <option value="">Seleccione...</option>
        </select>
      </div>
    </div>
  </div>
</div>
