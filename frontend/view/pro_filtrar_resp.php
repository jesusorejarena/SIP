<?php

require_once("tema_session.php");
require_once("../../backend/class/proveedor.class.php");

$obj_edo = new proveedor;
$obj_edo->assignValue();
$obj_edo->puntero = $obj_edo->getBackup();

headerr("Filtrar producto - Auditoria");

checkAdminOrClient(1);

?>

<!-- Formulario -->
<div class="container px-3 pt-3 pb-5 mb-5">
	<a class="btn btn-outline-primary btn-lg" href="menu_config.php"><i class="fas fa-arrow-circle-left"></i></a>
	<div class="row justify-content-center">
		<div class="col-12 col-xl-6 p-2">
			<div class="card rounded-lg shadow my-3 px-3 py-4">
				<h2 class="card-title text-center text-primary font-weight-bold pt-4">Filtrar Producto - Auditoria</h2>
				<form action="pro_filtrado_resp.php" method="POST" class="was-validation" id="formulario" novalidate>
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="nom_pro">Nombre:</label>
									<input type="text" name="nom_pro" id="nom_pro" placeholder="Nombre:" class="form-control">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="des_pro">Descripción:</label>
									<textarea name="des_pro" id="des_pro" placeholder="Descripción" class="form-control"></textarea>
								</div>
							</div>
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="pre_pro">Precio:</label>
									<input type="text" name="pre_pro" id="pre_pro" placeholder="Precio:" class="form-control">
								</div>
							</div>
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="can_pro">Cantidad:</label>
									<input type="text" name="can_pro" id="can_pro" placeholder="Cantidad:" class="form-control">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="cod_edo">Proveedor:</label>
									<select name="cod_edo" id="cod_edo" class="form-control">
										<option value="">Todos
										<option>
											<?php while (($proveedor = $obj_edo->extractData()) > 0) {
												echo "<option value='$proveedor[cod_edo]'>$proveedor[nom_edo]</option>";
											}
											?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="px-4 pb-3 d-flex justify-content-between">
						<button type="reset" class="btn btn-outline-primary">Limpiar</button>
						<button type="submit" class="btn btn-primary">Filtrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

footer();

?>