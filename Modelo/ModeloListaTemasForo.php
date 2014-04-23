

<?php
 require ('../Controlador/Conexion.php');
 function listaForo(){
  // Conectar con la base de datos y seleccionarla
    $conec=new Conexion(); 
    $con=$conec->getConection();  
    
  // Ejecutar la consulta SQL
  $result = pg_query($con,'SELECT titulo,autor FROM foro');

  // Crear el array de elementos para la capa de la vista
  $posts = array();
  while($row = pg_fetch_array($result))
  {
     $posts[] = $row;
  }
  // Closing connection
  pg_close($con);
  return $posts;
}

?>


