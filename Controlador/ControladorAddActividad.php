<?php
require ('../Modelo/ModeloAddActividad.php');
$autor = $_POST["autor"];
$titulo = $_POST["titulo"];
$mensaje = $_POST["mensaje"];

agregar($autor, $titulo, $mensaje);

?>

