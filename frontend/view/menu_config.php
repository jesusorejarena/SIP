<?php

require_once("tema_session.php");

headerr("Menú de Configuración");

checkAdminOrClient(1);

?>

<div class="container-fluid p-3">
	<h1 class="text-center text-primary font-weight-bold p-3">Auditoria y Respaldo</h1>
	<div class="row justify-content-center">
		<div class="col-12 col-xl-4">
			<div class="card rounded-lg shadow my-3 px-3 py-4">
				<h4 class="card-title text-center text-primary font-weight-bold">Menú de Formularios</h4>
				<div class="card-body">
					<h5 class="pt-1">Empresa:</h5>
					<div class="row">
						<div class="col-6"><a class="btn btn-primary btn-block" href="emp_listartodo_resp.php">Lista</a></div>
						<div class="col-6"><a class="btn btn-primary btn-block" href="emp_filtrar_resp.php">Filtrar</a></div>
					</div>
					<h5 class="pt-3">Cargos:</h5>
					<div class="row">
						<div class="col-6"><a class="btn btn-primary btn-block" href="car_listartodo_resp.php">Lista</a></div>
						<div class="col-6"><a class="btn btn-primary btn-block" href="car_filtrar_resp.php">Filtrar</a></div>
					</div>
					<h5 class="pt-3">Permisos:</h5>
					<div class="row">
						<div class="col-6"><a class="btn btn-primary btn-block" href="per_listartodo_resp.php">Lista</a></div>
						<div class="col-6"><a class="btn btn-primary btn-block" href="per_filtrar_resp.php">Filtrar</a></div>
					</div>
					<h5 class="pt-3">Usuarios:</h5>
					<div class="row">
						<div class="col-6"><a class="btn btn-primary btn-block" href="usu_listartodo_resp.php">Lista</a></div>
						<div class="col-6"><a class="btn btn-primary btn-block" href="usu_filtrar_resp.php">Filtrar</a></div>
					</div>
					<h5 class="pt-3">Proveedores:</h5>
					<div class="row">
						<div class="col-6"><a class="btn btn-primary btn-block" href="edo_listartodo_resp.php">Lista</a></div>
						<div class="col-6"><a class="btn btn-primary btn-block" href="edo_filtrar_resp.php">Filtrar</a></div>
					</div>
					<h5 class="pt-3">Productos:</h5>
					<div class="row">
						<div class="col-6"><a class="btn btn-primary btn-block" href="pro_listartodo_resp.php">Lista</a></div>
						<div class="col-6"><a class="btn btn-primary btn-block" href="pro_filtrar_resp.php">Filtrar</a></div>
					</div>
					<h5 class="pt-3">Formularios:</h5>
					<div class="row">
						<div class="col-6"><a class="btn btn-primary btn-block" href="for_listartodo_resp.php">Lista</a></div>
						<div class="col-6"><a class="btn btn-primary btn-block" href="for_filtrar_resp.php">Filtrar</a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-xl-4">
			<div class="card rounded-lg shadow my-3 px-3 py-4">
				<h3 class="card-title text-center text-primary font-weight-bold">Respaldo de Base de Datos</h3>
				<div class="card-body">
					<a class="btn btn-primary btn-block" href="../../database/backup/backup_db.php">Respaldar</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

footer();

?>