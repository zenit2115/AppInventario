<?php
$con=@mysqli_connect('localhost', 'root', '123456','inventario');
  if (!$conexion) {

    die("Fallo al conectar a base datos, detalle: " . mysqli_error($conexion));

}



 $db_select = mysqli_select_db( $conexion,"abm");

 if (!$db_select) {

    die("Error al seleccionar base datos, detalle: " . mysqli_error($db_select));

}



 $sql = "SELECT * FROM ict_subcategorias ORDER BY 1 ASC";

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

        ->setTitle("Exportar subcategorias")

        ->setSubject("Ejemplo 1")

        ->setDescription("Documento generado...")

        ->setKeywords("subcategorias")

        ->setCategory("subcategorias");    



		$objPHPExcel->getActiveSheet()->setCellValue('A1','Detalle de Subcategorias');

		

      $objPHPExcel->setActiveSheetIndex()->setCellValue('A3', 'NOMBRE SUBCATEGORIA');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('B3', 'NOMBRE DE CATEGORIA');

		

   $i = 4;



while($row = mysqli_fetch_array($resultado)){



      $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$i, $row['icp_id_subcategorias']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$i, $row['icsubcategoriasnombre']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$i, $row['icp_id_categorias']);

	   

	  $i++;

}

$objPHPExcel->getActiveSheet()->setTitle('SUBCATEGORIAS');

}

header('Content-Type: application/vnd.ms-excel');

header('Content-Disposition: attachment;filename="subcategorias.xls"');

header('Cache-Control: max-age=0');



$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');

$objWriter->save('php://output');

exit;

mysqli_close ();

?>