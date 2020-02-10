<?php	

	//session
	
	require_once("tema.php");
	require_once("../../backend/clase/empleado.class.php");

	$obj_ado = new empleado;
	$obj_ado->estandar();
	$obj_ado->puntero=$obj_ado->listar_normal();

	encabezado("Lista de empleados - ALCOR C.A.");

?>

	<div class="<?php echo $obj_ado->container; ?>">
		<div class="row pb-3 mb-3 bg-white">
			<div class="col-12 text-left">
				<button class="<?php echo $obj_ado->btn_atras; ?>" onClick="window.location.href='ado_menu.php'">Atras</button>
			</div>
		</div>
		<div class="<?php echo $obj_ado->card; ?>">
			<h2 class="<?php echo $obj_ado->titulocard; ?>">Lista de empleados</h2>
			<hr>
			<div class="row p-3 m-3">
				<div class="col-12">
					<div class="table-responsive">
						<table class="<?php echo $obj_ado->tabla; ?>">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Genero</th>
									<th>Fecha de Nacimiento</th>
									<th>Tipo</th>
									<th>Cédula</th>
									<th>Teléfono</th>
									<th>Correo</th>
									<th>Cargo</th>
									<th>Dirección</th>
									<th>Fecha de contrato</th>
									<th>Ultima modificación</th>
									<th>Fecha de eliminación</th>
									<th>Fecha de restauración</th>
									<th>Reporte PDF</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									while(($empleado=$obj_ado->extraer_dato())>0)
									{
										echo "<form action='../../backend/controlador/empleado.php' method='POST'>
												<tr>
													<input type='hidden' name='cod_ado' value='$empleado[cod_ado]'>
													<td>$empleado[nom_ado]</td>
													<td>$empleado[ape_ado]</td>
													<td>$empleado[gen_ado]</td>
													<td>$empleado[nac_ado]</td>
													<td>$empleado[tip_ado]</td>
													<td>$empleado[ced_ado]</td>
													<td>$empleado[tel_ado]</td>
													<td>$empleado[cor_ado]</td>
													<td>$empleado[cod_car]</td>
													<td>$empleado[dir_ado]</td>
													<td>$empleado[cre_ado]</td>
													<td>$empleado[act_ado]</td>
													<td>$empleado[eli_ado]</td>
													<td>$empleado[res_ado]</td>
													<td><a class='$obj_ado->btn_eliminar' href='ado_reportepdf.php?cod_ado=$empleado[cod_ado]'>PDF</a></td>
													<td><a class='$obj_ado->btn_editar' href='ado_modificar.php?cod_ado=$empleado[cod_ado]'>Editar</a></td>
													<td><button type='submit' class='$obj_ado->btn_eliminar' name='ejecutar' value='modificar_eliminar'>Eliminar</button></td>
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