<?php
    require '../Modelo/ModeloEvaluacionHitoPagableGE.php';
    function mostrarEntregables($codHito){
        $entregables = retornarEntregables($codHito);
        if (isset($_REQUEST['true'])){return $entregables;}
        else{insertarTablaRegistros($codHito);return $entregables;}
            
    }
    if(isset($_REQUEST['registarEPPGE'])){
    $codGE=$_GET['codGE'];
    $codH=$_GET['codH'];
    $nombreH=$_GET['nombreH'];
    $monto=$_GET['monto'];
    $p_s=$_GET['p_s'];
      
    $entregable=$_POST['entregable'];    
    $porcentaje=$_POST['porcentaje'];
    $alcance=$_POST['porcentajeAlcansado'];
        
    $codE= retornarCodEntregables($codH, $entregable);
    $sumaAlcance=$alcance;
    eliminarEntregableTablaRegistros($codH,$entregable,$codE);
    registrarEvaluacionPlanDePagosGE($porcentaje, $alcance, $codGE, $codH, $entregable, $nombreH, $sumaAlcance);
    
    
    header("Location: ../Vista/iu.evaluacionHitoPagableGE.php?tablaEvaluacionNueva&true&tabla&codE=$codE&codGE=$codGE&codH=$codH&entregable=$entregable&nombreH=$nombreH&monto=$monto&p_s=$p_s");
    
    
    }
    function mostrarRegistrosEtregables($codHito){
        $listaEntregables= retornarRegistro($codHito);
        return $listaEntregables;
    }

    
?>
