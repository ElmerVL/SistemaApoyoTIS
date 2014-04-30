<?php
require '../Modelo/mostrarTema.php';

function a($ax){
$a=$ax;//$listaTemasRespuestas;
    $listaTemas = mostrarTema($a);

return $listaTemas;    
} 


?>
