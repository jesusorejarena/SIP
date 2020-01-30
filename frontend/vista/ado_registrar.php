<?php 

	require("tema.php");
	require("../../backend/clase/cargo.class.php");

	$obj_car = new cargo;
	$obj_car->estandar();
	$obj_car->puntero=$obj_car->listar_normal();

	encabezado("Registrar empleado - ALCOR C.A.");

?>

	<div class="<?php echo $obj_car->container; ?>">
		<div class="row pb-3 mb-3 bg-white">
			<div class="col-12 text-left">
				<button class="<?php echo $obj_car->btn_atras; ?>" onClick="window.location.href='ado_.php'">Atras</button>
			</div>
		</div>
		<div class="<?php echo $obj_car->card; ?>" style="width: 40rem">
			<h2 class="<?php echo $obj_car->titulocard; ?>">Registrar empleado</h2>
			<hr>
			<div class="card-body">
				<form action="../../backend/controlador/empleado.php" method="POST">
					<div class="row p-3">
						<div class="col-6">
							<div class="form-group">
								<label for="nom_ado" class="text-white text-left h5">Nombre:</label>
								<input type="text" name="nom_ado" id="nom_ado" placeholder="Nombre:" minlength="3" maxlength="50" require="" class="<?php echo $obj_car->input_normal; ?>">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="ape_ado" class="text-white text-left h5">Apellido:</label>
								<input type="text" name="ape_ado" id="ape_ado" placeholder="Apellido:" minlength="3" maxlength="50" require="" class="<?php echo $obj_car->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-6">
							<div class="form-group">
								<label for="gen_ado" class="text-white text-left h5">Genero:</label>
								<select name="gen_ado" id="gen_ado" class="<?php echo $obj_car->input_normal; ?>">
									<option value="">Seleccione...</option>
									<option value="H">Hombre</option>
									<option value="M">Mujer</option>
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="nac_ado" class="text-white text-left h5">Fecha de nacimiento:</label>
								<input type="date" name="nac_ado" id="nac_ado" placeholder="Fecha de nacimiento:" require="" class="<?php echo $obj_car->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-4">
							<div class="form-group">
								<label for="tip_ado" class="text-white text-left h5">Tipo:</label>
								<select name="tip_ado" id="tip_ado" class="<?php echo $obj_car->input_normal; ?>">
									<option value="">Seleccione...</option>
									<option value="V">Venezolano</option>
									<option value="E">Extranjero</option>
								</select>
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label for="ced_ado" class="text-white text-left h5">Cédula:</label>
								<input type="text" name="ced_ado" id="ced_ado" placeholder="Cédula:" minlength="1" maxlength="8" require="" class="<?php echo $obj_car->input_normal; ?>">
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label for="tel_ado" class="text-white text-left h5">Telefono:</label>
								<input type="text" name="tel_ado" id="tel_ado" placeholder="Telefono:" minlength="11" maxlength="11" require="" class="<?php echo $obj_car->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-6">
							<div class="form-group">
								<label for="cor_ado" class="text-white text-left h5">Correo:</label>
								<input type="email" name="cor_ado" id="cor_ado" placeholder="Correo:" minlength="1" maxlength="100" require="" class="<?php echo $obj_car->input_normal; ?>">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="car_ado" class="text-white text-left h5">Cargo:</label>
								<select name="car_ado" id="car_ado" class="<?php echo $obj_car->input_normal; ?>">
									<option value="">Seleccione...</option>
									<?php while (($cargo=$obj_car->extraer_dato())>0)
										{
											echo "<option value='$cargo[cod_car]'>$cargo[nom_car]</option>";
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-6">
							<div class="form-group">
								<label for="cla_ado" class="text-white text-left h5">Clave:</label>
								<input type="password" name="cla_ado" id="cla_ado" placeholder="Clave:" minlength="8" maxlength="20" class="<?php echo $obj_car->input_normal; ?>">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="cla_ado" class="text-white text-left h5">Repita la clave:</label>
								<input type="password" name="cla_ado" id="cla_ado" placeholder="Repita la clave:" minlength="8" maxlength="20" class="<?php echo $obj_car->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-12">
							<div class="form-group">
								<label for="dir_ado" class="text-white text-left h5">Dirección:</label>
								<input type="text" name="dir_ado" id="dir_ado" placeholder="Dirección:" minlength="3" maxlength="100" require="" class="<?php echo $obj_car->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="row p-3 text-center">
						<div class="col-6">
							<div class="form-group">
								<button type="reset" name="ejecutar" id="ejecutar" value="limpiar" class="<?php echo $obj_car->btn_limpiar; ?>">Limpiar</button>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<button type="submit" name="ejecutar" id="ejecutar" value="insertar" class="<?php echo $obj_car->btn_enviar; ?>">Registrar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php 
	
	pie();

?>