<?php
require '../Modelo/ModeloEvaluacion.php';

$cod_grupoEmp = $_GET['a'];
$id_criterio = $_GET['cc'];
$nombre_criterio = $_GET['nc'];
$porcentaje_criterio = $_GET['pc'];
$tipo_criterio = $_GET['tc'];
$id_tipo = $_GET['it'];
$observaciones = $_POST['observaciones'];

if ($id_tipo == 1) {
    $nota = $_POST['verdadero_falso']; //"<input type=radio name=verdadero_falso value=FALSE>Falso<br>";
    registrar_evaluacion_final($cod_grupoEmp, $id_criterio, $id_tipo, $nota, $observaciones);
    header("Location: ../Vista/iuTablaCriteriosEvaluacion.php?a=$cod_grupoEmp");
} elseif ($id_tipo == 2) {
    $nota = $_POST['nota'];
    registrar_evaluacion_final_numerico($cod_grupoEmp, $id_criterio, $id_tipo, $observaciones, $nota);
    header("Location: ../Vista/iuTablaCriteriosEvaluacion.php?a=$cod_grupoEmp");
} elseif ($id_tipo == 3) {
    $nota = $_POST['conceptos'];
    registrar_evaluacion_final($cod_grupoEmp, $id_criterio, $id_tipo, $nota, $observaciones);
    header("Location: ../Vista/iuTablaCriteriosEvaluacion.php?a=$cod_grupoEmp");
} elseif ($id_tipo == 4) {
    $nota = $_POST['conceptos'];
    registrar_evaluacion_final($cod_grupoEmp, $id_criterio, $id_tipo, $nota, $observaciones);
    header("Location: ../Vista/iuTablaCriteriosEvaluacion.php?a=$cod_grupoEmp");
}  