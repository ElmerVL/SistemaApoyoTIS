<?php
require '../Controlador/Conexion.php';

function verificarLogin($login) {
    $conec = new Conexion();
    $con = $conec->getConection();
    $sql = "SELECT login FROM Usuario where login= '$login'";
    $result = pg_query($con, $sql);
    $rows = pg_num_rows($result);
    if ($rows == 0) {
        echo "true";
    } else {
        echo "false";
    }
}

function verificarNombreLargoEmpresa($nombre_empresa) {
    $conec = new Conexion();
    $con = $conec->getConection();
    $sql = "SELECT * FROM grupo_empresa where nombrelargoge='$nombre_empresa' or nombrecortoge='$nombre_empresa'";
    $result = pg_query($con, $sql);
    $rows = pg_num_rows($result);
    if ($rows == 0) {
        echo "true";
    } else {
        echo "false";
    }
}
function verificarNombreCortoEmpresa($nombre_empresa) {
    $conec = new Conexion();
    $con = $conec->getConection();
    $sql = "SELECT * FROM grupo_empresa where nombrelargoge='$nombre_empresa' or nombrecortoge='$nombre_empresa'";
    $result = pg_query($con, $sql);
    $rows = pg_num_rows($result);
    if ($rows == 0) {
        echo "true";
    } else {
        echo "false";
    }
}
function verificarTelefonoEmpresa($telefono) {
    $conec = new Conexion();
    $con = $conec->getConection();
    $sql = "SELECT * FROM grupo_empresa where telefonoge ='$telefono'";
    $result = pg_query($con, $sql);
    $rows = pg_num_rows($result);
    if ($rows == 0) {
        echo "true";
    } else {
        echo "false";
    }
}
function verificarCorreoEmpresa($correo) {
    $conec = new Conexion();
    $con = $conec->getConection();
    $sql = "SELECT * FROM grupo_empresa where correoge ='$correo'";
    $result = pg_query($con, $sql);
    $rows = pg_num_rows($result);
    if ($rows == 0) {
        echo "true";
    } else {
        echo "false";
    }
}


?>
