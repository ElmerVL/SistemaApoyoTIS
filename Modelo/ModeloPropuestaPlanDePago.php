<?php
require('../Controlador/Conexion.php');
    function insertarPropuestaDePago($monto_total, $porcentaje_satisfaccion, $cod_grupoE){
        $conec=new Conexion(); 
        $con=$conec->getConection();        
        
        $sql = "INSERT INTO plan_pago (calendario_codcalendario,calendario_grupo_empresa_codgrupo_empresa,calendario_grupo_empresa_usuario_idusuario,montototal, porcentajesatisfaccion)";
        $sql.= "VALUES ('1','$cod_grupoE','1','$monto_total','$porcentaje_satisfaccion')";
        pg_query($con,$sql) or die ("ERROR ====> en registro del pal de pago :( " .pg_last_error());
    }
    //esta funcion recupera del BD el codigo dela tabla plan_pago
    function retornarCodPlanDePago($monto_total,$porcentaje_satisfaccion){
        $conec=new Conexion(); 
        $con=$conec->getConection();        
        $mt=$monto_total;
        $pt=$porcentaje_satisfaccion;
        
        //falta crear una consulta que me retorne el codigo del untimo plan de pago si esta se repite 
        
        $sql="SELECT codplan_pago FROM plan_pago p WHERE p.montototal='$mt' and p.porcentajesatisfaccion='$pt'";
        $consulta=pg_query($con,$sql);
        $row = pg_fetch_object($consulta);
        $AUX = $row->codplan_pago;
        echo $AUX;
        return $AUX;
    }
    function insertarRegistroDePlanDePago($monto_total, $porcentaje_satisfaccion, $hito_evento, $porcentaje_pago, $fecha_pago, $entregables, $codigoPlan, $cod_grupoE){
        $conec=new Conexion(); 
        $con=$conec->getConection();
        //$monT = $monto_total;
        //$porS = $porcentaje_satisfaccion;
        //$porP = $porcentaje_pago;
        $monto=establecerMonto($monto_total,$porcentaje_satisfaccion,$porcentaje_pago);
        if($monto!=0){
        echo"el monto es---> :$monto";
        $sql = "INSERT INTO hito_pagable (plan_pago_calendario_grupo_empresa_usuario_idusuario, plan_pago_calendario_grupo_empresa_codgrupo_empresa, plan_pago_calendario_codcalendario, plan_pago_codplan_pago, hitoevento, porcentajepago, monto, fechapago, entregables)";
        $sql.= "VALUES ('1','1','$cod_grupoE','$codigoPlan','$hito_evento','$porcentaje_pago','$monto','$fecha_pago','$entregables')";
        pg_query($con,$sql) or die ("ERROR ====> en registro del proyecto :( " .pg_last_error());
        }
    }
    function establecerMonto($monto_total,$porcentaje_satisfaccion,$porcentaje_pago){
        $monT = $monto_total;
        $porS = $porcentaje_satisfaccion;
        $porP = $porcentaje_pago;
        $monto = 0;
        if ($monT!=0) {
            $monto = (($monT*$porP)/$porS);  
        }   
        return $monto;
    }
    function mostrarPlanDePago($codplan_papo){
        
        $conec=new Conexion(); 
        $con=$conec->getConection();  
        $cod=$codplan_papo;
            // Ejecutar la consulta SQL
        $sql = "SELECT hitoevento,porcentajepago,monto,fechapago,entregables FROM plan_pago p,hito_pagable h WHERE p.codplan_pago= h.plan_pago_codplan_pago and p.codplan_pago='$cod'";
        $result = pg_query($con,$sql);
  
        while ($row = pg_fetch_object($result)){
            $h = $row->hitoevento;
            $p = $row->porcentajepago;
            $m = $row->monto;
            $f = $row->fechapago;
            $e = $row->entregables;
            echo "<tr>"
                    . "<td>$h</td>" 
                    . "<td>$p</td>" 
                    . "<td>$m</td>" 
                    . "<td>$f</td>" 
                    . "<td>$e</td>"
               . "</tr>";
            }
        exit();
        pg_close($con);

    
    }
?>
