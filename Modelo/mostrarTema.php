

<?php
 require ('../Controlador/Conexion.php');
 
 function listaTemas(){
  // Conectar con la base de datos y seleccionarla
    $conec=new Conexion(); 
    $con=$conec->getConection(); 
 
  // Ejecutar la consulta SQL
  $result = pg_query($con,'SELECT titulo,autor,mensaje FROM foro');
  // Crear el array de elementos para la capa de la vista


  $row = pg_fetch_object($result);
      
  $retornar = "<l1>AUTOR: ".$row->autor."</l1><br>";
  $retornar.="<l1>TITULO: ". $row->titulo."</l1><br>";
  $retornar.="<l1>MENSAJE: ". $row->mensaje."</l1>";


    // Closing connection
  pg_close($con);
  return $retornar;
}

?>