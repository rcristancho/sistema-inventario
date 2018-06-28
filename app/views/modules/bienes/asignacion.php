<?php
	require_once "../app/controllers/BienesController.php";
?>
<br>
<div class="container">
	<div class="row">
		<h2 class="text-center">Asignacion Bienes</h2>
	</div>
	<hr>
	<form method="post">
	<div class="row form-group">
		<div class="col-sm-4">
			<label for="cedula">Cédula Empleado:</label>
			<input class="form-control" type="text" name="cedula" value="" maxlength="8" placeholder="Cédula del Empleado">
		</div>
		<div class="col-sm-2">
			<br>
			<input name="submit_consulta" type="submit" value="Buscar" class="btn btn-primary">
		</div>
	</div>
	<?php
		$empleado = BienesController::consultaCedula();
	?>
	</form>
	<hr>
	<div class="row">
		<h2 class="text-center">Datos del Empleado a Asignar el Bien:</h2>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<label for="cedula">Cédula Empleado:</label>
			<input class="form-control" type="text" name="cedula" value="<?php echo $empleado['cedula'];?>" disabled>
		</div>
		<div class="col-sm-3">
			<label for="cedula">Nombre:</label>
			<input class="form-control" type="text" name="nombre" value="<?php echo $empleado['nombre_empleado'];?>" disabled>
		</div>
		<div class="col-sm-3">
			<label for="cedula">Apellido:</label>
			<input class="form-control" type="text" name="apellido" value="<?php echo $empleado['apellido_empleado'];?>" disabled>
		</div>
		<div class="col-sm-3">
			<label for="cedula">Cargo:</label>
			<input class="form-control" type="text" name="cargo" value="<?php echo $empleado['descripcion_cargo'];?>" disabled>
		</div>
		<br>
		<div class="col-sm-3">
			<label for="cedula">Gerencia:</label>
			<input class="form-control" type="text" name="gerencia" value="<?php echo $empleado['descripcion_gerencia'];?>" disabled>
		</div>
		<div class="col-sm-3">
			<label for="cedula">Institucion:</label>
			<input class="form-control" type="text" name="institucion" value="<?php echo $empleado['nombre_institucion'];?>" disabled>
		</div>
		<div class="col-sm-3">
			<label for="cedula">Correo:</label>
			<input class="form-control" type="text" name="cargo" value="<?php echo $empleado['correo_empleado'];?>" disabled>
		</div>

	</div>
</div>


