<?php
$con=@mysqli_connect('localhost', 'root', '123456','inventario');

  if (!$conexion) {

    die("Fallo al conectar a base datos, detalle: " . mysqli_error($conexion));

}



 $db_select = mysqli_select_db( $conexion,"abm");

 if (!$db_select) {

    die("Error al seleccionar base datos, detalle: " . mysqli_error($db_select));

}



 $sql = "SELECT * FROM ict_proveedor ORDER BY 1 ASC";

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

        ->setTitle("Exportar proveedor")

        ->setSubject("Ejemplo 1")

        ->setDescription("Documento generado...")

        ->setKeywords("proveedor")

        ->setCategory("proveedor");    



	  $objPHPExcel->getActiveSheet()->setCellValue('A1','Detalle de Proveedor');



      $objPHPExcel->setActiveSheetIndex()->setCellValue('A3', 'ID PROVEEDOR');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('B3', 'RUT');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('C3', 'NOMBRE');

	  

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('D3', 'NOMBRE CONTACTO');

	  

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('E3', 'TELEFONO');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('F3', 'CELULAR');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('G3', 'DIRECCION');

	  

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('H3', 'CIUDAD');

	  

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('I3', 'E-MAIL');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('J3', 'SITIO WEB');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('K3', 'GIRO');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('L3', 'CONTACTO');



	  

		

   $i = 4;



while($row = mysqli_fetch_array($resultado)){



      $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$i, $row['icp_id_proveedor']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$i, $row['icp_rut']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$i, $row['icp_nombre']);

	  

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$i, $row['icp_nombrecontacto']);

	  

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$i, $row['icp_telefono']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$i, $row['icp_celular']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$i, $row['icp_direccion']);

	  

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$i, $row['icp_ciudad']);

	  

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$i, $row['icp_correo']);	

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$i, $row['icp_sitioweb']);

      $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$i, $row['icp_giro']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$i, $row['icp_contacto']);

	  

	  

	  $i++;

}

$objPHPExcel->getActiveSheet()->setTitle('PROVEEDOR');

    #Ajusto ancho de las columnas al texto 

	$letra = 'Z';

    for ($col = 'A'; $col != $letra; $col++) { 

        $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);         

    } 

}

header('Content-Type: application/vnd.ms-excel');

header('Content-Disposition: attachment;filename="proveedor.xls"');

header('Cache-Control: max-age=0');



$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');

$objWriter->save('php://output');

exit;

mysqli_close ();

?>