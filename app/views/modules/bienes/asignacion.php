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





	

	<! Tabla que recibe los datos del empleado>
	
	<!--<table border="1"> 	
		<tbody>
				<tr>
					<td><label>Empleado</label></td>
					
				</tr>	
				<tr>
					<td><label><b>Cédula</label></td>
					<td><?php echo $consulta['cedula'];?></td>
					<td><label><b>Nombre del Empleado</label></td>
					<td><?php echo $consulta['nombre_empleado'];?></td>
					<td><label><b>Apellidos del Empelado</label></td>
					<td><?php echo $consulta['apellido_empleado'];?></td>
					</tr>	
				<tr>
					<td><label><b>Correo Electrónico</td>
					<td><?php echo $consulta['correo_empleado'];?></td>					
					<td><label><b>Cargo del Empleado</td>
					<td><?php echo $consulta['descripcion_cargo'];?></td>
					<td><label><b>Gerencia</td>
					<td><?php echo$consulta['descripcion_gerencia'];?></td>						
					<td><label><b>Institución</label></td>
					<td><?php echo$consulta['nombre_institucion'];?></td>	
				</tr>
		</tbody>
	</table>-->
	
	<!Formulario para ejecutar la busqueda del bien>
	<form action="asignacion_usuario.php" method="post">
		<input type="hidden" name="cedula" value="<?php echo $consulta['cedula'];?>">
		<input type="hidden" name="id_movimiento" value="<?php echo $id_movimiento;?>">
		<input type="hidden" name="value1" value="12">
		<table>
			<tbody>
				<tr>
					<td><h1>Datos del Bien</h1></td>
				</tr>
				<tr>
					<td><input type="text" name="numero_bien" required></td>
					<td><button type="submit">Buscar</button></td>					
				</tr>
			</tbody>
		</table>
	</form>
	<!-- Tabla que recibe los datos del bien-->
				<?php
					if ($value1)
					{
						if (!$bien)
						{
							echo "<script>alert('Bien no se encuentra registrado');</script>";
						}
						else
						{
							if ($bien['id_estatus'] == 2)
							{
								echo "<script>alert('Bien ya se encuentra asignado');</script>";
							}
							else
							{
				?>
			<table class="table table-hover">

			<caption>Listado de Bienes a Asignar a:<?php echo $consulta['cedula'];?></caption>  
			<thead align="center">
			
					<th>Número de Bien</th>
					<th>Tipo de Bien</th>
					<th>Descripción Bien</th>
					<th>Grupo</th>
					<th>Sub-Grupo</th>
					<th>Sección</th>
					<th>Nombre de la Institución</th>
					<th>Caracteristicas del Bien</th>
					<th>Serial del Bien</th>
					<th>Valor</th>
					<th>Nombre Almecen</th>
			</thead>
			<tbody>
						<tr>
							<td><?php echo $bien['numero_bien'];?></td>
							<td><?php echo $bien['descripcion_tipobien'];?></td>
							<td><?php echo $bien['descripcion_bien'];?></td>
							<td><?php echo $bien['grupo'];?></td>
							<td><?php echo $bien['sub_grupo'];?></td>
							<td><?php echo $bien['seccion'];?></td>
							<td><?php echo $bien['nombre_institucion'];?></td>
							<td><?php echo $bien['caracteristicas'];?></td>
							<td><?php echo $bien['serial_bien'];?></td>
							<td><?php echo $bien['valor'];?></td>
							<td><?php echo $bien['nombre_almacen'];?></td>	
						</tr>
			</tbody>
			</table>
					<?php
					 		}
						}
					}
					
					?>
					
			<form action="asignacion_usuario.php" method="post">	
				<?php
					//Se esta instanciado la clase Select para acceder al metodo Almacen
					$gerencia = new Select();
					$gerencia->Gerencias();
				?>						
				<input type="hidden" name= "token" value="1">
				<textarea name="observacion" placeholder="Ingrese observacion"></textarea>
				<input type="hidden" name= "cedula" value="<?php echo $consulta['cedula'];?>">
				<input type="hidden" name= "numero_bien" value="<?php echo $bien['numero_bien'];?>">
				<input type="hidden" name= "id_movimiento" value="<?php echo $id_movimiento;?>">
				
				<button type="submit">Asignar</button>
			</form>
