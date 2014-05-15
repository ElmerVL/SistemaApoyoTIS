<?php
require '../Modelo/ModeloProcesarSubidaArchivo.php';

$nombreArchivo=$_FILES['nombre_archivo_subir']['name'];
$nombreTemporalArchivo=$_FILES['nombre_archivo_subir']['tmp_name'];
$tipoArchivo=$_FILES['nombre_archivo_subir']['type'];
$visiblePara="publico";
$gestion="3-2014";
$proyecto="juesVirtual";
$consultor="Acero";
$nombreGrupoempresa="Camaleon";

     
subirArchivo($visiblePara,$gestion,$proyecto,$consultor,$nombreArchivo,$nombreTemporalArchivo,$tipoArchivo);     
?>
