<?php	

	//session
	
	require_once("tema.php");
	require_once("../../backend/clase/cargo.class.php");

	$obj_car = new cargo;
	$obj_car->estandar();
	$obj_car->puntero=$obj_car->listar_normal();

	encabezado("Lista de Cargos");

	comprobar("Roles");

?>

	<div class="<?php echo $obj_car->container; ?>">
		<div class="row pb-3 mb-3 bg-white">
			<div class="col-12 text-left">
				<button class="<?php echo $obj_car->btn_atras; ?>" onClick="window.location.href='rol_menu.php'"><i class="icon ion-md-arrow-round-back"></i></button>
			</div>
		</div>
		<div class="<?php echo $obj_car->card; ?>">
			<h2 class="<?php echo $obj_car->titulocard; ?>">Lista de Cargos</h2>
			<hr>
			<div class="row p-3 m-3">
				<div class="col-12">
					<div class="table-responsive">
						<table class="<?php echo $obj_car->tabla; ?>">
							<thead>
								<tr>
									<th>Código</th>
									<th>Nombre</th>
									<th>Fecha de Creación</th>
									<th>Ultima Modificación</th>
									<th>Fecha de Eliminado</th>
									<th>Fecha de Restauración</th>
									<th>Estatus</th>
									<th>PDF</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<?php 
									while(($cargo=$obj_car->extraer_dato())>0)
									{
										echo "<form action='../../backend/controlador/cargo.php' method='POST'>
												<tr>
													<input type='hidden' name='cod_car' value='$cargo[cod_car]'>
													<td>$cargo[cod_car]</td>
													<td>$cargo[nom_car]</td>";
													
													if ($cargo['cod_car']==1 || $cargo['nom_car']=='Administrador') {
														echo "
																<td></td>
																<td></td>
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
																<td>$cargo[eli_car]</td>
																<td>$cargo[res_car]</td>
																<td>$cargo[est_car]</td>
																<td><a class='$obj_car->btn_pdf' href='car_reportepdf.php?cod_car=$cargo[cod_car]'><i class='icon ion-md-document'></i></a></td>
																<td><a class='$obj_car->btn_editar' href='car_modificar.php?cod_car=$cargo[cod_car]'><i class='icon ion-md-create'></i></a></td>
																<td><button type='submit' class='$obj_car->btn_eliminar' name='ejecutar' value='modificar_eliminar'><i class='icon ion-md-trash'></i></button></td>
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
	</div>

<?php 
	
	pie();

?>