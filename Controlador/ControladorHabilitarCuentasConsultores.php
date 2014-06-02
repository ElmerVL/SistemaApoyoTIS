<?php

require '../Modelo/ModeloHabilitarCuentasConsultores.php';
 
$cuentaConsultor = $_GET['cons'];
if (!empty($cuentaConsultor)) {
    habilitarCuentaConsultor($cuentaConsultor);
}
?>
