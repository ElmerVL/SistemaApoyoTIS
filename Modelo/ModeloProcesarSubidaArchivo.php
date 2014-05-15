<?php     

function subirArchivo($visible_para,$nombre_gestion,$nombre_proyecto,$nombre_consultor,$nombre_Archivo,$nombre_Temporal_Archivo,$tipo_Archivo)
{    echo 'entro al modelo'."<br>";
     echo $tipo_Archivo."<br>";
     echo $nombre_Archivo."<br>";
     echo $nombre_Temporal_Archivo."<br>";
     echo $visible_para."<br>";
    if($tipo_Archivo=='application/pdf'){
    $carpetaRaiz="../Archivos/";
        if($visible_para=="publico"){
            $carpetaDestino=$carpetaRaiz."Documentos publicos/".$nombre_gestion."/";
            echo 'entro al if publico'."<br>";
        }
        elseif ($visible_para=="yo_consultor") {
                $carpetaDestino=$carpetaRaiz.$nombre_consultor."/Privado/";
                }
            elseif ($visible_para=="todas_grupo_empresas") {
                    $carpetaDestino=$carpetaRaiz.$nombre_consultor."/".$nombre_gestion."/Documentos publicos grupo empresas/";
                    }
                elseif($visible_para=="grupo_empresa"){
                       $carpetaDestino=$carpetaRaiz.$nombre_consultor."/".$nombre_gestion."/".$nombre_proyecto."/".$nombre_Grupoempresa."/";
                        }
        
        
       
        
        if(file_exists($carpetaDestino)){
              //$nombreArchivo=$_FILES['nombre_archivo_subir']['name'];
              guardarArchivo($carpetaDestino,$nombre_Archivo,$nombre_Temporal_Archivo);
              
        }
        else{
            if(!mkdir($carpetaDestino, 0777, true)) {
                 die('Fallo al crear las carpetas...');
               }
            else{
             // $nombreArchivo=$_FILES['nombre_archivo_subir']['name'];  
              guardarArchivo($carpetaDestino,$nombre_Archivo,$nombre_Temporal_Archivo);
            }

        }
        
    }
}

function guardarArchivo($ruta,$nombre,$nombreTemporalArchivo){
    $destino=$ruta.$nombre;
    
    if(file_exists($destino)){
        renombrar($ruta,$nombre);
    }
    else{
        copy($nombreTemporalArchivo,$destino);
        move_uploaded_file($nombreTemporalArchivo,$destino);
    }
                
}
function renombrar($rutaArchivo,$nom,$nombreTemporalArchivo){
    $desfragmentado=explode(".",$nom);
    $extension=".".$desfragmentado[1];
    
    $n=1;
    $nombreParcial=$desfragmentado[0].$n.$extension;
    
    while(file_exists($rutaArchivo.$nombreParcial)){
        $nombreParcial=$desfragmentado[0].$n.$extension;
        $n++;
    
    }
    guardarArchivo($rutaArchivo,$nombreParcial,$nombreTemporalArchivo);
}



//echo "subido exitosamente";
//header("Location: ../Controlador/controladorDescargaArchivo.php?nombre=$nombre_parcial&destino=$destino&titulo=$datos[2]&descripcion=$datos[3]");
//}
//else{
//  header('Location:../Vista/formularios/iu.subidaArchivo.html');
//}



