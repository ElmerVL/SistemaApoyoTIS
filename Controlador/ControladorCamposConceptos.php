<?php
require '../Modelo/ModeloEvaluacion.php';

$tipo_evaluacion = $_GET['te'];
$num_campos = $_GET['nc'];
$nombre_criterio = $_GET['ncr'];
$proyecto = $_GET['cp'];
$porcen_calif = $_GET['pcent'];
$id_consultor = $_GET['ic'];
$usr_consultor = $_GET['uc'];
$porcen_rest = $_GET['pcr'];

if ($tipo_evaluacion==3) {
    for ($i = 1; $i <= $num_campos; $i++) {
        $concepto = $_POST['concepto' . $i];
        $porcentaje = $_POST['puntaje' . $i];
        registrar_escala_conceptual($tipo_evaluacion, $proyecto, $usr_consultor, $id_consultor, $nombre_criterio, $concepto, $porcentaje);
    }
    header("Location: ../Vista/iuRegistroEvaluacion.php?p=$porcen_rest&proyecto=$proyecto");
}else {
    for ($i = 1; $i <= $num_campos; $i++) {
        $concepto = $_POST['concepto' . $i];
        $porcentaje = $_POST['puntaje' . $i];
        registrar_escala_numeral($tipo_evaluacion, $proyecto, $usr_consultor, $id_consultor, $nombre_criterio, $concepto, $porcentaje);
    }    
    header("Location: ../Vista/iuRegistroEvaluacion.php?p=$porcen_rest&proyecto=$proyecto");
}
