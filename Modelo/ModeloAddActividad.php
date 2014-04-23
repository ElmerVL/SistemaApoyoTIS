<?php

require('../Controlador/Conexion.php');
    
    
function AddActividad($visible_para,$req_repuesta,$fecha_ini,$hora_ini,$fecha_fin,$hora_fin,$titulo,$descripcion)
{
    $conec=new Conexion(); 
    $con=$conec->getConection();

     
    $actividad_visible_para=$visible_para;
    $actividad_requiere_respuesta = $req_repuesta;
    $fecha_inicio_actividad = $fecha_ini;
    $hora_inicio_actividad = $hora_ini;
    $fecha_fin_actividad=$fecha_fin;
    $hora_fin_actividad=$hora_fin;
    $titulo_actividad=$titulo;
    $descripcion_actividad=$descripcion;
    

    
    echo "visible para:".$actividad_visible_para."requiere respuesta:".$actividad_requiere_respuesta."fecha inicio:".$fecha_inicio_actividad."hora inicio:".$hora_inicio_actividad."fecha fin:".$fecha_fin_actividad."hora fin actividad:".$hora_fin_actividad."titulo Actividad".$titulo_actividad."Descripcion Actividad:".$descripcion_actividad; 
    $sql = "INSERT INTO actividad (autor, titulo, mensaje)";
    $sql.= "VALUES ('$autor','$titulo','$mensaje')";
     pg_query($con,$sql) or die ("ERROR ====> al grabar el sms :( " .pg_last_error());
    
}
    


?>
