<?php

require '../Modelo/ModeloDeshabilitarCuentas.php';
$cuenta_empresa = $_GET['ge'];

if (!empty($_GET['ge'])) {
    DeshabilitarCuentaEmpresa($cuenta_empresa);
}
?>

