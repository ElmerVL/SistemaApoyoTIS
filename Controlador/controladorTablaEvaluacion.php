<?php
require '../Modelo/ModeloEvaluacion.php';

function mostrarTabla($cod_cons, $cod_ge){
    mostrar_lista_criterios($cod_cons, $cod_ge);
    require_once '../Vista/iuTablaCriteriosEvaluacion.php';
}
