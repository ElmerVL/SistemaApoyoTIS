<?php

require '../Modelo/ModeloSeguimientoSemanal.php';

function mostrarRegistroAvanceGE($cod_ge, $cod_avance) {

    mostrarRegistros($cod_ge, $cod_avance);
    require_once '../Vista/iuTablaSeguimientoDocenteGE.php';
}

function mostrar_rol($id_detalle_avance) {
    conseguir_rol($id_detalle_avance);
}

function mostrar_esperado($id_detalle_avance) {
    conseguir_esperado($id_detalle_avance);
}

function mostrar_realizado($id_detalle_avance) {
    conseguir_realizado($id_detalle_avance);
}

function mostrar_observaciones($id_detalle_avance) {
    conseguir_observaciones($id_detalle_avance);
}

function mostrar_detalle_esperado($id_detalle_avance) {
    conseguir_detalle($id_detalle_avance);
}
