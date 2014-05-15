<?php

require('../Controlador/Conexion.php');
    
function insertarProyecto($np,$cp,$ffp)
{
    $conec=new Conexion(); 
    $con=$conec->getConection();

    $nombre_proyecto=$np;
    $codigo_proyecto=$cp;
    $fecha_fin_proyecto=$ffp;
    
//Hacemos algunas validaciones
    //if(empty($autor)) $autor = "Anónimo";
    //if(empty($titulo)) $titulo = "Sin título";
//Evitamos que el usuario ingrese HTML
    //$mensaje = htmlentities($mensaje);

    
    //echo $nombre_proyecto."titulo:".$codigo_proyecto."mensaje:".$fecha_fin_proyecto;
    $sql = "INSERT INTO proyecto (codproyecto, consultor_idconsultor, nombreproyecto, fechafinproyecto, vigente)";
    $sql.= "VALUES ('$codigo_proyecto','1','$nombre_proyecto','$fecha_fin_proyecto','TRUE')";
     pg_query($con,$sql) or die ("ERROR ====> en registro del proyecto :( " .pg_last_error());
    
}
?>
