<?php
require '../Modelo/ModeloVerificador.php';
function vLogin($login) {
    return verificarLogin($login);
}


////estas lineas son para las pruebas
$log='camaleon';
if(vLogin($log))
  {
    echo 'verdadero';
  }
  else{
      echo 'falso';
  }
///////////////////////////////////////////
