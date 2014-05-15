<?php

require ('../Controlador/Conexion.php');

  function obtenerActividades() {
    $conexion = new Conexion();
    $conexion->getConection();
    $sql = " SELECT codcons_actividad,visiblepara,requiererespuesta,fechainicio,fechafin,horainicio,horafin,titulo "
            . "FROM cons_actividad "
            . "ORDER BY fechainicio desc";
    $rows = $conexion->ejecutarSql($sql);
    $cadena = "<table border=1><tr><td>COD</td><td>VISIBLE</td><td>REQUIERE</td><td>FECHA INI</td><td>FECHA FIN</td><td>HORA INI</td><td>HORA FIN</td><td>titulo</td><td> DESCRIPCION </td><td> RESPONDER </td></tr>";
    for ($i = 0; $i < count($rows); $i++) {
        $row = $rows[$i];
        $cod= $row['codcons_actividad'];
        $visible = $row['visiblepara'];
        $requiere = $row['requiererespuesta'];
        $fechaini = $row['fechainicio'];
        $fechafin = $row['fechafin'];
        $horaini = $row['horainicio'];
        $horafin = $row['horafin'];
        $titulo = $row['titulo'];
        $cadena .= "<tr><td>$cod</td><td>$visible</td><td>$requiere</td><td>$fechaini</td><td>$fechafin</td><td>$horaini</td><td>$horafin</td><td>$titulo</td><td><a href=''>Ver</a></td></tr>";
    }
    $cadena .= "</table>";
    echo $cadena;
    return $cadena;
}

?>