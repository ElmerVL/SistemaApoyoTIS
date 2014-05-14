<?php

$nombre=$_GET['nombre2']; 
$destino=$_GET['destino2'];
$titulo=$_GET['titulo2'];
$descripcion=$_GET['descripcion2'];



function insertarNoticia($nombre_archivo,$titulo_archivo,$destino_archivo,$descripcion_archivo)
{
 
 date_default_timezone_set("America/La_Paz");
 $fecha=date("d/m/y H:i:s");

 $abrir =  fopen("../Vista/Otros/datosNoticias.data", "r");
 $lectura = fread($abrir, filesize("../Vista/Otros/datosNoticias.data"));
 

 $escribir =  fopen("../Vista/Otros/datosNoticias.data", "a"); 
 fwrite($escribir,"<p style=background-image:url(C:/xampp/htdocs/SistemaApoyoTIS/Vista/imagenes/imagen.jpg);><b>Archivo subido:</b> $fecha</b><br/>
                   <b>Titulo:</b>$titulo_archivo</b><br/>
                   <b>Descripción:</b>$descripcion_archivo</b><br/>
                   <b>Nombre:</b>$nombre_archivo</b><br/>
                   <a href='$destino_archivo'>descargar</a><b></p><hr></p>");
 //fwrite($escribir,"<b>Nombre:</b> $nombre_archivo <br><b><a href='$destino_archivo'></a></b></p><hr>");
 fclose($escribir);
 header('Location:../Vista/iu.consultor.php');
}
echo insertarNoticia($nombre,$titulo,$destino,$descripcion);