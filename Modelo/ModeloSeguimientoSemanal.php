<?php

require '../Controlador/Conexion.php';

function insertar($cod_grupo_empresa, $cod_evaluacion, $rol, $esperado) {
    $con = new Conexion();
    $c = $con->getConection();
    
    $cons_id_usuario_ge = pg_query($c, "select usuario_idusuario from grupo_empresa where codgrupo_empresa = ".$cod_grupo_empresa.";");
    $id_usuario_conseguido = pg_fetch_object($cons_id_usuario_ge);
    $id_usuario_ge = $id_usuario_conseguido->usuario_idusuario;
    
    $cons_cod_calendario = pg_query($c, "select codcalendario from calendario where grupo_empresa_codgrupo_empresa = ".$cod_grupo_empresa.";");
    $cod_conseguido = pg_fetch_object($cons_cod_calendario);
    $cod_calendario = $cod_conseguido->codcalendario;

    $consulta = pg_query($c, "INSERT INTO detalle_ge(evaluacion_semanal_calendario_grupo_empresa_usuario_idusuario, evaluacion_semanal_calendario_grupo_empresa_codgrupo_empresa, evaluacion_semanal_calendario_codcalendario, evaluacion_semanal_codevaluacion_semanal, rol, esperado) VALUES (".$id_usuario_ge.", ".$cod_grupo_empresa.", ".$cod_calendario.", ".$cod_evaluacion.", '".$rol."', '".$esperado."');");
 
}


/*iddetalle_ge serial NOT NULL,
  OK evaluacion_semanal_calendario_grupo_empresa_usuario_idusuario integer NOT NULL,
  OK evaluacion_semanal_calendario_grupo_empresa_codgrupo_empresa integer NOT NULL,
  OK evaluacion_semanal_calendario_codcalendario integer NOT NULL,
  OK evaluacion_semanal_codevaluacion_semanal integer NOT NULL,
  OK rol character varying(120), 
  OK esperado character varying(120),

 * 
 * 
 * 
 * INSERT INTO detalle_ge(
            evaluacion_semanal_calendario_grupo_empresa_usuario_idusuario, 
            evaluacion_semanal_calendario_grupo_empresa_codgrupo_empresa, 
            evaluacion_semanal_calendario_codcalendario, 
            evaluacion_semanal_codevaluacion_semanal, 
            rol, 
            esperado)
    VALUES (?, ?, ?, ?, ?, ?);

 * 
 * 
 * 
 * 
 * en base de datos fecha = 'anio - mes - dia'
 *  */