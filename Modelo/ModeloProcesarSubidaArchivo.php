<?php     



function subirArchivo($visible_para,$nombre_gestion,$nombre_proyecto,$nombre_consultor,$nombre_Archivo,$nombre_Temporal_Archivo,$tipo_Archivo)
{   
    
    if($tipo_Archivo=='application/pdf'){
    $carpetaRaiz="../Archivos/";
        if($visible_para=="publico"){
            $carpetaDestino=$carpetaRaiz."Documentos publicos/".$nombre_gestion."/";
    
        }
        elseif ($visible_para=="yo_mismo") {
                $carpetaDestino=$carpetaRaiz.$nombre_consultor."/Privado/";
                }
            elseif ($visible_para=="todos_grupos") {
                    $carpetaDestino=$carpetaRaiz.$nombre_consultor."/".$nombre_gestion."/Documentos publicos grupo empresas/";
                    }
                else{                  
                    $carpetaDestino=$carpetaRaiz.$nombre_consultor."/".$nombre_gestion."/".$nombre_proyecto."/".$nombre_Grupoempresa."/";
                    }
                        
        if(file_exists($carpetaDestino)){
              guardarArchivo($carpetaDestino,$nombre_Archivo,$nombre_Temporal_Archivo);
              header('Location:../Vista/iu.ingresar.html');
              
        }
        else{
            if(!mkdir($carpetaDestino, 0777, true)) {
                 die('Fallo al crear las carpetas...');
               }
            else{
              guardarArchivo($carpetaDestino,$nombre_Archivo,$nombre_Temporal_Archivo);
            }
        }
    }
    else{
      header('Location:../Vista/iu.subidaArchivo.html');
    }
    }   
    

function guardarArchivo($ruta,$nombre,$tmp_Archivo){
    $destino=$ruta.$nombre;
    
    if(file_exists($destino)){
        renombrar($ruta,$nombre,$tmp_Archivo);
    }
    else{
        copy($tmp_Archivo,$destino);
        move_uploaded_file($tmp_Archivo,$destino);
    }
                
}
function renombrar($rutaArchivo,$nom,$tmp_Archivo_r){
    $desfragmentado=explode(".",$nom);
    $extension=".".$desfragmentado[1];
    
    $n=1;
    $nombreParcial=$desfragmentado[0].$n.$extension;
    
    while(file_exists($rutaArchivo.$nombreParcial)){
        $nombreParcial=$desfragmentado[0].$n.$extension;
        $n++;
    
    }
    guardarArchivo($rutaArchivo,$nombreParcial,$tmp_Archivo_r);
}
