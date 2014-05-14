<?php
require ('../Modelo/ModeloRegistroProyecto.php');
$nombre_proyecto = $_POST['nombre_proyecto'];
$codigo_proyecto = $_POST['codigo_proyecto'];
$fecha_fin_proyecto = $_POST['fecha_fin_proyecto'];

insertarProyecto($nombre_proyecto, $codigo_proyecto, $fecha_fin_proyecto);
header("Location: ../Vista/iu.registroProyecto.php?mensaje=$nombre_proyecto");
?>
