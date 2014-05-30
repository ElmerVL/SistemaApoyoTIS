<?php
require '../Modelo/ModeloComentarioConsultor.php';
    $codC=$_GET['a'];
    $codUsuarioC=$_GET['u'];
    $nombreConsultor = retornarNombreDelConsultor($codC, $codUsuarioC);
    $comentario=$_GET['comentario'];
    $codForo=$_GET['codigo'];
    $candComentarios=$_GET['cantidad'];
    insertarComentarioForo($nombreConsultor, $comentario, $codForo, $candComentarios);
    header("Location: ../Vista/iu.foroConsultor.php?ARCHIVO=$codForo&NOM=$nombreConsultor&COM=$comentario");
?>
