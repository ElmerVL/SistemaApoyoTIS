<?php
$nombre1=$_GET['nombre']; 
$destino1=$_GET['destino'];
$titulo1=$_GET['titulo'];
$descripcion1=$_GET['descripcion'];
header("Location: ../Modelo/modeloProcesarDescargaArchivo.php?nombre2=$nombre1&destino2=$destino1&titulo2=$titulo1&descripcion2=$descripcion1");
