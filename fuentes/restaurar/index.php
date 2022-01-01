<?php
//Datos de la base de datos
$mysqlDatabaseName ='inventario';
$mysqlUserName ='root';
$mysqlPassword ='123456';
$mysqlHostName ='localhost';
$mysqlExportPath ='db_daily_backup.sql';

// Backup con mysqldump
//$command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;
//$command ='c:\xampp\mysql\bin\mysqldump.exe --opt -u '.$mysqlUserName.' -p'.$mysqlPassword.' '.$mysqlDatabaseName.' > '.$mysqlExportPath;
//exec($command);

$command='mysql -h' .$mysqlHostName .' -u' .$mysqlUserName .' --password="' .$mysqlPassword .'" ' .$mysqlDatabaseName .' < ' .$mysqlImportFilename;
exec($command,$output,$worked);


switch(0){
case 0:
echo 'La base de datos <b>' .$mysqlDatabaseName .'</b> se ha restaurado correctamente en la siguiente ruta '.getcwd().'/' .$mysqlExportPath .'</b>';
break;
case 1:
echo 'Se ha producido un error al exportar <b>' .$mysqlDatabaseName .'</b> a '.getcwd().'/' .$mysqlExportPath .'</b>';
break;
case 2:
echo 'Se ha producido un error de exportación, compruebe la siguiente información: <br/><br/><table><tr><td>Nombre de la base de datos:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>Nombre de usuario MySQL:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>Contraseña MySQL:</td><td><b>NOTSHOWN</b></td></tr><tr><td>Nombre de host MySQL:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
break;
}
?>