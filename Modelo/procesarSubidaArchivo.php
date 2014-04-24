<?php   

$titulo =$_POST['text_titulo'];
$descripcion=$_POST['text_descripcion'] ;

if($_FILES['nombre_archivo_subir']['type']=='application/pdf'&& $titulo!=""&&$descripcion!="")
{
$carpetaRaiz="../Archivos/";
opendir($carpetaRaiz);

$datos[0]=$_FILES['nombre_archivo_subir']['name'];

$destino=$carpetaRaiz.$_FILES['nombre_archivo_subir']['name'];

$datos[1]=$destino;
$datos[2]=$titulo;
$datos[3]=$descripcion;
copy($_FILES['nombre_archivo_subir']['tmp_name'],$destino);
echo "subido exitosamente";

echo $datos[0]."<br>";
echo $datos[1]."<br>";
echo $datos[2]."<br>";
echo $datos[3]."<br>";

header("Location: ../Controlador/controladorDescargaArchivo.php?nombre=$datos[0]&destino=$datos[1]&titulo=$datos[2]&descripcion=$datos[3]");
}
else{
   header('Location:../Vista/formularios/iu.subidaArchivo.html');
    
}



