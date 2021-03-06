<?php

	// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
	require_once '../../librerias/dompdf/autoload.inc.php';

	require_once("../../backend/clase/modulo.class.php");
	require_once("../../backend/clase/empresa.class.php");

	$cod_mod=$_REQUEST['cod_mod'];

	$obj_mod = new modulo;
	$obj_mod->cod_mod=$cod_mod;
	$obj_mod->puntero=$obj_mod->listar_modificar();
	$modulo=$obj_mod->extraer_dato();

	$obj_emp = new empresa;
	$obj_emp->puntero=$obj_emp->listar_modificar();
	$empresa=$obj_emp->extraer_dato();

	use Dompdf\Dompdf;

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	$dompdf->loadHtml("

		<html>

			<head>

				<meta charset='UTF-8'>
				<title>Reporte del Módulo N° $cod_mod</title>
				<link rel='stylesheet' href='../css/estilospdf.css'>

			</head>

			<body>
				<table>
					<tr class='head'>
						<th class='head' colspan='1' style='text-align: center;'><img src='../img/logo3.png' width='250px'></th>
						<th class='head' colspan='3' style='text-align: center;'><h3>Reporte del Módulo <br> N° $cod_mod</h3></th>
						<th class='head' colspan='2'></th>
					</tr>
					<tr class='nada'>
						<th class='nada' colspan='6'></th>
					</tr>
					<tr class='tr'>
						<th class='th' colspan='3'>Código</th>
						<th class='th' colspan='3'>Nombre</th>
					</tr>
					<tr class='tr'>
						<td class='td' colspan='3'>$modulo[cod_mod]</td>
						<td class='td' colspan='3'>Menú de $modulo[nom_mod]</td>
					</tr>
					<tr class='espacio'>
						<th class='espacio' colspan='6'></th>
					</tr>
					<tr class='tr'>
						<th class='th' colspan='2'>Estatus</th>
						<th class='th' colspan='2'>Fecha de Creación</th>
						<th class='th' colspan='2'>Ultima Modificación</th>
					</tr>
					<tr class='tr'>
						<td class='td' colspan='2'>$modulo[est_mod]</td>
						<td class='td' colspan='2'>$modulo[cre_mod]</td>
						<td class='td' colspan='2'>$modulo[act_mod]</td>
					</tr>
					<tr class='espacio'>
						<th class='espacio' colspan='6'></th>
					</tr>
					<tr class='tr'>
						<th class='th' colspan='2'>Estado</th>
						<th class='th' colspan='2'>Fecha de Eliminación</th>
						<th class='th' colspan='2'>Fecha de Restauración</th>
					</tr>
					<tr class='tr'>
						<td class='td' colspan='2'>$modulo[bas_mod]</td>
						<td class='td' colspan='2'>$modulo[eli_mod]</td>
						<td class='td' colspan='2'>$modulo[res_mod]</td>
					</tr>
					<tr class='nada'>
						<th class='nada' colspan='6'></th>
					</tr>
					<tr class='footer'>
							<td class='footer' colspan='1' style='text-align: left;'>
								<p><b>Dirección: </b>$empresa[dir_emp]<br>
								<b>E-mail: </b>$empresa[cor_emp]<br>
								<b>Teléfono: </b>$empresa[tel_emp]</p>
							</td>
							<td class='footer' colspan='3' style='text-align: center;'>
								<p>
									$empresa[nom_emp]<br>
									$empresa[rif_emp]<br>
								</p>
							</td>
							<td class='footer' colspan='2' style='text-align: right;'>
								<p>
									<b>Horario:</b><br>
									$empresa[hou_emp]<br>
									$empresa[hod_emp]<br>
								</p>
							</td>
						</tr>
				</table>
			</body>

		</html>

	");

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'landscape');

	// Render the HTML as PDF
	$dompdf->render();

	$nombre="Reporte_Modulo_$cod_mod.pdf";

	// Output the generated PDF to Browser
	$dompdf->stream($nombre);

?>