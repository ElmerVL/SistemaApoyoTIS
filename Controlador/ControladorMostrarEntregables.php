<?php
require('../Modelo/ModeloMostrarEntregables.php');
    
    function mostrarE($codplan_papo,$cod_hito,$cod_ge){
        $listaEntregables = mostrarEntregables($codplan_papo,$cod_hito,$cod_ge);
    return $listaEntregables;    
    }
?>
