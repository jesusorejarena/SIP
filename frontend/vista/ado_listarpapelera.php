<?php	

	//session
	
	require_once("tema.php");
	require_once("../../backend/clase/empleado.class.php");

	$obj_ado = new empleado;
	$obj_ado->estandar();
	$obj_ado->puntero=$obj_ado->listar_eliminar();

	encabezado("Empleados Eliminados- ALCOR C.A.");

	comprobar("Empleados");

?>

	<div class="<?php echo $obj_ado->container; ?>">
		<div class="row pb-3 mb-3 bg-white">
			<div class="col-12 text-left">
				<button class="<?php echo $obj_ado->btn_atras; ?>" onClick="window.location.href='ado_menu.php'"><i class="icon ion-md-arrow-round-back"></i></button>
			</div>
		</div>
		<div class="<?php echo $obj_ado->card; ?>">
			<h2 class="<?php echo $obj_ado->titulocard; ?>">Empleados Eliminados</h2>
			<hr>
			<div class="row p-3 m-3">
				<div class="col-12">
					<div class="table-responsive">
						<table class="<?php echo $obj_ado->tabla; ?>">
							<thead>
								<tr>
									<th>Código</th>
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
									<th>Fecha de Contrato</th>
									<th>Ultima Modificación</th>
									<th>Fecha de Eliminación</th>
									<th>Fecha de Restauración</th>
									<th>Restaurar</th>
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
													<td>$empleado[cod_ado]</td>
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
													<td><button type='submit' class='$obj_ado->btn_restaurar' name='ejecutar' value='modificar_restaurar'><i class='icon ion-md-refresh'></i></button></td>
													<td><button type='submit' class='$obj_ado->btn_eliminar' name='ejecutar' value='eliminar'><i class='icon ion-md-trash'></i></button></td>
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
			<!--<div class="card-body">
				<form action="../../backend/controlador/empleado.php" method="POST">
					<div class="row p-3">
						<div class="col-6">
							<div class="form-group">
								<label for="nom_ado" class="<?php echo $obj_emp->for; ?>">Nombre:</label>
								<input type="text" name="nom_ado" id="nom_ado" placeholder="Nombre:" minlength="3" maxlength="50" require="" class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="ape_ado" class="<?php echo $obj_emp->for; ?>">Apellido:</label>
								<input type="text" name="ape_ado" id="ape_ado" placeholder="Apellido:" minlength="3" maxlength="50" require="" class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-6">
							<div class="form-group">
								<label for="gen_ado" class="<?php echo $obj_emp->for; ?>">Genero:</label>
								<select name="gen_ado" id="gen_ado" class="<?php echo $obj_ado->input_normal; ?>">
									<option value="">Seleccione...</option>
									<option value="H">Hombre</option>
									<option value="M">Mujer</option>
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="nac_ado" class="<?php echo $obj_emp->for; ?>">Fecha de nacimiento:</label>
								<input type="date" name="nac_ado" id="nac_ado" placeholder="Fecha de nacimiento:" require="" class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-4">
							<div class="form-group">
								<label for="tip_ado" class="<?php echo $obj_emp->for; ?>">Tipo:</label>
								<select name="tip_ado" id="tip_ado" class="<?php echo $obj_ado->input_normal; ?>">
									<option value="">Seleccione...</option>
									<option value="V">Venezolano</option>
									<option value="E">Extranjero</option>
								</select>
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label for="ced_ado" class="<?php echo $obj_emp->for; ?>">Cédula:</label>
								<input type="text" name="ced_ado" id="ced_ado" placeholder="Cédula:" minlength="1" maxlength="8" require="" class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label for="tel_ado" class="<?php echo $obj_emp->for; ?>">Teléfono:</label>
								<input type="text" name="tel_ado" id="tel_ado" placeholder="Teléfono:" minlength="11" maxlength="11" require="" class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-6">
							<div class="form-group">
								<label for="cor_ado" class="<?php echo $obj_emp->for; ?>">Correo:</label>
								<input type="email" name="cor_ado" id="cor_ado" placeholder="Correo:" minlength="1" maxlength="100" require="" class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="cod_car" class="<?php echo $obj_emp->for; ?>">Cargo:</label>
								<select name="cod_car" id="cod_car" class="<?php echo $obj_ado->input_normal; ?>">
									<option value="">Seleccione...</option>
									<?php/* while (($cargo=$obj_car->extraer_dato())>0)
										{
											echo "<option value='$cargo[cod_car]'>$cargo[nom_car]</option>";
										}
									*/?>
								</select>
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-6">
							<div class="form-group">
								<label for="cla_ado" class="<?php echo $obj_emp->for; ?>">Clave:</label>
								<input type="password" name="cla_ado" id="cla_ado" placeholder="Clave:" minlength="8" maxlength="20" class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="cla_ado" class="<?php echo $obj_emp->for; ?>">Repita la clave:</label>
								<input type="password" name="cla_ado" id="cla_ado" placeholder="Repita la clave:" minlength="8" maxlength="20" class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-12">
							<div class="form-group">
								<label for="dir_ado" class="<?php echo $obj_emp->for; ?>">Dirección:</label>
								<input type="text" name="dir_ado" id="dir_ado" placeholder="Dirección:" minlength="3" maxlength="100" require="" class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" name="ejecutar" id="ejecutar" value="insertar" class="<?php echo $obj_ado->btn_enviar; ?>">Registrar</button>
					</div>
				</form>
			</div>-->
		</div>
	</div>

<?php 
	
	pie();

?>