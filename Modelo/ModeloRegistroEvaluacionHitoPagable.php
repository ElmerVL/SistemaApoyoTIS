<?php
require '../Controlador/Conexion.php';
    function registraPagoConsultor($nombreHito,$porcentajeSatisfaccion,$porcentajeAlcanzado,$codGE){
        $conec=new Conexion(); 
        $con=$conec->getConection();  
        $n_h=$nombreHito;
        $p_s=$porcentajeSatisfaccion;
        $p_a=$porcentajeAlcanzado;
        
        //$id_uc=$idUsuarioC;
        //$id_c=$idConsultor;
        //$id_uge=$idUsuarioGE;
        $c_ge=$codGE;
        //$c_ca=$codCalendario;
        //$c_p=$codPlanPago;
        //$c_h=$codHitoPagable;
        
        if ($p_a<$p_s) {
            $sql2 = "INSERT INTO pago_consultor (consultor_usuario_idusuario,consultor_idconsultor,hito_pagable_plan_pago_calendario_grupo_empresa_usuario_idusuar,hito_pagable_plan_pago_calendario_grupo_empresa_codgrupo_empres,hito_pagable_plan_pago_calendario_codcalendario,hito_pagable_plan_pago_codplan_pago,hito_pagable_codhito_pagable,hitooevento,porcentajesatisfaccion,porcentajealcazado,estadopago)";
            $sql2.= "VALUES ('','','','$c_ge','','','','$n_h','$p_s','$p_a','NO ACEPTADO')";
            pg_query($con,$sql2) or die ("ERROR :( " .pg_last_error());
        }else if($p_a>=$p_s){
            $sql2 = "INSERT INTO pago_consultor (consultor_usuario_idusuario,consultor_idconsultor,hito_pagable_plan_pago_calendario_grupo_empresa_usuario_idusuar,hito_pagable_plan_pago_calendario_grupo_empresa_codgrupo_empres,hito_pagable_plan_pago_calendario_codcalendario,hito_pagable_plan_pago_codplan_pago,hito_pagable_codhito_pagable,hitooevento,porcentajesatisfaccion,porcentajealcazado,estadopago)";
            $sql2.= "VALUES ('','','','$c_ge','','','','$n_h','$p_s','$p_a','ACEPTADO')";
            pg_query($con,$sql2) or die ("ERROR :( " .pg_last_error());
        }
    }
?>
