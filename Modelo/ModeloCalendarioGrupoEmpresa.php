<?php

require '../Controlador/Conexion.php';

function insertar_fecha($cod_grupo_empresa, $fecha) {
    $con = new Conexion();
    $c = $con->getConection();
    $cons_id_usuario_ge = pg_query($c, "select usuario_idusuario from grupo_empresa where codgrupo_empresa = " . $cod_grupo_empresa . ";");
    $id_usuario_conseguido = pg_fetch_object($cons_id_usuario_ge);
    $id_usuario_ge = $id_usuario_conseguido->usuario_idusuario;

    $cons_cod_calendario = pg_query($c, "select codcalendario from calendario where grupo_empresa_codgrupo_empresa = " . $cod_grupo_empresa . ";");
    $cod_conseguido = pg_fetch_object($cons_cod_calendario);
    $cod_calendario = $cod_conseguido->codcalendario;

    $consulta = pg_query($c, "INSERT INTO evaluacion_semanal(calendario_codcalendario, calendario_grupo_empresa_codgrupo_empresa, calendario_grupo_empresa_usuario_idusuario, fecha)
    VALUES (" . $cod_calendario . ", " . $cod_grupo_empresa . ", " . $id_usuario_ge . ", '" . $fecha . "');");
}

function recuperar_fechas_reunionsemanal($cod_ge) {
    $con = new Conexion();
    $c = $con->getConection();
    $consulta = pg_query($c, "select fecha, codevaluacion_semanal from evaluacion_semanal where calendario_grupo_empresa_codgrupo_empresa =".$cod_ge);
    $arreglo_fechas = array();
    $arreglo_codigos = array();
    while ($f = pg_fetch_object($consulta)) {
        $fecha = $f->fecha;
        $codigo = $f->codevaluacion_semanal;
        $arreglo_fechas[] = $fecha;
    }
    return $arreglo_fechas;
}
function recuperar_codigos_reunionsemanal($cod_ge) {
    $con = new Conexion();
    $c = $con->getConection();
    $consulta = pg_query($c, "select fecha, codevaluacion_semanal from evaluacion_semanal where calendario_grupo_empresa_codgrupo_empresa =".$cod_ge);
    $arreglo_fechas = array();
    $arreglo_codigos = array();
    while ($f = pg_fetch_object($consulta)) {
        $fecha = $f->fecha;
        $codigo = $f->codevaluacion_semanal;
        $arreglo_fechas[] = $fecha;
    }
    return $arreglo_codigos;

    //   return $datos;
}
function conseguir_id_fecha($cod_ge, $d, $m, $a){
    $con = new Conexion();
    $c = $con->getConection();
    $consulta = pg_query($c, "select codevaluacion_semanal from evaluacion_semanal where calendario_grupo_empresa_codgrupo_empresa = ".$cod_ge." and fecha = '".$a."-".$m."-".$d."';");
    while ($f = pg_fetch_object($consulta)) {
        $cod_semana = $f->codevaluacion_semanal;
    }
    return $cod_semana;
}