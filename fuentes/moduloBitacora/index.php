<?php

    session_start();

    require("../../acciones/conexion.php");

    // $con=@mysqli_connect('localhost', 'root', '123456','inventario');
	//$con=@mysqli_connect('localhost', 'root', '','inventario');
    $con = conectar();
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

    if($_SESSION['prueba'] == 'admin' ){

        $query = "SELECT r.ict_usuarios,r.fechaentrada,r.horaentrada,r.fechasalida,r.horasalida,u.nombre,u.apellido,u.tipoUsuario 
                  FROM registro r 
                  INNER JOIN ict_usuarios u ON r.ict_usuarios=icp_id_usuario";

        $result = mysqli_query($con,$query);

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Ver Bitácora</title>
    <link rel="icon" href="favicon/favicon.ico">
    <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css"/> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>

	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
    <!-- <script src="public/bootstrap/js/bootstrap.js"></script> -->
	<!-- <script src="public/js/jquery-1.11.2.min.js"></script> -->
    

</head>
<body>  
    <div> <h1>Bitácora</h1></div>
<div class="table-condensed">
    <table id="tblBitacora" class="table table-bordered table-striped table-hover text-center" style="width:100%">
        <thead>
            <tr>
                <th  class="text-center">Usuario</th>
                <th  class="text-center">Perfil</th>
                <th  class="text-center">Fecha Entrada</th>
                <th  class="text-center">Hora Entrada</th>
                <th  class="text-center">Fecha Salida</th>
                <th  class="text-center">Hora Salida</th>              
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_array($result)){ ?>

            <tr> 
                <td><?= $row['nombre']. " ".$row['apellido'] ?></td>
                <td><?= $row['tipoUsuario'] ?></td>
                <td><?= $row['fechaentrada']?></td>
                <td><?= $row['horaentrada'] ?></td>
                <td><?= $row['fechasalida'] == NULL ? ' ----' :  $row['fechasalida'] ?></td>
                <td><?= $row['horasalida'] == NULL ? ' ----' : $row['horasalida'] ?></td>
            </tr>
            <?php }   ?>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function(){  
    $('#tblBitacora').DataTable();
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<?php } ?>
</body>
</html>






