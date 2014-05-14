<?php
require '../Modelo/ModeloComentario.php';
$nombre=$_GET['nombre'];
$comentario=$_GET['comentario'];
$var=$_GET['codigo'];
insertarComentarioForo($nombre, $comentario, $var);
$contador=0;
header("Location: ../Vista/iu.Foro.php?ARCHIVO=$var&NOM=$nombre&COM=$comentario");
?>
