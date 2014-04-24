<?php
$arreglo=$_GET['arreglo_datos'];

function insertarNoticia($datos)
{
 

 $abrir =  fopen("../Vista/Otros/datosNoticias.data", "r");
 $lectura = fread($abrir, filesize("../Vista/Otros/datosNoticias.data"));
 

 $escribir =  fopen("../Vista/Otros/datosNoticias.data", "a"); 
 fwrite($escribir,"<b>Nombre:</b>$datos[0]<br><a href='$datos[1]'></p><hr>");
 fclose($escribir);
 header('Location:../Vista/iu.noticias.php');
}
echo insertarNoticia($arreglo);