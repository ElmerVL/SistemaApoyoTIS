<?php
require '../Controlador/Conexion.php';
function retornarPlanDePagosGE($codGE){
        $conec=new Conexion(); 
        $con=$conec->getConection();  
        $cod=$codGE;
            // Ejecutar la consulta SQL
        $sql = "SELECT codhito_pagable,hitoevento,porcentajepago,monto,fechapago FROM hito_pagable h WHERE h.plan_pago_calendario_grupo_empresa_codgrupo_empresa='$cod'";
        $result = pg_query($con,$sql);
        while ($row = pg_fetch_object($result)){
            $c = $row->codhito_pagable;
            $h = $row->hitoevento;
            $p = $row->porcentajepago;
            $m = $row->monto;
            $f = $row->fechapago;
            $p_s = retornarPorcentajeSatisfaccionPlanDePago($c,$cod);
            echo "<tr>"
                    . "<td><a href = '../Vista/iu.evaluacionHitoPagableGE.php?codH=$c&nombreH=$h&codGE=$cod&monto=$m&p_s=$p_s&tablaEvaluacion'>$h</a></td>" 
                    . "<td>$p</td>" 
                    . "<td>$m</td>" 
                    . "<td>$f</td>" 
               . "</tr>";
            }
        exit();
        pg_close($con);
}
    function retornarCodPlanDePago($c,$codGE){
        $conec=new Conexion(); 
        $con=$conec->getConection();        
        
        $sql="SELECT codplan_pago ";
        $sql.="FROM hito_pagable h, plan_pago p "; 
        $sql.="WHERE h.plan_pago_codplan_pago=p.codplan_pago and h.codhito_pagable='$c' and h.plan_pago_calendario_grupo_empresa_codgrupo_empresa='$codGE'";
        $consulta=pg_query($con,$sql);
        $row = pg_fetch_object($consulta);
        $cod = $row->codplan_pago;
        echo $cod;
        return $cod;
    }
        function retornarPorcentajeSatisfaccionPlanDePago($c,$codGE){
        $conec=new Conexion(); 
        $con=$conec->getConection();        
        
        $sql="SELECT porcentajesatisfaccion ";
        $sql.="FROM hito_pagable h, plan_pago p "; 
        $sql.="WHERE h.plan_pago_codplan_pago=p.codplan_pago and h.codhito_pagable='$c' and h.plan_pago_calendario_grupo_empresa_codgrupo_empresa='$codGE'";
        $consulta=pg_query($con,$sql);
        $row = pg_fetch_object($consulta);
        $p_s = $row->porcentajesatisfaccion;
        echo $p_s;
        return $p_s;
    }
?>
