<?php
#Incluye a la clase para utilizar propiedades
include 'conn.php';
$arrResultado =  array();
$arrPublicaciones =  array();

#Valida  parámetro offset es distinto a NULL
if(isset($_GET['offset'])){
    $offset = $_GET['offset'];
#Si es nulo inicializa en 0
}else{
    $offset=0;
}

#Valida si el parámetro limit es distinto a NULL
if(isset($_GET['limit'])){
    $limit = $_GET['limit'];
#Si es nulo inicializa en 0
}else{
    $limit=0;
}

//Asigna el valor de $limit a la propiedad limit en nuestro objeto arrResultado
$arrResultado['limit'] = $limit;
//Asigna el valor de $offset a la propiedad offset en nuestro objeto arrResultado
$arrResultado['offset'] = $offset;

//Query para obtener listado de publicaciones segun parametros
//En orden descendente por el campo ID
$query = "SELECT * FROM `publicaciones` ORDER BY id ASC LIMIT ".$limit." OFFSET ".$offset;
//Obtiene datos 
$result = $link->query($query);

//Ciclo para obtener las propiedades id, comentario, fecha
while($row=$result->fetch_array()){
    //Guarda los valores en el arreglo $arrPublicaciones
    $arrPublicaciones[] = array(
        "id"=>$row['id'],
        "comentario"=>$row['comentario'],
        "fecha"=> $row['fecha']
    );
}

#Asignamos los comentarios a la variable 
$arrResultado['publicaciones'] = $arrPublicaciones;
#Mostramos los datos en formato JSON
echo json_encode($arrResultado);

?>