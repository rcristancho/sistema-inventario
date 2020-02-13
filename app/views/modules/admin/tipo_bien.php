<?php
	require_once "../app/controllers/TipoBienController.php";
	$tipo_bien = TipoBienController::consulta();
	//var_dump($tipo_bien);
?>
<div class="container">
	<div class="row">
		<div class="text-center"><h3>Tipos de Bien</h3></div>
		<div class="pull-right"><a class="btn btn-success" href="index.php?action=admin/crear_tipobien">Registrar</a></div>
	</div>	
	<br>
	<div class="row">
		<table id="tabla" class="display nowrap table table-bordered text-center" style="width:100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Descripcion</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = pg_fetch_assoc($tipo_bien)) {
				?>
					<tr>
						<td><?php echo $row["id_tipo_bien"] ?></td>
						<td><?php echo $row["descripcion_tipobien"] ?></td>
						<td><button class="editTipoBien btn btn-sm btn-primary" id="<?php echo $row["id_tipo_bien"];?>">Edit</button></td>
					</tr>
				<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Descripcion</th>
					<th>Accion</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<div id="edit_modal" class="modal fade">
	<form method="POST">
	<?php
		TipoBienController::actualizacion();
	?>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Edicion Registro</h4>
			</div>
			<div class="modal-body">
				<label>ID</label>
				<input type="text" name="id" id="id" readonly value="" class="form-control">
				<label>Descripcion</label>
				<input type="text" name="descripcion" id="descripcion" value="" class="form-control">
			</div>
			<div class="modal-footer">
				<button type="submit" name="submit" value="edit" class="btn btn-primary btn-sm">Guardar</button>
			</div>
		</div>
	</div>
	</form>	
</div>