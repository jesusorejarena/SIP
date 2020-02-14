<?php	

	//session
	
	require_once("tema.php");
	require_once("../../backend/clase/permiso.class.php");
	require_once("../../backend/clase/cargo.class.php");
	require_once("../../backend/clase/modulo.class.php");

	$obj_per = new permiso;
	$obj_per->estandar();	
	$obj_per->asignar_valor();
	$obj_per->puntero=$obj_per->filtrar();

	$obj_car = new cargo;

	$obj_mod = new modulo;
	
	encabezado("Permisos Filtrados - ALCOR C.A.");

?>

	<div class="<?php echo $obj_per->container; ?>">
		<div class="row pb-3 mb-3 bg-white">
			<div class="col-12 text-left">
				<button class="<?php echo $obj_per->btn_atras; ?>" onClick="window.location.href='rol_menu.php'">Atras</button>
			</div>
		</div>
		<div class="<?php echo $obj_per->card; ?>">
			<h2 class="<?php echo $obj_per->titulocard; ?>">Permisos Filtrados</h2>
			<hr>
			<div class="row p-3 m-3">
				<div class="col-12">
					<div class="table-responsive">
						<table class="<?php echo $obj_per->tabla; ?>">
							<thead>
								<tr>
									<th>Código</th>
									<th>Nombre del Cargo</th>
									<th>Nombre del Módulo</th>
									<th>Fecha de Creación</th>
									<th>Ultima Modificación</th>
									<th>Fecha de Eliminación</th>
									<th>Fecha de Restauración</th>
									<th>Estatus</th>
									<th>Estado</th>
									<th>Editar</th>
									<th>Restaurar</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									while(($permiso=$obj_per->extraer_dato())>0)
									{

										$obj_car->cod_car=$permiso['cod_car'];
										$obj_car->puntero=$obj_car->filtrar();
										$cargo=$obj_car->extraer_dato();

										$obj_mod->cod_mod=$permiso['cod_mod'];
										$obj_mod->puntero=$obj_mod->filtrar();
										$modulo=$obj_mod->extraer_dato();

										echo "<form action='../../backend/controlador/permiso.php' method='POST'>
												<tr>
													<input type='hidden' name='cod_mod' value='$permiso[cod_mod]'>
													<td>$permiso[cod_mod]</td>
													<td>$cargo[nom_car]</td>
													<td>$modulo[nom_mod]</td>
													<td>$permiso[cre_mod]</td>
													<td>$permiso[act_mod]</td>
													<td>$permiso[eli_mod]</td>
													<td>$permiso[res_mod]</td>													
													<td>$permiso[est_mod]</td>
													<td>$permiso[bas_mod]</td>
													<td><a class='$obj_per->btn_editar' href='mod_modificar.php?cod_mod=$permiso[cod_mod]'>Editar</a></td>
													<td><button type='submit' class='$obj_per->btn_restaurar' name='ejecutar' value='modificar_restaurar'>Restaurar</button></td>
													<td><button type='submit' class='$obj_per->btn_eliminar' name='ejecutar' value='modificar_eliminar'>Eliminar</button></td>
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