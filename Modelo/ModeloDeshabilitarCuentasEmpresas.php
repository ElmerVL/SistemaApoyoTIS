<?php
require ('../Controlador/Conexion.php');
function DeshabilitarCuentaEmpresa($nombreGrupo){
    $conexion = new Conexion();
    $conexion->getConection();
    $sql = "update usuario set habilitada='f' where login = '$nombreGrupo'";
    $rs = pg_query($sql);
    header("Location: ../Vista/iuAdminCuentasEmpresas.php");
}
?>