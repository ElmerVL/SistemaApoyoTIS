<?php
require ('../Modelo/ModeloAddActividad.php');
//$visible_para= $_POST["visible_para"];
//$req_repuesta= $_POST["requiere_respuesta"];
$fecha_ini=$_POST["fecha_inicio"];
$fecha_fin=$_POST["fecha_fin"];
$titulo=$_POST["txt_titulo"];
$descripcion=$_POST["ctxt_descripcion"];

AddActividad( $fecha_ini,$fecha_fin,$titulo, $descripcion);
//$visible_para, $req_repuesta,

?>

