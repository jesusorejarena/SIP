<?php

require_once("tema_session.php");

headerr("Menú de Empleados");

check("Empleados", 1);

?>

<!-- Menu -->
<div class="container px-3 pt-3 pb-5 mb-5">
	<div class="row justify-content-center p-3">
		<div class="col-12 col-xl-4 p-1">
			<div class="card rounded-lg shadow my-3 px-3 py-4">
				<h3 class="card-title text-center text-primary font-weight-bold">Menú de Empleados</h3>
				<div class="card-body">
					<a class="btn btn-outline-primary btn-block" href="usu_registrar.php">Registrar</a>
					<a class="btn btn-outline-primary btn-block" href="usu_listartodo.php">Listar</a>
					<a class="btn btn-outline-primary btn-block" href="usu_filtrar.php">Filtrar</a>
					<a class="btn btn-outline-primary btn-block" href="usu_listarpapelera.php">Papelera</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

footer();

?>