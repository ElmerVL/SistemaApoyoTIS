<?php

require '../Controlador/Conexion.php';

function conseguir_proyectos() {
    $con = new Conexion();
    $c = $con->getConection();
    $consulta_proyectos = pg_query($c, "select nombreproyecto, codproyecto from proyecto;");
    while ($f_proyectos = pg_fetch_object($consulta_proyectos)) {
        $nombre_proyecto = $f_proyectos->nombreproyecto;
        $cod_proyecto = $f_proyectos->codproyecto;
        echo "<option value='" . $cod_proyecto . "'>" . $nombre_proyecto . "</option>";
    }
    pg_close($c);
}
