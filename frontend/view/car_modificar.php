<?php

require_once("tema_session.php");
require_once("../../backend/class/cargo.class.php");

$obj_car = new cargo;
$cod_car = $_REQUEST['cod_car'];

$obj_car->assignValue();
$obj_car->puntero = $obj_car->getByCode();
$cargo = $obj_car->extractData();

headerr("Modificar Cargo");

checkAdminOrClient(1);

?>

<!-- Formulario -->
<div class="container px-3 pt-3 pb-5 mb-5">
	<a class="btn btn-outline-primary btn-lg" href="rol_menu.php"><i class="fas fa-arrow-circle-left"></i></a>
	<div class="row justify-content-center">
		<div class="col-12 col-xl-6 p-2">
			<div class="card rounded-lg shadow my-3 px-3 py-4">
				<h2 class="card-title text-center text-primary font-weight-bold pt-4">Modificar Cargo</h2>
				<form action="../../backend/controller/cargo.php" method="POST" class="was-validation" id="formulario" novalidate>
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<input type="hidden" name="cod_car" id="cod_car" value="<?php echo $cargo['cod_car']; ?>">
									<label for="alfanumerico">Nombre:</label>
									<input type="text" name="nom_car" id="alfanumerico" class="form-control" placeholder="Nombre" value="<?php echo $cargo['nom_car']; ?>" />
									<small id="alfanumericoDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="estatus">Estatus:</label>
									<select name="est_car" id="estatus" required="" class="form-control">
										<?php $seleccionado = ($cargo["est_car"] == "A") ? "selected" : ""; ?>
										<option <?php echo $seleccionado; ?> value="A">Activo</option>
										<?php $seleccionado = ($cargo["est_car"] == "I") ? "selected" : ""; ?>
										<option <?php echo $seleccionado; ?> value="I">Inactivo</option>
									</select>
									<small id="estatusDiv" class="invalid-feedback"></small>
								</div>
							</div>
						</div>
					</div>
					<div class="px-4 pb-3 d-flex justify-content-between">
						<button type="reset" class="btn btn-outline-primary">Limpiar</button>
						<button type="submit" class="btn btn-primary" name="run" value="update">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="../js/validaciones.js"></script>

<?php

footer();

?>