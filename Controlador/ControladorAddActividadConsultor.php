<?php
require ('../Modelo/ModeloAddActividadConsultor.php');
$visible_para= $_POST["combo_visible"];
$req_repuesta= $_POST["requiere"];
$fecha_ini=$_POST["fecha_inicio"];
$fecha_fin=$_POST["fecha_fin"];
$hora_ini=$_POST["hora_ini"];
$hora_fin=$_POST["hora_fin"];
$titulo=$_POST["txt_titulo"];
$descripcion=$_POST["ctxt_descripcion"];
$activa= "FALSE";
$contestada="FALSE";

$nombreArchivo=$_FILES['nombre_archivo_subir']['name'];
$nombreTemporalArchivo=$_FILES['nombre_archivo_subir']['tmp_name'];
$tipoArchivo=$_FILES['nombre_archivo_subir']['type'];

$gestion="2014";
$proyecto="juesVirtual";
$consultor="Acero";
$nombreGrupoempresa=$visible_para;



AddActividad($visible_para, $req_repuesta,$fecha_ini,$fecha_fin,$hora_ini,$hora_fin,$titulo, $descripcion,$activa,$contestada);



subirArchivo($visiblePara,$gestion,$proyecto,$consultor,$nombreArchivo,$nombreTemporalArchivo,$tipoArchivo);
?>

