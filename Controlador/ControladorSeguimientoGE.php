<?php
require '../Modelo/ModeloSeguimientoSemanal.php';
function mostrarRegistroAvanceGE($cod_ge, $cod_avance){
    mostrarRegistros($cod_ge, $cod_avance);
    require_once '../Vista/iuTablaSeguimientoDocenteGE.php';
}