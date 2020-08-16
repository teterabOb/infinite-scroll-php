<?php
#Archivo de conexion a la BDD
#Variables necesarias para la conexion
$usuario = 'root';
$contrasena = 'root';
$db = 'prueba';
$host = 'localhost';

$link = mysqli_init();
$conexion = mysqli_real_connect($link,$host,$usuario,$contrasena,$db);

/*
$resultado = 0;
if($conexion > 0){
    echo "Conexion exitosa";
}else{
    echo "Conexion fallida";
};
*/

?>