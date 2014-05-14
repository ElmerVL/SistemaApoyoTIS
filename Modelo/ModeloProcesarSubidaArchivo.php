<?php   


$gestion="3-2014";
$proyecto="juesVirtual";
$consultor="Acero";
$nombreGrupoempresa="Cabritos";
$visible_para="grupo_empresa";

  
subirArchivo($visible_para,$gestion, $proyecto, $consultor,$nombreGrupoempresa);


function subirArchivo($visiblePara,$nombre_gestion,$nombre_proyecto,$nombre_consultor,$nombre_Grupoempresa)
{    
    if($_FILES['nombre_archivo_subir']['type']=='application/pdf'){
    $carpetaRaiz="../Archivos/";
        if($visiblePara=="publico"){
            $carpetaDestino=$carpetaRaiz."Documentos publicos/".$nombre_gestion."/";
        }
        elseif ($visiblePara=="yo_consultor") {
                $carpetaDestino=$carpetaRaiz.$nombre_consultor."/Privado/";
                }
            elseif ($visiblePara=="todas_grupo_empresas") {
                    $carpetaDestino=$carpetaRaiz.$nombre_consultor."/".$nombre_gestion."/Documentos publicos grupo empresas/";
                    }
                elseif($visiblePara=="grupo_empresa"){
                       $carpetaDestino=$carpetaRaiz.$nombre_consultor."/".$nombre_gestion."/".$nombre_proyecto."/".$nombre_Grupoempresa."/";
                        }
        
        
       
        
        if(file_exists($carpetaDestino)){
              $nombreArchivo=$_FILES['nombre_archivo_subir']['name'];
              guardarArchivo($carpetaDestino,$nombreArchivo);
              
        }
        else{
            if(!mkdir($carpetaDestino, 0777, true)) {
                 die('Fallo al crear las carpetas...');
               }
            else{
              $nombreArchivo=$_FILES['nombre_archivo_subir']['name'];  
              guardarArchivo($carpetaDestino,$nombreArchivo);
            }

        }
        
    }
}

function guardarArchivo($ruta,$nombre){
    $destino=$ruta.$nombre;
    
    if(file_exists($destino)){
        renombrar($ruta,$nombre);
    }
    else{
        copy($_FILES['nombre_archivo_subir']['tmp_name'],$destino);
        move_uploaded_file($_FILES['nombre_archivo_subir']['tmp_name'],$destino);
    }
                
}
function renombrar($rutaArchivo,$nom){
    $desfragmentado=explode(".",$nom);
    $extension=".".$desfragmentado[1];
    
    $n=1;
    $nombreParcial=$desfragmentado[0].$n.$extension;
    
    while(file_exists($rutaArchivo.$nombreParcial)){
        $nombreParcial=$desfragmentado[0].$n.$extension;
        $n++;
    
    }
    guardarArchivo($rutaArchivo,$nombreParcial);
}



//echo "subido exitosamente";
//header("Location: ../Controlador/controladorDescargaArchivo.php?nombre=$nombre_parcial&destino=$destino&titulo=$datos[2]&descripcion=$datos[3]");
//}
//else{
//  header('Location:../Vista/formularios/iu.subidaArchivo.html');
//}



