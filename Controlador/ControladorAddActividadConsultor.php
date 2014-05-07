<?php
require ('../Modelo/ModeloAddActividadConsultor.php');
$visible_para= $_POST["visible_para"];
$req_repuesta= $_POST["requiere"];
$fecha_ini=$_POST["fecha_inicio"];
$fecha_fin=$_POST["fecha_fin"];
$hora_ini=$_POST["hora_ini"];
$hora_fin=$_POST["hora_fin"];
$titulo=$_POST["txt_titulo"];
$descripcion=$_POST["ctxt_descripcion"];
$activa= "TRUE";
$contestada="FALSE";

AddActividad($visible_para, $req_repuesta,$fecha_ini,$fecha_fin,$hora_ini,$hora_fin,$titulo, $descripcion,$activa,$contestada);
?>

