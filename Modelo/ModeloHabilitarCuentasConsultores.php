<?php
require ('../Controlador/Conexion.php');

function habilitarCuentaConsultor($cuentaConsultor){
    $conexion = new Conexion();
    $conexion->getConection();
    $sql = "update usuario set habititada='t' where idusuario='$cuentaConsultor'";
    $rs = pg_query($sql);
    header("Location: ../Vista/iuAdminCuentasConsultores.php");
}
?>
