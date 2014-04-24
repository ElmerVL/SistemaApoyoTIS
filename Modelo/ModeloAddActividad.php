<?php

require('../Controlador/Conexion.php');
    
 //$visible_para,$req_repuesta,   
function AddActividad($fecha_ini,$fecha_fin,$titulo,$descripcion)
{
    $conec=new Conexion(); 
    $con=$conec->getConection();

     
    //$actividad_visible_para=$visible_para;
    //$actividad_requiere_respuesta = $req_repuesta;
    $fecha_inicio_actividad = $fecha_ini;
    $fecha_fin_actividad=$fecha_fin;
    $titulo_actividad=$titulo;
    $descripcion_actividad=$descripcion;
    

    
    //echo "visible para:".$actividad_visible_para."requiere respuesta:".$actividad_requiere_respuesta."fecha inicio:".$fecha_inicio_actividad."fecha fin:".$fecha_fin_actividad."titulo Actividad".$titulo_actividad."Descripcion Actividad:".$descripcion_actividad; 
    $sql = "INSERT INTO actividad (idactividad,calendario_grupo_empresa_usuario_idusuario,calendario_grupo_empresa_codgrupo_empresa,calendario_codcalendario,fechainicio,fechafin,titulo,descripcion)";
    $sql.= "VALUES (3,1,1,1,'$fecha_inicio_actividad','$fecha_fin_actividad','$titulo_actividad','$descripcion_actividad')";
     pg_query($con,$sql) or die ("ERROR :( " .pg_last_error());
    
     echo insertarActividad($titulo_actividad,$fecha_inicio_actividad,$fecha_fin_actividad,$descripcion_actividad);
}

function insertarActividad($titulo1,$fecha_ini1,$fecha_fin1,$descripcion1)
{
 

 $abrir =  fopen("../Vista/Otros/actividades.data", "r");
 $lectura = fread($abrir, filesize("../Vista/Otros/actividades.data"));
 

 $escribir =  fopen("../Vista/Otros/actividades.data", "a"); 
 fwrite($escribir,"<b>Titulo:</b>$titulo1<br><b>Fecha de inicio:</b>$fecha_ini1<br><b>Fecha fin:</b>$fecha_fin1<br><b>Descripción:</b>$descripcion1<br></p><hr>");
 fclose($escribir);
 header("Location: ../Vista/iu.consultor.php");
}


?>
