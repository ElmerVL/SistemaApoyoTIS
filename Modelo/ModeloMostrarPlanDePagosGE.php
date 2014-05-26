<?php
require '../Controlador/Conexion.php';
function retornarPlanDePagosGE($codGE){
        $conec=new Conexion(); 
        $con=$conec->getConection();  
        $cod=$codGE;
            // Ejecutar la consulta SQL
        $sql = "SELECT hitoevento,porcentajepago,monto,fechapago FROM hito_pagable h WHERE h.plan_pago_calendario_grupo_empresa_codgrupo_empresa='$cod'";
        $result = pg_query($con,$sql);
        while ($row = pg_fetch_object($result)){
            $h = $row->hitoevento;
            $p = $row->porcentajepago;
            $m = $row->monto;
            $f = $row->fechapago;
            echo "<tr>"
                    . "<td><a href = '../Vista/ListaRespuestasForo.php?'>$h</a></td>" 
                    . "<td>$p</td>" 
                    . "<td>$m</td>" 
                    . "<td>$f</td>" 
               . "</tr>";
            }
        exit();
        pg_close($con);
}
?>
