<?php

$nombre= $_POST['nombre'];
$comentario = $_POST['comentario']; 
$ab=$_GET['valor'];
echo "nombre:".$nombre."comentario:".$comentario."";
header("Location: ../Modelo/ModeloComentario.php?valor1=$ab");

?>
