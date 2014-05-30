<?php
//////require './Conexion.php';
if($_GET['x']==1){
validar();
}
function validar() {
    

    if(!empty($_GET['nombre_usuario']))
    {  
        $aux=$_GET['nombre_usuario'];
        if($aux=='tazmancito')
        {
        echo "false";    
        }
        else{
             echo "true";
       }
        
    }
    
}

?>