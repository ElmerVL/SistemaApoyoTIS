<?php
require '../Controlador/Conexion.php';
function insertarEntrgables($codGE,$codPlanPago, $codHito, $entregable){
    $conec=new Conexion();
    $con=$conec->getConection();
    $c_ge=$codGE;
    $c_p=$codPlanPago;
    $c_h=$codHito;
    $ent=$entregable;
    
    $sql = "INSERT INTO entregables (hito_pagable_plan_pago_calendario_grupo_empresa_usuario_idusuar, hito_pagable_plan_pago_calendario_grupo_empresa_codgrupo_empres, hito_pagable_plan_pago_calendario_codcalendario, hito_pagable_plan_pago_codplan_pago, hito_pagable_codhito_pagable, entregable)";
    $sql.= "VALUES ('1','$c_ge','1','$c_p','$c_h','$ent')";
    pg_query($con,$sql) or die ("ERROR!!!!!" .pg_last_error());
}
?>
