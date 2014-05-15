<?php
require '../Modelo/ModeloProcesarSubidaArchivo.php';

$nombreArchivo=$_FILES['nombre_archivo_subir']['name'];
$nombreTemporalArchivo=$_FILES['nombre_archivo_subir']['tmp_name'];
$tipoArchivo=$_FILES['nombre_archivo_subir']['type'];
$visiblePara="yo_consultor";
$gestion="3-2014";
$proyecto="juesVirtual";
$consultor="Acero";
$nombreGrupoempresa="Cabritos";

     echo "tipo de archivo: ".$tipoArchivo."<br>";
     echo "nombre de archivo: ".$nombreArchivo."<br>";
     echo "nombre temporal de archivo: ".$nombreTemporalArchivo."<br>";
     echo 'visible para: '.$visiblePara;
     echo 'TODAS LAS VARIABLES YA FUERON PASADAS';
     
subirArchivo($visiblePara,$gestion,$proyecto,$consultor,$nombreArchivo,$nombreTemporalArchivo,$tipoArchivo)     

//subirArchivo($visible_para,$gestion, $proyecto, $consultor,$nombreGrupoempresa,$nombreArchivo,$nombreTemporalArchivo,$tipoArchivo);
?>
