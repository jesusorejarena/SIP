<?php	

	//session
	
	require_once("tema.php");
	require_once("../../backend/clase/proveedor.class.php");

	$obj_edo = new proveedor;	
	$obj_edo->estandar();
	
	encabezado("Registrar Proveedor");

	comprobar("Proveedores");

?>

	<div class="<?php echo $obj_edo->container; ?>">
		<div class="row pb-3 mb-3 bg-white">
			<div class="col-12 text-left">
				<button class="<?php echo $obj_edo->btn_atras; ?>" onClick="window.location.href='edo_menu.php'"><i class="icon ion-md-arrow-round-back"></i></button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-12 col-md-8">
				<div class="<?php echo $obj_edo->card; ?>">
					<h2 class="<?php echo $obj_edo->titulocard; ?>">Registrar Proveedor</h2>
					<hr>
					<div class="card-body">
						<form action="../../backend/controlador/proveedor.php" method="POST">
							<div class="row p-3">
								<div class="col-12">
									<div class="form-group">
										<label for="nom_edo" class="<?php echo $obj_edo->for; ?>">Nombre:</label>
										<input type="text" name="nom_edo" id="nom_edo" placeholder="Ejemplo: ALCOR C.A" minlength="2" maxlength="50" required="" class="<?php echo $obj_edo->input_normal; ?>">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="des_edo" class="<?php echo $obj_edo->for; ?>">Descripción:</label>
										<textarea name="des_edo" id="des_edo" placeholder="Ejemplo: Distribuidor de genericos" minlength="3" maxlength="100" class="<?php echo $obj_edo->input_text; ?>"></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="dir_edo" class="<?php echo $obj_edo->for; ?>">Dirección:</label>
										<textarea name="dir_edo" id="dir_edo" placeholder="Ejemplo: La Concordia, Barrio el Carmen" minlength="3" maxlength="100" required="" class="<?php echo $obj_edo->input_text; ?>"></textarea>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="tel_edo" class="<?php echo $obj_edo->for; ?>">Teléfono:</label>
										<input type="text" name="tel_edo" id="tel_edo" placeholder="Ejemplo: 04241234567" pattern="[0-9]+" minlength="11" maxlength="11" required="" class="<?php echo $obj_edo->input_normal; ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="cor_edo" class="<?php echo $obj_edo->for; ?>">Correo:</label>
										<input type="email" name="cor_edo" id="cor_edo" placeholder="Ejemplo: alcor@gmail.com" minlength="1" maxlength="100" required="" class="<?php echo $obj_edo->input_normal; ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="tip_edo" class="<?php echo $obj_edo->for; ?>">Tipo:</label>
										<select name="tip_edo" id="tip_edo" class="<?php echo $obj_edo->input_normal; ?>">
											<option value="">Seleccione...</option>
											<option value="V">Venezolano</option>
											<option value="P">Personal</option>
											<option value="J">Juridico</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="rif_edo" class="<?php echo $obj_edo->for; ?>">RIF:</label>
										<input type="text" name="rif_edo" id="rif_edo" placeholder="35161987-3" minlength="10" maxlength="10" required="" class="<?php echo $obj_edo->input_normal; ?>">
									</div>
								</div>
							</div>
							<div class="row p-3 text-center">
								<div class="col-6">
									<div class="form-group">
										<button type="reset" name="ejecutar" id="ejecutar" value="limpiar" class="<?php echo $obj_edo->btn_limpiar; ?>">Limpiar</button>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<button type="submit" name="ejecutar" id="ejecutar" value="insertar" class="<?php echo $obj_edo->btn_enviar; ?>">Registrar</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

<?php 
	
	pie();

?>