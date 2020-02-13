<?php
  require_once "../app/controllers/SelectController.php";
  require_once "../app/controllers/BienesController.php";
  
  $tipo_bien = SelectController::selectTipoBien();
  $bienes = SelectController::selectBienes();
  $institucion = SelectController::selectInstitucion();
  $tipo_incorporacion = SelectController::selectTipoIncorporacion();
  $ubicacion_almacen = SelectController::selectUbicacionAlmacen();
  BienesController::registrarBien();
  //var_dump(pg_fetch_row($bienes));
?>

<br>
<div class="container">
<div class="row">
    <h2 class="text-center">Incorporación de Bienes</h2>
</div>
  <br>
  <hr>
  <form method="post">
  <div class="form-group">
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="tipo_bien">Tipo de Bien:</label>
        <select class="form-control" name="tipo_bien" id="tipo_bien" onChange="cargaContenido(this.id)" required>
          <option value="" disabled selected>Seleccione...</option>
          <?php
            while ($resultado = pg_fetch_assoc($tipo_bien)){
              echo "<option value='".$resultado['id_tipo_bien']."'>".$resultado['descripcion_tipobien']."</option>";
            }
          ?>
        </select>
      </div>
      <div class="col-sm-4">
        <label for="bienes">Bien:</label>
        <select class="form-control" name="bienes" id="bienes" required>
          <option value="">Seleccione...</option>          
        </select>
      </div>
      <div class="col-sm-4">
        <label for="institucion">Institución:</label>
        <select class="form-control" name="institucion" required>
          <option value="">Seleccione...</option>
           <?php
            while ($resultado = pg_fetch_assoc($institucion)){
              echo "<option value='".$resultado['id_institucion']."'>".$resultado['nombre_institucion']."</option>";
            }
          ?>
        </select>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="grupo">Grupo:</label>
        <input class="form-control" type="text" name="grupo" value="" pattern="[0-9]{1,3}" maxlength="2" placeholder="Grupo" required>
      </div>
      <div class="col-sm-4">
        <label for="sub_grupo">Sub-Grupo:</label>
        <input class="form-control" type="text" name="sub_grupo" value="" pattern="[0-9]{1-3}" maxlength="2" placeholder="Sub-Grupo" required>
      </div>
      <div class="col-sm-4">
        <label for="seccion">Sección:</label>
        <input class="form-control" type="text" name="seccion" value="" pattern="[0-9]{1-3}" maxlength="2" placeholder="Sección" required>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="numero_bien">Número del Bien:</label>
        <input class="form-control" type="text" name="numero_bien" value="" required pattern="[0-9]{4}" maxlength="4" placeholder="Numero del Bien">
      </div>
      <div class="col-sm-8">
        <label for="caracteristicas_bien">Caracteristicas del Bien:</label>
        <input class="form-control" type="text" name="caracteritsticas_bien" value="" maxlength="100" required pattern="[A-Za-z ]{0,100}" placeholder="Caracteristicas" >
      </div>
    </div>
    <div class="row form-group">     
      <div class="col-sm-4">
        <label for="serial_bien">Serial del Bien:</label>
        <input class="form-control" type="text" name="serial_bien" value="" required pattern="[0-9]{5}" maxlength="5" placeholder="Serial del Bien" title="Solo Números Permitidos. Cantidad Caracteres 10.">
      </div>
      <div class="col-sm-4">
        <label for="fecha_adquisicion">Fecha de Adquisición:</label>
        <input class="form-control" type="date" name="fecha_adquisicion" required>
      </div>
      <div class="col-sm-4">
        <label for="tipo_incorporacion">Concepto de Incorporación:</label>
        <select class="form-control" name="tipo_incorporacion" required>
          <option value="">Seleccione...</option>
          <?php
            while ($resultado = pg_fetch_assoc($tipo_incorporacion)){
              echo "<option value='".$resultado['id_tipo_incorporacion']."'>".$resultado['descripcion_incorporacion']."</option>";
            }
          ?>
        </select>
      </div>      
    </div> 
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="procedencia_bien">Procedencia del Bien</label>
        <input class="form-control" type="text" name="procedencia_bien" value="" maxlength="50" required pattern="[A-Za-z ]{0,50}" placeholder="Procedencia Bien">
      </div>  
      <div class="col-sm-4">
        <label for"valor_bien">Valor del Bien</label>
        <input class="form-control" type="text " name="valor_bien" value="" maxlength="10" required pattern="[0-9]{0,10}" placeholder="Valor del Bien">
      </div>
      <div class="col-sm-4">
        <label for"ubicacion_almacen">Ubicación Almacen</label>
        <select class="form-control" name="ubicacion_almacen" required>
          <option value="">Seleccione...</option>
          <?php
            while ($resultado = pg_fetch_assoc($ubicacion_almacen)){
              echo "<option value='".$resultado['id_ubicacion_almacen']."'>".$resultado['nombre_almacen']."</option>";
            }
          ?>

        </select>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="observacion">Observación</label>
        <textarea class="form-control" name="observacion" maxlength="100" placeholder="Ingrese Observación" style="resize:none"></textarea>      
      </div>  
   </div>         
    <div class="row form-group text-center" >
      <div>
       <button type="submit" name="submit_consulta" class="btn btn-primary">Guardar</button>
      </div>
    </div>  
    <div class="row form-group">      
    </div>  
    </form>
  </div>
</div>
