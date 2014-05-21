<?php
require '../Modelo/ModeloRegistroEntregables.php';
$codGE=$_GET['a'];
$codPlanPago=$_GET['codP'];
$codHito=$_GET['codHito'];
$entregable=$_POST['entregable'];
$m_t=$_GET['m_t'];
$p_s=$_GET['p_s'];
insertarEntrgables($codGE,$codPlanPago, $codHito, $entregable);
header("Location: ../Vista/iu.registroDePlanDePagos.php?a=$codGE&codP=$codPlanPago&codHito=$codHito&m_t=$m_t&p_s=$p_s&tabla");
?>
