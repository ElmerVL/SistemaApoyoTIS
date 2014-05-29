<?php
    require '../Controlador/Conexion.php';
    function retornarEstadoTablaPagoConsultor(){
        $conec=new Conexion(); 
        $con=$conec->getConection();
        $sql="SELECT * FROM pago_consultor";
        $result=  pg_query($con,$sql);
        $estado= pg_num_rows($result);
        if($estado!=0){
            return "lleno";
        }  else {
            return "basio";
        }
    }
    function retornarEstadoDeEvaluacionesPlanDePagos(){
        $conec=new Conexion(); 
        $con=$conec->getConection();  
        $arreglo_entregas = array();
        $sql="SELECT hitooevento,porcentajesatisfaccion,porcentajealcazado,estadopago ";
        $sql.="FROM pago_consultor p ";
        $sql.="WHERE ";
        $result = pg_query($con,$sql);
        while ($row = pg_fetch_object($result)){
            $h_e = $row->hitooevento;
            $p_s = $row->porcentajesatisfaccion;
            $p_a = $row->porcentajealcazado;
            $s_p = $row->estadopago;
            $arreglo_entregas[] = $h_e;
            $arreglo_entregas[] = $p_s;
            $arreglo_entregas[] = $p_a;
            $arreglo_entregas[] = $s_p;
        }
        return $arreglo_entregas;
    }
?>
