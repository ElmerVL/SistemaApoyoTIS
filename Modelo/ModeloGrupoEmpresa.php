<?php
require '../Controlador/Conexion.php';
function mostrarListaEmpresas($a,$u){
    $con = new Conexion();
    $c=$con->getConection();
    $consulta = pg_query($c, 'select codgrupo_empresa,usuario_idusuario,nombrelargoge from grupo_empresa');
    $array_GE = array();
    while ($f = pg_fetch_object($consulta)){
        $cge = $f->codgrupo_empresa;
        $cuge = $f->usuario_idusuario;
        $nge = $f->nombrelargoge;
        
        $array_GE[] = "<a href = '../Vista/iuDocenteVistaEmpresa.php?a=$a&u=$u&c_a=$cge&i_u=$cuge'>$nge</a>"; 
        /*echo "<tr>"
        . "<td><a href = '../Vista/iuDocenteVistaEmpresa.php?a=$a&u=$u&c_a=$cge&i_u=$cuge'>$nge</a></td>"
                . "</tr>";
         */
    }
    return $array_GE;
    //exit();
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

function mostrarEmpresas() {
    $con = new Conexion();
    $c=$con->getConection();
    $consulta = pg_query($c, 'select codgrupo_empresa, nombrelargoge from grupo_empresa');
    while ($f = pg_fetch_object($consulta)){
        $a = $f->codgrupo_empresa;
        $nge = $f->nombrelargoge;
        echo "<tr>"
        . "<td><a href = '../Vista/iuGrupoEmpresa.php?a=$a'>$nge</a></td>"
                . "</tr>";
    }
    exit();
    pg_close($c);
}