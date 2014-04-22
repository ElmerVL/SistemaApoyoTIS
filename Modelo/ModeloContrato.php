<?php

require '../Controlador/Conexion.php';

function conseguirNombreLargo($codEmpresa) {
    $con = new Conexion();
    $c=$con->getConection();
    $consulta = pg_query($c, 'SELECT nombrelargoge FROM grupo_empresa WHERE codgrupo_empresa='.$codEmpresa.';');
    while ($f = pg_fetch_object($consulta)){
        $nlargo = $f->nombrelargoge;
        return $nlargo;
    }
    exit();
    pg_close($c);
}

function conseguirNombreCorto($codEmpresa) {
    $con = new Conexion();
    $c=$con->getConection();
    $consulta = pg_query($c, 'SELECT nombrecortoge FROM grupo_empresa WHERE codgrupo_empresa='.$codEmpresa.';');
    while ($f = pg_fetch_object($consulta)){
        $ncorto = $f->nombrecortoge;
        return $ncorto;
    }
    exit();
    pg_close($c);
}

function conseguirRepresentanteLegal($codEmpresa) {
    $con = new Conexion();
    $c=$con->getConection();
    $consulta = pg_query($c, 'select nombresocio, apellidossocio from socio where grupo_empresa_codgrupo_empresa ='.$codEmpresa.' and tipo_socio_codtipo_socio = 1;');
    while ($f = pg_fetch_object($consulta)){
        $nrepresentante = $f->nombresocio;
        $aprepresentante = $f->apellidossocio;
        return "$nrepresentante"." "."$aprepresentante";
    }
    exit();
    pg_close($c);
}

function conseguirProyecto() {
    $con = new Conexion();
    $c=$con->getConection();
    $consulta = pg_query($c, 'select nombreproyecto from proyecto where vigente = TRUE;');
    while ($f = pg_fetch_object($consulta)){
        $nproyecto = $f->nombreproyecto;
        return $nproyecto;
    }
    exit();
    pg_close($c);
}

function conseguirCodigoProyecto() {
    $con = new Conexion();
    $c=$con->getConection();
    $consulta = pg_query($c, 'select idproyecto from proyecto where vigente = TRUE;');
    while ($f = pg_fetch_object($consulta)){
        $idproyecto = $f->idproyecto;
        return $idproyecto;
    }
    exit();
    pg_close($c);
}