<?php 

function insertarComentarioForo($nombre, $comentario, $var){
//qui el nombre de archivo
$archivo =$var;
$leer = fopen("../Vista/Otros/".$archivo.".data", "r"); 
$aleer = fread($leer ,filesize("../Vista/Otros/".$archivo.".data")); 

$escribir =  fopen("../Vista/Otros/".$archivo.".data","w"); 
fwrite($escribir,"<strong>$nombre</strong><br><p>$comentario</p><hr>$aleer"); 
fclose($escribir);
}
?>