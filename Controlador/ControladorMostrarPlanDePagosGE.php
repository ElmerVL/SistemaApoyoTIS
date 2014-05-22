<?php
    require '../Modelo/ModeloMostrarPlanDePagosGE.php';
    function mostrarPlanDePagosGE($codGE){
        $planDePagosGE = retornarPlanDePagosGE($codGE);
        return $planDePagosGE;    
    }
?>
