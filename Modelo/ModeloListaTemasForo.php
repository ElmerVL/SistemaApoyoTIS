

<?php
 require ('../Controlador/Conexion.php');
 function mostrarListaForo(){
  // Conectar con la base de datos y seleccionarla
    $conec=new Conexion(); 
    $con=$conec->getConection();  
    
  // Ejecutar la consulta SQL
  $result = pg_query($con,'SELECT codforo,titulo,autor FROM foro');
  $AUX=0;
  while ($row = pg_fetch_object($result)){
        $cod = $row->codforo;
        $t = $row->titulo;
        $a = $row->autor;
        echo "<tr>"
        . "<td><a href = '../Vista/ListaRespuestasForo.php?codforo=$cod'>$t</a></td>"
                . "<td>$AUX</td>"
                . "<td>$a</td>"
                . "</tr>";
    }
    exit();
    pg_close($con);

}
?>
