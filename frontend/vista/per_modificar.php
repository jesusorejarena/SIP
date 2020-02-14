<?php	

	//session
	
	require_once("tema.php");
	require_once("../../backend/clase/permiso.class.php");
	require_once("../../backend/clase/cargo.class.php");
	require_once("../../backend/clase/modulo.class.php");

	$obj_per = new permiso;
	$obj_per->estandar();

	$cod_per=$_REQUEST['cod_per'];

	$obj_per->asignar_valor();
	$obj_per->puntero=$obj_per->listar_modificar();
	$permiso=$obj_per->extraer_dato();

	$obj_car = new cargo;
	$obj_car->puntero=$obj_car->listar_normal();

	$obj_mod = new modulo;
	$obj_mod->puntero=$obj_mod->listar_normal();

	encabezado("Modificar permiso - ALCOR C.A.");

?>

	<div class="<?php echo $obj_per->container; ?>">
		<div class="row pb-3 mb-3 bg-white">
			<div class="col-12 text-left">
				<button class="<?php echo $obj_per->btn_atras; ?>" onClick="window.location.href='rol_menu.php'">Atras</button>
			</div>
		</div>
		<div class="<?php echo $obj_per->card; ?>" style="width: 40rem">
			<h2 class="<?php echo $obj_per->titulocard; ?>">Modificar permiso</h2>
			<hr>
			<div class="card-body">
				<form action="../../backend/controlador/permiso.php" method="POST">
					<div class="row p-3">
						<div class="col-6">
							<div class="form-group">
								<input type="hidden" name="cod_mod" id="cod_mod" value="<?php echo $permiso['cod_mod']; ?>">
								<label for="cod_car" class="<?php echo $obj_per->for; ?>">Cargo:</label>
								<select name="cod_car" id="cod_car" required="" class="<?php echo $obj_per->input_normal; ?>">
									<option value="">Seleccione...</option>
									<?php while (($cargo=$obj_car->extraer_dato())>0)
										{
											$select=($cargo['cod_car']==$permiso['cod_car']) ? "selected" : "" ;
											echo "<option $select value='$cargo[cod_car]'>$cargo[nom_car]</option>";
										}
									?>
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="cod_mod" class="<?php echo $obj_per->for; ?>">Módulo:</label>
								<select name="cod_mod" id="cod_mod" required="" class="<?php echo $obj_per->input_normal; ?>">
									<option value="">Seleccione...</option>
									<?php while (($modulo=$obj_mod->extraer_dato())>0)
										{
											$select=($modulo['cod_mod']==$permiso['cod_mod']) ? "selected" : "" ;
											echo "<option $select value='$modulo[cod_mod]'>$modulo[nom_mod]</option>";
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-12">
							<div class="form-group">
							<label for="est_mod" class="<?php echo $obj_per->for; ?>">Estatus:</label>
								<select name="est_mod" id="est_mod" required="" class="<?php echo $obj_per->input_normal; ?>">
									<option value="">Seleccione...</option>
									<?php $seleccionado=($permiso["est_mod"]=="A")?"selected":""; ?>
									<option <?php echo $seleccionado; ?> value="A">Activo</option>
									<?php $seleccionado=($permiso["est_mod"]=="I")?"selected":""; ?>
									<option <?php echo $seleccionado; ?> value="I">Inactivo</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row p-3 text-center">
						<div class="col-6">
							<div class="form-group">
								<button type="reset" name="ejecutar" id="ejecutar" value="limpiar" class="<?php echo $obj_per->btn_limpiar; ?>">Limpiar</button>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<button type="submit" name="ejecutar" id="ejecutar" value="modificar_normal" class="<?php echo $obj_per->btn_enviar; ?>">Modificar</button>
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