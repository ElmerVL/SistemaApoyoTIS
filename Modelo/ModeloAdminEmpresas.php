<?php

require ('../Controlador/Conexion.php');

function crear_tabla_bajas_empresas() {
    $conexion = new Conexion();
    $conexion->getConection();
    $sql = "SELECT * FROM usuario as u , grupo_empresa as ge WHERE u.idusuario=ge.usuario_idusuario";
    $rows = $conexion->ejecutarSql($sql);
    $miarchivo = fopen('../Vista/Otros/tablaEmpresas.data', 'w');
    $cadena = "<table border=1><tr> <td>GRUPO - EMPRESA</td><td>ESTADO</td></tr> ";
    
    for ($i = 0; $i < count($rows); $i++) {
        $row = $rows[$i];
        $nombreEmpresa = $row['nombrelargoge'];
        $estado_cuenta = $row['habilitada'];
        if ($estado_cuenta == "t") {
            $cadena .= "<tr><td>$nombreEmpresa</td> <td><a href=opcion.php?nombreGe=$nombreEmpresa>deshabilitar</a></td> </tr>";
        } else {
            $cadena .= "<tr><td>$nombreEmpresa</td> <td><a href=opcion.php?nombreGe=$nombreEmpresa>habilitar</a></td> </tr>";
        }
    }
    $cadena .= "</table>";
    fwrite($miarchivo, $cadena);
    fclose($miarchivo);
}
