<?php 

//Incluye la clase conn para hacer uso de sus propiedades
include  ('conn.php');
//Ciclo para ingresar registros en la tabla publicaciones
//Realiza hasta 10 inserciones parametrizadas
for($x=0; $x<10; $x++){
    #URL API desde donde obtendremos texto aleatorio
    $url = 'https://loripsum.net/api/4/short';
    #Realiza la llamada, obtiene datos
    $coments = file_get_contents($url, true );
    #Inicializa fecha actual
    $fecha = date('Y-m-d H:i:s');
    #Realiza query de insercion
    $query="INSERT INTO `publicaciones` (`comentario`, `fecha`) VALUES ('$coments', '$fecha')";
    #Obtiene resultado de la query
    $result = mysqli_query($link, $query);
}
?>

