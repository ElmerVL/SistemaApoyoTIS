<?php
include '../Modelo/ModeloEvaluacion.php';

$proyecto = $_POST['cbox_proyectos'];
insertar_registro_evaluacion($proyecto);
header("Location: ../Vista/iuRegistroEvaluacion.php?p=100&proyecto=$proyecto");