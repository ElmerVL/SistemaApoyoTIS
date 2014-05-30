<?php

require '../Controlador/Conexion.php';

function verificarLogin($login) {
    $conec = new Conexion();
    $con = $conec->getConection();
    $sql = "SELECT login FROM Usuario where login= '$login'";
    
    $result = pg_query($con,$sql);
    $rows = pg_num_rows($result);
    if($rows==0)
    {
        return FALSE;
    }
 else {
        return TRUE;    
    }
}