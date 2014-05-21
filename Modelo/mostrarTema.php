

<?php
 require ('../Controlador/Conexion.php');
 function mostrarTema($codForo){
  // Conectar con la base de datos y seleccionarla
    $conec=new Conexion(); 
    $con=$conec->getConection(); 
  // Ejecutar la consulta SQL
  $result = pg_query($con,"SELECT titulo,autor,mensaje FROM foro WHERE codforo='$codForo';");
  // Crear el array de elementos para la capa de la vista


while  ($row = pg_fetch_object($result)){
      
  $retornar = "<l1><strong>".$row->autor."</strong></l1><br>";
  $retornar.="<l1><strong>". $row->titulo."</strong></l1><br>";
  $retornar.="<l1>". $row->mensaje."</l1>";

}
    // Closing connection
  pg_close($con);
  return $retornar;
}
//tengo aque aser la incercion ala columna de cantidad_comentarios en esta funcion 
function insertaRespuesta($a,$b,$nombreArchivo){
 $nombre = $a;
$comentario = $b;
$archivo=$nombreArchivo;
$leer = fopen("../Vista/Otros/".$archivo.".data", "r"); 
$aleer = fread($leer ,filesize("../Vista/Otros/".$archivo.".data")); 

$escribir =  fopen("../Vista/Otros/".$archivo.".data","w"); 
fwrite($escribir,"<b>Nombre:</b> $nombre<br><b>Comentario:</b><p>$comentario</p><hr>$aleer"); 
fclose($escribir);

return $archivo;
include '../Vista/ListaRespuestasForo.php';
}
?>