<?php
$con=@mysqli_connect('localhost', 'root', '123456','inventario');
  if (!$conexion) {

    die("Fallo al conectar a base datos, detalle: " . mysqli_error($conexion));

}



 $db_select = mysqli_select_db( $conexion,"abm");

 if (!$db_select) {

    die("Error al seleccionar base datos, detalle: " . mysqli_error($db_select));

}



 $sql = "SELECT * FROM ict_configuracion ORDER BY 1 ASC";

 $resultado = mysqli_query ($conexion, $sql) or die (mysqli_error($conexion));

 $registros = mysqli_num_rows ($resultado);

 

 if ($registros > 0) {

   require_once '../../public/Classes/PHPExcel.php';

   $objPHPExcel = new PHPExcel();

   

   //Informacion del excel

   $objPHPExcel->

    getProperties()

        ->setCreator("inventario-colegio.cl")

        ->setLastModifiedBy("inventario-colegio.cl")

        ->setTitle("Exportar configuraciont")

        ->setSubject("Ejemplo 1")

        ->setDescription("Documento generado...")

        ->setKeywords("configuracion")

        ->setCategory("configuracion");    



		$objPHPExcel->getActiveSheet()->setCellValue('A1','Detalle de Configuracion');

		

      $objPHPExcel->setActiveSheetIndex()->setCellValue('A3', 'ID CONFIGURACION');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('B3', 'RUT INSTITUCION');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('C3', 'NOMBRE INSTITUCION');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('D3', 'DIRECCION');

      $objPHPExcel->setActiveSheetIndex()->setCellValue('E3', 'TELEFONO');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('F3', 'RUT DIRECTOR');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('G3', 'NOMBRE DIRECTOR');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('H3', 'APELLIDO DIRECTOR');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('I3', 'E-MAIL DIRECTOR');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('J3', 'TELEFONO DIRECTOR');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('K3', 'TELEFONO FIJO DIRECTOR');	  

		

   $i = 4;



while($row = mysqli_fetch_array($resultado)){



      $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$i, $row['icp_id_proveedor']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$i, $row['icconfiguracion_rut']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$i, $row['icconfiguracion_nombre']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$i, $row['icconfiguracion_direccion']);

      $objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$i, $row['icconfiguracion_telefono1']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$i, $row['icconfiguracion_cedula']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$i, $row['icconfiguracion_nombredirector']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$i, $row['icconfiguracion_apellidodirector']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$i, $row['icconfiguracion_email']);	

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$i, $row['icconfiguracion_telefono2']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$i, $row['icconfiguracion_telefono3']);

	  

	  $i++;

}

$objPHPExcel->getActiveSheet()->setTitle('CONFIGURACION');

}

header('Content-Type: application/vnd.ms-excel');

header('Content-Disposition: attachment;filename="configuracion.xls"');

header('Cache-Control: max-age=0');



$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');

$objWriter->save('php://output');

exit;

mysqli_close ();

?>