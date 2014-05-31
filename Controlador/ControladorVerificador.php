<?php
require '../Modelo/ModeloVerificador.php';

switch ($_GET['x']){
   case 1: //verifica que los nombres de usuario esten disponibles
       $aux=$_GET['nombre_usuario'];
        echo verificarLogin($aux);
       break;
    
    
}
        


        

?>
