<?php

require ('../Controlador/Conexion.php');

function habilitarCuentaEmpresa($nombreGrupo) {
    $conexion = new Conexion();
    $conexion->getConection();
    $sql = "update usuario set habilitada='t' where login = '$nombreGrupo'";
    $rs = pg_query($sql);
    header("Location: ../Vista/iuAdminCuentasEmpresas.php");
}

?>