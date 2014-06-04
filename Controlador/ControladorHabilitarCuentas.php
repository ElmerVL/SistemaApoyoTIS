<?php
require '../Modelo/ModeloHabilitarCuentas.php';
$cuenta_empresa = $_GET['ge'];
if (!empty($_GET['ge'])) {
    habilitarCuentaEmpresa($cuenta_empresa);
}
?>
