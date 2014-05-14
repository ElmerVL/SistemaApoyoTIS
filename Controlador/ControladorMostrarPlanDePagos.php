<?php
require('../Modelo/ModeloPropuestaPlanDePago.php');
    
    function mostrarPlan($cod){
        $codplan_pago =$cod;
        $listaPlanDePago = mostrarPlanDePago($codplan_pago);
    return $listaPlanDePago;    
    }
?>
