<?php	

	//session
	
	require_once("tema.php");
	require_once("../../backend/clase/producto.class.php");
	require_once("../../backend/clase/proveedor.class.php");

	$obj_pro = new producto;
	$obj_pro->estandar();
	$obj_pro->puntero=$obj_pro->listar_normal();

	$obj_edo = new proveedor;

	encabezado("Lista de productos");

	comprobar("Productos");


?>

	<div class="<?php echo $obj_pro->container; ?>">
		<div class="row pb-3 mb-3 bg-white">
			<div class="col-12 text-left">
				<button class="<?php echo $obj_pro->btn_atras; ?>" onClick="window.location.href='pro_menu.php'"><i class="icon ion-md-arrow-round-back"></i></button>
			</div>
		</div>
		<div class="<?php echo $obj_pro->card; ?>">
			<h2 class="<?php echo $obj_pro->titulocard; ?>">Lista de productos</h2>
			<hr>
			<div class="row p-3 m-3">
				<div class="col-12">
					<div class="table-responsive">
						<table class="<?php echo $obj_pro->tabla; ?>">
							<thead>
								<tr>
									<th>Código</th>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Precio</th>
									<th>Cantidad</th>
									<th>Proveedor</th>
									<th>Fecha de Ingreso</th>
									<th>Ultima Modificación</th>
									<th>Fecha de Eliminación</th>
									<th>Fecha de Restauración</th>
									<th>Estatus</th>
									<th>PDF</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									while(($producto=$obj_pro->extraer_dato())>0)
									{
										$obj_edo->cod_edo=$producto['cod_edo'];
										$obj_edo->puntero=$obj_edo->filtrar();
										$proveedor=$obj_edo->extraer_dato();

										echo "<form action='../../backend/controlador/producto.php' method='POST'>
												<tr>
													<input type='hidden' name='cod_pro' value='$producto[cod_pro]'>
													<td>$producto[cod_pro]</td>
													<td>$producto[nom_pro]</td>
													<td>$producto[des_pro]</td>
													<td>$producto[pre_pro]</td>
													<td>$producto[can_pro]</td>
													<td>$proveedor[nom_edo]</td>
													<td>$producto[cre_pro]</td>
													<td>$producto[act_pro]</td>
													<td>$producto[eli_pro]</td>
													<td>$producto[res_pro]</td>
													<td>$producto[est_pro]</td>
													<td><a class='$obj_pro->btn_pdf' href='pro_reportepdf.php?cod_pro=$producto[cod_pro]'><i class='icon ion-md-document'></i></a></td>
													<td><a class='$obj_pro->btn_editar' href='pro_modificar.php?cod_pro=$producto[cod_pro]'><i class='icon ion-md-create'></i></a></td>
													<td><button type='submit' class='$obj_pro->btn_eliminar' name='ejecutar' value='modificar_eliminar'><i class='icon ion-md-trash'></i></button></td>
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