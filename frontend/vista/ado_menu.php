<?php	

	//session
	
	require_once("tema.php");
	require_once("../../backend/clase/empleado.class.php");

	$obj_ado = new empleado;
	$obj_ado->estandar();

	encabezado("Menu de Empleados - ALCOR C.A.");

?>

	<div class="<?php echo $obj_ado->container; ?>">
		<div class="row py-5"><div class="col-12"></div></div>
		<h2 class="<?php echo $obj_ado->titulos; ?>">Menú de Empleados</h2>
		<div class="<?php echo $obj_ado->card; ?>" style="width: 30rem">
			<div class="card-body">
				<div class="row p-1 m-1">
					<div class="col-6 text-center">
						<button class="<?php echo $obj_ado->btn_enviarg; ?>" onClick="window.location.href='ado_registrar.php'">Registrar</button>
					</div>
					<div class="col-6 text-center">
						<button class="<?php echo $obj_ado->btn_enviarg; ?>" onClick="window.location.href='ado_filtrar.php'">Filtrar</button>
					</div>
				</div>
				<div class="row p-1 m-1">
					<div class="col-6 text-center">
						<button class="<?php echo $obj_ado->btn_enviarg; ?>" onClick="window.location.href='ado_listartodo.php'">Lista</button>
					</div>
					<div class="col-6 text-center">
						<button class="<?php echo $obj_ado->btn_enviarg; ?>" onClick="window.location.href='ado_listarpapelera.php'">Papelera</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row py-5"><div class="col-12"></div></div>
	</div>


<?php 

	pie();

?>