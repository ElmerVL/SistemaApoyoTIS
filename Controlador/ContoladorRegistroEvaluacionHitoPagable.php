<?php
require '../Modelo/ModeloRegistroEvaluacionHitoPagable.php';
$nombreHito=$_POST['hitoEvento'];
$porcentajeSatisfaccion=$_POST['porcentajeSatisfaccion'];
$porcentajeAlcanzado=$_POST['porcentajeAlcanzado'];
$codGE=$_GET['codGE'];
registraPagoConsultor($nombreHito,$porcentajeSatisfaccion,$porcentajeAlcanzado,$codGE);
header();
?>
