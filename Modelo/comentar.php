
<?php 
require '../Controlador/Conexion.php';

function mostrarArchivo($nom){
$nombre = $nom;
$aux2;
    if ($nombre==1) {
    $archivo = insertaRespuesta($comentario, $nombre,$nombreArchivo);
    $aux2=  include '../Vista/Otros/'.$archivo.'.data';
    }
return $aux2;    
}
function insertaRespuesta($a,$b,$nombreArchivo){
 
$nombre = $a;
$comentario = $b;
$archivo=$nombreArchivo;
$leer = fopen("../Vista/Otros/".$archivo.".data", "r"); 
$aleer = fread($leer ,filesize("../Vista/Otros/".$archivo.".data")); 

$escribir =  fopen("../Vista/Otros/".$archivo.".data","w"); 
fwrite($escribir,"<b>Nombre:</b> $nombre<br><b>Comentario:</b><p>$comentario</p><hr>$aleer"); 
fclose($escribir); 
}
function retornarCodForo($autor){
  $au = $autor;  
  $conexion = new Conexion();
  $con = $conexion->getConection();
  //SELECT codforo FROM foro WHERE autor= 'ELMER VALENCIA';
  $consulta = pg_query($con,"SELECT codforo FROM foro WHERE autor='$au';");
  $row = pg_fetch_object($consulta);
  $AUX = $row->codforo;
  echo $AUX;
  return $AUX;
}

?>
