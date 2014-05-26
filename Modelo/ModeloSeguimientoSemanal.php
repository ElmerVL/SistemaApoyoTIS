<?php

require '../Controlador/Conexion.php';

function insertar($cod_grupo_empresa, $cod_evaluacion, $rol, $esperado) {
    $con = new Conexion();
    $c = $con->getConection();
    
    $cons_id_usuario_ge = pg_query($c, "select usuario_idusuario from grupo_empresa where codgrupo_empresa = ".$cod_grupo_empresa.";");
    $id_usuario_conseguido = pg_fetch_object($cons_id_usuario_ge);
    $id_usuario_ge = $id_usuario_conseguido->usuario_idusuario;
    
    $cons_cod_calendario = pg_query($c, "select codcalendario from calendario where grupo_empresa_codgrupo_empresa = ".$cod_grupo_empresa.";");
    $cod_conseguido = pg_fetch_object($cons_cod_calendario);
    $cod_calendario = $cod_conseguido->codcalendario;

    $consulta = pg_query($c, "INSERT INTO detalle_ge(evaluacion_semanal_calendario_grupo_empresa_usuario_idusuario, evaluacion_semanal_calendario_grupo_empresa_codgrupo_empresa, evaluacion_semanal_calendario_codcalendario, evaluacion_semanal_codevaluacion_semanal, rol, esperado) VALUES (".$id_usuario_ge.", ".$cod_grupo_empresa.", ".$cod_calendario.", ".$cod_evaluacion.", '".$rol."', '".$esperado."');");
 
}

function mostrarRegistros($cod_grupo_empresa, $cod_avance_semanal) {
    $con = new Conexion();
    $c=$con->getConection();
    $consulta = pg_query($c, 'select iddetalle_ge, rol, esperado from detalle_ge where evaluacion_semanal_calendario_grupo_empresa_codgrupo_empresa = '.$cod_grupo_empresa.' and evaluacion_semanal_codevaluacion_semanal = '.$cod_avance_semanal.';');
    while ($f = pg_fetch_object($consulta)){
        $cod = $f->iddetalle_ge;
        $rol = $f->rol;
        $esperado = $f->esperado;
        echo "<tr>"
        . "<td><a href='../Vista/iuSeguimientoDocenteGE.php?a=$cod_grupo_empresa&b=$cod_avance_semanal&c=$cod&r=$rol&e=$esperado'>$cod</td></a><td>$rol</td><td>$esperado</td>"
                . "</tr>";
    }
    exit();
    pg_close($c);
}

function ingresarDetalleConsultor($cod_grupo_empresa, $cod_evaluacion, $cod_registro, $realizado, $observaciones){
    $con = new Conexion();
    $c = $con->getConection();
    
    $cons_id_usuario_ge = pg_query($c, "select usuario_idusuario from grupo_empresa where codgrupo_empresa = ".$cod_grupo_empresa.";");
    $id_usuario_conseguido = pg_fetch_object($cons_id_usuario_ge);
    $id_usuario_ge = $id_usuario_conseguido->usuario_idusuario;
    
    $cons_cod_calendario = pg_query($c, "select codcalendario from calendario where grupo_empresa_codgrupo_empresa = ".$cod_grupo_empresa.";");
    $cod_conseguido = pg_fetch_object($cons_cod_calendario);
    $cod_calendario = $cod_conseguido->codcalendario;

    $consulta = pg_query($c, "INSERT INTO detalle_cons(consultor_idconsultor, detalle_ge_evaluacion_semanal_codevaluacion_semanal, detalle_ge_evaluacion_semanal_calendario_codcalendario, detalle_ge_evaluacion_semanal_calendario_grupo_empresa_codgrupo, detalle_ge_evaluacion_semanal_calendario_grupo_empresa_usuario_, detalle_ge_iddetalle_ge, realizado, observaciones) VALUES (1, ".$cod_evaluacion.", ".$cod_calendario.", ".$cod_grupo_empresa.", ".$id_usuario_ge.", ".$cod_registro.", '".$realizado."', '".$observaciones."')");

    
}