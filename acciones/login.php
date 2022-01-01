<?php 
require_once 'conexion.php';
class procesando extends Conexion{
	public $db;
    function __construct(){
         $this->db = parent::conectar();
    }
    public function logue(){
    	$user=$_POST["usua"];
		$pass=$_POST["contra"];
    	$sql=
			"SELECT ict_usuarios.icu_nombres,
			ict_usuarios.icu_clave
			from ict_usuarios
			where ict_usuarios.icu_nombreUsuario = '$user' and ict_usuarios.icu_clave = '$pass' ";
         $resultado = $this->db->query($sql);
         if ($resultado->num_rows > 0)
            {
                while ($row = $resultado->fetch_array()){
					echo'query de insertar fecha de login'
					
                    $_SESSION["usu"]=$row['icu_nombres'];
					$_SESSION["sta"]=1;
					if($row['icu_nombres']=='admin'){
						header('Location: home.php');
					}else{
						header('Location: home.php');
					}
                }
            }else{
                header('Location: home.php?user=invalido&pass='.urlencode($pass).'&usua'.$user);
            }
    }
}
?>