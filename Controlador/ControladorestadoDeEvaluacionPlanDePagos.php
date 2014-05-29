<?php
    require '../Modelo/ModeloestadoDeEvaluacionPlanDePagos.php';
    function retornarEstadoTablaPagoConsultor(){
        $estadoTabla= retornarEstadoDeTabla();
        return $estadoTabla;
    }
    function retornarEstadoDeEvaluaciones(){
        $array_evaluaciones=  retornarEstadoDeEvaluacionesPlanDePagos();
        return $array_evaluaciones;
    } 
?>
