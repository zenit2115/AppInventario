<?php
$con=@mysqli_connect('localhost', 'root', '123456','inventario');
  if (!$conexion) {

    die("Fallo al conectar a base datos, detalle: " . mysqli_error($conexion));

}



 $db_select = mysqli_select_db( $conexion,"abm");

 if (!$db_select) {

    die("Error al seleccionar base datos, detalle: " . mysqli_error($db_select));

}



 //$sql = "SELECT * FROM ict_producto ORDER BY 1 ASC";

 

$sql = " select icprod_codigo,icprod_producto,icprod_precio,icprod_cantidad,icp_nombre

,ictipodocumento,icprod_numero_doc,ictipopago,icprod_numero_cheque,

icprod_comentarios, icprod_fecha_compra, icprod_fecha_recepcion, ictiposubvencion, 

iccategoriasnombre, icsubcategoriasnombre, icprod_estado_producto, icprod_fecha_baja,

icprod_fecha_salida, icprod_ubicacion, icprod_fecha_envio, icprod_fecha_envio_recep,

icprod_nom_responsable, icprod_nom_especie, icprod_rut_responsable, icprod_funcion_responsable

from ict_producto, ict_proveedor, ict_tipodocumentos,ict_tipopago,ict_categorias,ict_subcategorias,ict_tiposubvencion

where ict_producto.icprod_proveedor=ict_proveedor.icp_id_proveedor

and ict_producto.icprod_tipo_doc = ict_tipodocumentos.icp_id_documentos

and ict_producto.icprod_tipo_pago= ict_tipopago.icp_id_tipopago

and ict_producto.icprod_tipo_categoria = ict_categorias.icp_id_categorias

and ict_producto.icprod_tipo_subcategoria = ict_subcategorias.icp_id_subcategorias

and ict_producto.icprod_tipo_subvencion= ict_tiposubvencion.icp_id_tiposubvencion

ORDER BY 1 ASC";

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

        ->setTitle("Exportar producto")

        ->setSubject("Ejemplo 1")

        ->setDescription("Documento generado...")

        ->setKeywords("producto")

        ->setCategory("producto");    



		$objPHPExcel->getActiveSheet()->setCellValue('A1','Detalle de Producto');

		

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('A3', 'CÓDIGO');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('B3', 'NOMBRE');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('C3', 'PRECIO');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('D3', 'CANTIDAD');

      $objPHPExcel->setActiveSheetIndex()->setCellValue('E3', 'PROVEEDOR');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('F3', 'TIPO DOCUMENTO');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('G3', 'NÚMERO DOCUMENTO');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('H3', 'TIPO DE PAGO');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('I3', 'NÚMERO CHEQUE');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('J3', 'COMENTARIOS');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('K3', 'FECHA DE COMPRA');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('L3', 'FECHA DE RECEPCIÓN');

      $objPHPExcel->setActiveSheetIndex()->setCellValue('M3', 'TIPO DE SUBVENCIÓN');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('N3', 'TIPO DE CATEGORÍA');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('O3', 'TIPO DE SUBCATEGORÍA');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('P3', 'ESTADO DEL PRODUCTO');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('Q3', 'FECHA DE BAJA');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('R3', 'FECHA DE SALIDA');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('S3', 'UBICACIÓN FÍSICA');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('T3', 'FECHA DE ENVÍO');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('U3', 'FECHA DE RECEPCIÓN');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('V3', 'RESPONSABLE DE MANTENIMIENTO');

      $objPHPExcel->setActiveSheetIndex()->setCellValue('W3', 'RESPONSABLE ESPECIE');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('X3', 'RUT RESPONSABLE');

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('Y3', 'FUNCIÓN RESPONSABLE');	  

		

   $i = 4;



while($row = mysqli_fetch_array($resultado)){

	

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$i, $row['icprod_codigo']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$i, $row['icprod_producto']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$i, $row['icprod_precio']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$i, $row['icprod_cantidad']);

      $objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$i, $row['icp_nombre']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$i, $row['ictipodocumento']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$i, $row['icprod_numero_doc']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$i, $row['ictipopago']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$i, $row['icprod_numero_cheque']);	

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$i, $row['icprod_comentarios']);

      $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$i, $row['icprod_fecha_compra']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$i, $row['icprod_fecha_recepcion']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('M'.$i, $row['ictiposubvencion']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('N'.$i, $row['iccategoriasnombre']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('O'.$i, $row['icsubcategoriasnombre']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('P'.$i, $row['icprod_estado_producto']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('Q'.$i, $row['icprod_fecha_baja']);  	  

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('R'.$i, $row['icprod_fecha_salida']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('S'.$i, $row['icprod_ubicacion']);

      $objPHPExcel->setActiveSheetIndex()->setCellValue('T'.$i, $row['icprod_fecha_envio']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('U'.$i, $row['icprod_fecha_envio_recep']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('V'.$i, $row['icprod_nom_responsable']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('W'.$i, $row['icprod_nom_especie']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('X'.$i, $row['icprod_rut_responsable']);

	  $objPHPExcel->setActiveSheetIndex()->setCellValue('Y'.$i, $row['icprod_funcion_responsable']);	  

	  

	  $i++;

}

$objPHPExcel->getActiveSheet()->setTitle('PRODUCTO');

    #Ajusto ancho de las columnas al texto 

	$letra = 'Z';

    for ($col = 'A'; $col != $letra; $col++) { 

        $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);         

    } 

}

header('Content-Type: application/vnd.ms-excel');

header('Content-Disposition: attachment;filename="productos.xls"');

header('Cache-Control: max-age=0');



$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');

$objWriter->save('php://output');

exit;

mysqli_close ();

?>