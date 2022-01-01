<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php

//Direccion de nuestro servidor de base de datos
$db_host="localhost";//1

//Nombre de la base de datos
$db_nombre="inventario"; //2

//Nombre del usuario de la base de datos
$db_usuario="root"; //3

//Contraseña usuario
// $db_contra="123456"; //4
$db_contra=""; //4


/*Creo la conexion guardandola en la variable $conexion, mysqli_connect se usa desde php version 5. 1,3,4,2. pero el nombre de la base de datos se puede obviar en esta conexion y seleccionarla luego con un mysqli_select_db para capturar errores en un mensaje*/
$conexion=mysqli_connect($db_host,$db_usuario,$db_contra /*,$db_nombre*/ );

/*Creo un condicional preguntando si se ha realizado correctamente la conexion al servidor, tambien se puede insertar en la condicion un (mysqli_connect_errno())  y luego del mensaje poniendo exit(); para salir del codigo php y no seguir mostrando los errores cometidos a consecuencia de la conexion */
if(!$conexion){
	//Si la conexion falla presentame un mensaje de error y el tipo de error
	die ("La conexion al servidor no se ha realizado, error: ".mysqli_connect_errno());
}else{
	//Este echo es solo de prueba inicial por si funciona la conexion.
		echo "La conexion se ha realizado con éxito";	
}

//Para aceptar caracteres españoles como los acentos debo especificar su charset(juego[conjunto] de caracteres) a utilizar
mysqli_set_charset($conexion, "utf8");

//selccionar la base de datos y capturar los errores al no realizar la conexion con la base de datos.
mysqli_select_db($conexion,$db_nombre) or die("La conexion a la base de datos no se ha realizado, puede haber un fallo en el nombre del mismo");

//Creo el query o consulta a la base de datos
$consulta="select * from ict_usuarios";

//Realizamos la consulta y los datos los guardamos en la variable $resultados,  
$resultados=mysqli_query($conexion, $consulta);

//Cerrar la conexion.
mysqli_close($conexion);
?>

</body>
</html>