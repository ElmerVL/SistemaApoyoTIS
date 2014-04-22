<?php
require '../Controlador/Conexion.php';
function mostrarListaEmpresas() {
    $con = new Conexion();
    $c=$con->getConection();
    $consulta = pg_query($c, 'select codgrupo_empresa, nombrelargoge from grupo_empresa');
    while ($f = pg_fetch_object($consulta)){
        $cge = $f->codgrupo_empresa;
        $nge = $f->nombrelargoge;
        echo "<tr>"
        . "<td><a href = '../Vista/iuDocenteVistaEmpresa.php?cge=$cge'>$cge</a></td>"
                . "<td>$nge</td>"
                . "</tr>";
    }
    exit();
    pg_close($c);
}

function mostrarDatosEmpresa($codEmpresa) {
    $con = new Conexion();
    $c=$con->getConection();
    $consulta1 = pg_query($c, 'SELECT ge.nombrelargoge, ge.nombrecortoge, s.nombresocio, s.apellidossocio '
            . 'FROM grupo_empresa ge, socio s '
            . 'WHERE codgrupo_empresa='.$codEmpresa.' and tipo_socio_codtipo_socio = 1;');
    while ($f = pg_fetch_object($consulta1)){
        $nlargo = $f->nombrelargoge;
        $ncorto = $f->nombrecortoge;
        $nomrepresentante = $f->nombresocio;
        $aperepresentante = $f->apellidossocio;
        echo "$nlargo<br>$ncorto<br>$nomrepresentante\n$aperepresentante";
    }
    exit();
    pg_close($c);
}