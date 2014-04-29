<?php

require('../Controlador/Conexion.php');
    //put your code here
    
function insertarForo($a,$b,$c)
{
    $conec=new Conexion(); 
    $con=$conec->getConection();

    $autor=$a;
    $titulo=$b;
    $mensaje=$c;
    
//Hacemos algunas validaciones
    if(empty($autor)) $autor = "Anónimo";
    if(empty($titulo)) $titulo = "Sin título";
//Evitamos que el usuario ingrese HTML
    $mensaje = htmlentities($mensaje);

    
    echo $autor."titulo:".$titulo."mensaje:".$mensaje;
    $sql = "INSERT INTO foro (autor, titulo, mensaje)";
    $sql.= "VALUES ('$autor','$titulo','$mensaje')";
     pg_query($con,$sql) or die ("ERROR ====> al grabar el sms :( " .pg_last_error());
     
 //crear su archivo.data
    $codForo = retornarCodForo($autor);
    $miarchivo=fopen('../Vista/Otros/'.$codForo.'.data','w');
    fclose($miarchivo);
}
  function retornarCodForo($autor){
  $au = $autor;  
  $conexion = new Conexion();
  $con = $conexion->getConection();
  $consulta = pg_query($con,"SELECT codforo FROM foro WHERE autor='$au';");
  $row = pg_fetch_object($consulta);
  $AUX = $row->codforo;
  echo $AUX;
  return $AUX;
}  
header("Location: ../Vista/iu.Foro.php");
?>