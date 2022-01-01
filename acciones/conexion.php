<?php 

function conectar(){

$db_host="localhost";
$db_nombre="inventario";
$db_usuario="root";
$db_contra="123456";
//$db_contra="";

$conexion=mysqli_connect($db_host,$db_usuario,$db_contra /*,$db_nombre*/ );

if(!$conexion){
	die ("La conexion al servidor no se ha realizado, error: ".mysqli_connect_errno());
}else{
	//Este echo es solo de prueba inicial por si funciona la conexion.
	//echo "La conexion se ha realizado con éxito";		
}

mysqli_select_db($conexion,$db_nombre) or die("La conexion a la base de datos no se ha realizado, puede haber un fallo en el nombre del mismo");
return ($conexion);

}

?>