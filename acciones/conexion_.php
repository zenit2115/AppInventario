<?php

function conectar_(){

    $db_host="localhost";
    $db_nombre="inventario";
    $db_usuario="root";
    $db_contra="123456";
    //$db_contra="";

    $conn = mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
    return $conn;
}

?>