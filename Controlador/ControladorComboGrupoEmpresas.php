<?php

require ('../Controlador/Conexion.php');

obtenerGrupoEmpresas();

function obtenerGrupoEmpresas() {
    $conexion = new Conexion();
    $conexion->getConection();
    $sql = " SELECT codgrupo_empresa,nombrelargoge from grupo_empresa" ;
    $rows = $conexion->ejecutarSql($sql);
    $caden="";
        $miarchivo=fopen('../Vista/Otros/grupos.data','w');
        fclose($miarchivo);
    for ($i = 0; $i < count($rows); $i++) {
        $row = $rows[$i];
        $cod_grupo=$row['codgrupo_empresa'];
        $nombre_grupo=$row['nombrelargoge'];
        $caden ="<option value=$cod_grupo>$nombre_grupo</option>";
        $escribir =  fopen("../Vista/Otros/grupos.data", "a"); 
        fwrite($escribir,"$caden");
    }
    return $caden;
}
?>