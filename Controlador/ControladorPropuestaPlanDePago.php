<?php
if(isset($_REQUEST['1'])){
    require '../Modelo/ModeloPropuestaPlanDePago.php';
    $cod_grupoE = $_GET['a'];
    $monto_total = $_POST['monto_total'];
    $porcentaje_satisfaccion = $_POST['porcentaje_satisfaccion'];
    $porcentaje=100;
    insertarPropuestaDePago($monto_total, $porcentaje_satisfaccion,$cod_grupoE);
    $codPlan_pago= retornarCodPlanDePago($monto_total,$porcentaje_satisfaccion);
    header("Location: ../Vista/iu.registroDePlanDePagos.php?a=$cod_grupoE&m_t=$monto_total&p_s=$porcentaje&cod=$codPlan_pago");
}
if(isset($_REQUEST['2'])){
    require '../Modelo/ModeloPropuestaPlanDePago.php';
    $cod_grupoE = $_GET['a'];
    $monto_total = $_POST['monto_total'];
    $porcentaje_satisfaccion = $_POST['porcentaje_satisfaccion'];   
    $hito_evento = $_POST['hito_evento'];
    $porcentaje_pago = $_POST['porcentaje_pago'];
    $fecha_pago = $_POST['fecha_pago'];
    $codigoPlan = $_POST['codPlan_pago'];
    $entregables = $_POST['entregables'];
    $monto = (($monto_total * $porcentaje_pago) / $porcentaje_satisfaccion);
    insertarRegistroDePlanDePago($monto_total, $porcentaje_satisfaccion, $hito_evento, $porcentaje_pago, $fecha_pago, $entregables, $codigoPlan, $cod_grupoE);
       
    if ($monto>0) {
        if($porcentaje_pago<=$porcentaje_satisfaccion){
        $M_T = $monto_total-$monto;
        $P_S = $porcentaje_satisfaccion-$porcentaje_pago;
        header("Location: ../Vista/iu.registroDePlanDePagos.php?a=$cod_grupoE&m_t=$M_T&p_s=$P_S&cod=$codigoPlan");
        } else {
            header("Location: ../Vista/iu.registroDePlanDePagos.php?a=$cod_grupoE&m_t=$monto_total&p_s=$porcentaje_satisfaccion&cod=$codigoPlan");
        }
        if ($M_T == 0){
            header("Location: ../Vista/iu.mostrarPlandePago.php?a=$cod_grupoE&cod=$codigoPlan");
        }
    } else {
        header("Location: ../Vista/iu.mostrarPlandePago.php?a=$cod_grupoE&cod=$codigoPlan");
    }
}

?>