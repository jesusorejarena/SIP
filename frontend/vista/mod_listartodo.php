<?php	

	//session
	
	require("tema.php");
	require("../../backend/clase/modulo.class.php");
	require("../../backend/clase/opcion.class.php");
	require("../../backend/clase/cargo.class.php");

	$obj_mod = new modulo;
	$obj_mod->estandar();
	$obj_mod->puntero=$obj_mod->listar_normal();

	$obj_opc = new opcion;

	$obj_car = new cargo;	

	encabezado("Lista de modulos - ALCOR C.A.");

?>

	<div class="<?php echo $obj_mod->container; ?>">
		<div class="row pb-3 mb-3 bg-white">
			<div class="col-12 text-left">
				<button class="<?php echo $obj_mod->btn_atras; ?>" onClick="window.location.href='rol_menu.php'">Atras</button>
			</div>
		</div>
		<div class="<?php echo $obj_mod->card; ?>">
			<h2 class="<?php echo $obj_mod->titulocard; ?>">Lista de modulos</h2>
			<hr>
			<div class="row p-3 m-3">
				<div class="col-12">
					<div class="table-responsive">
						<table class="<?php echo $obj_mod->tabla; ?>">
							<thead>
								<tr>
									<th>Código</th>
									<th>Nombre del cargo</th>
									<th>Nombre de la opción</th>
									<th>Acción de la opción</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									while(($modulo=$obj_mod->extraer_dato())>0)
									{

										$obj_opc->cod_opc=$modulo['cod_opc'];
										$obj_opc->puntero=$obj_opc->filtrar();
										$opcion=$obj_opc->extraer_dato();

										$obj_car->cod_car=$modulo['cod_car'];
										$obj_car->puntero=$obj_car->filtrar();
										$cargo=$obj_car->extraer_dato();

										echo "<form action='../../backend/controlador/modulo.php' method='POST'>
												<tr>
													<input type='hidden' name='cod_mod' value='$modulo[cod_mod]'>
													<td>$modulo[cod_mod]</td>
													<td>$cargo[nom_car]</td>
													<td>$opcion[nom_opc]</td>
													<td>$opcion[acc_opc]</td>
													<td><a class='$obj_mod->btn_editar' href='mod_modificar.php?cod_mod=$modulo[cod_mod]'>Editar</a></td>
													<td><button type='submit' class='$obj_mod->btn_eliminar' name='ejecutar' value='modificar_eliminar'>Eliminar</button></td>
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