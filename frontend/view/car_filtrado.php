<?php

require_once("tema_session.php");
require_once("../../backend/class/cargo.class.php");

$obj_car = new cargo;
$obj_car->assignValue();
$obj_car->puntero = $obj_car->filter();

headerr("Cargos Filtrados");

checkAdminOrClient(1);

?>

<!-- Lista -->
<div class="container-fluid px-3 pt-3 pb-5 mb-5">
	<a class="btn btn-outline-primary btn-lg" href="rol_menu.php"><i class="fas fa-arrow-circle-left"></i></a>
	<h2 class="text-center text-primary font-weight-bold p-3">Cargos Filtrados</h2>
	<div class="row justify-content-center">
		<div class="col-12 py-2">
			<div class="table-responsive">
				<table class="table table-bordered table-hover text-center">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nombre</th>
							<th>Creado</th>
							<th>Modificado</th>
							<th>Restaurado</th>
							<th>Eliminado</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while (($cargo = $obj_car->extractData()) > 0) {
							echo "<form action='../../backend/controller/cargo.php' method='POST'>
											<tr>
												<input type='hidden' name='cod_car' value='$cargo[cod_car]'>
												<td>$cargo[cod_car]</td>
												<td>$cargo[nom_car]</td>
									";

							if ($cargo['cod_car'] == 1 || $cargo['nom_car'] == 'Administrador' || $cargo['cod_car'] == 2 || $cargo['nom_car'] == 'Cliente') {
								echo "
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
										";
							} else {
								echo "
											<td>$cargo[cre_car]</td>
											<td>$cargo[act_car]</td>
											<td>$cargo[res_car]</td>
											<td>$cargo[eli_car]</td>";

								if ($cargo['bas_car'] == "A") {
									echo "<td><b class='text-success'>Activo</b></td>";
								} else {
									echo "<td><b class='text-danger'>Papelera</b></td>";
								}

								echo "
											<td>
												<div class='btn-group' role='group'>";
								if ($cargo['est_car'] == "A") {
									echo "	<button class='btn btn-success py-2' type='submit' name='run' value='updateStatusI'><i class='fas fa-check'></i></button>";
								} else {
									echo "	<button class='btn btn-danger py-2' type='submit' name='run' value='updateStatusA'><i class='fas fa-times-circle'></i></button>";
								}
								echo "		<a class='btn btn-danger py-2' href='car_reportepdf.php?cod_car=$cargo[cod_car]'><i class='fas fa-file-pdf'></i></a>
													<a class='btn btn-warning py-2' href='car_modificar.php?cod_car=$cargo[cod_car]'><i class='fas fa-edit'></i></a>
													<button type='submit' class='btn btn-success py-2' name='run' value='restore'><i class='fas fa-redo-alt'></i></button>
													<button type='button' data-toggle='modal' class='btn btn-danger py-2' data-target='#modalDelete$cargo[cod_car]'><i class='fas fa-trash'></i></button>
												</div>
											</td>
											<div class='modal fade' id='modalDelete$cargo[cod_car]' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
												<div class='modal-dialog modal-sm'>
													<div class='modal-content'>
														<div class='modal-header'>
															<h5 class='modal-title' id='exampleModalLabel'>¿Estas seguro de enviar a la papelera?</h5>
															<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
																<span aria-hidden='true'>&times;</span>
															</button>
														</div>
														<div class='modal-body d-flex justify-content-around'>
															<button type='submit' name='run' value='firstDelete' class='btn btn-light'>Eliminar</button>
															<button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
														</div>
													</div>
												</div>
											</div>
										";
							}
							echo "
											</tr>
										</form>
									";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php

footer();

?>