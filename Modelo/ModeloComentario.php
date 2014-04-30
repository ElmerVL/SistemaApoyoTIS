
<?php 

$nombre=$_POST['nombre'];
$comentario=$_POST['comentario'];
//qui el nombre de archivo
$archivo ="1";
$leer = fopen("../Vista/Otros/".$archivo.".data", "r"); 
$aleer = fread($leer ,filesize("../Vista/Otros/".$archivo.".data")); 

$escribir =  fopen("../Vista/Otros/".$archivo.".data","w"); 
fwrite($escribir,"<b>Nombre:</b> $nombre<br><b>Comentario:</b><p>$comentario</p><hr>$aleer"); 
fclose($escribir);

header("Location: ../Vista/iu.Foro.php");

?>
