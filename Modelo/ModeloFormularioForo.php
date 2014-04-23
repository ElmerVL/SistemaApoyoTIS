<?php

require('../Controlador/Conexion.php');
    
    
function agregar($a,$b,$c)
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
    
}
    


?>
