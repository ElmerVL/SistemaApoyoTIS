<?php   

$titulo =$_POST['text_titulo'];
$descripcion=$_POST['text_descripcion'] ;

if($_FILES['nombre_archivo_subir']['type']=='application/pdf'&& $titulo!=""&&$descripcion!="")
{
$carpetaRaiz="../Archivos/";
opendir($carpetaRaiz);

$datos[0]=$_FILES['nombre_archivo_subir']['name'];

$destino=$carpetaRaiz.$_FILES['nombre_archivo_subir']['name'];
$n=1;
$nombre_parcial=$datos[0];
while(file_exists($destino))
{  $n++;
   $pieces = explode(".", $datos[0]);
   $destino=$carpetaRaiz.$pieces[0].$n.".".$pieces[1];    
   $nombre_parcial=$pieces[0].$n.".".$pieces[1];
}
$datos[1]=$destino;
$datos[2]=$titulo;
$datos[3]=$descripcion;
//copy($_FILES['nombre_archivo_subir']['tmp_name'],$destino);
move_uploaded_file($_FILES['nombre_archivo_subir']['tmp_name'],$destino);

echo "subido exitosamente";
header("Location: ../Controlador/controladorDescargaArchivo.php?nombre=$nombre_parcial&destino=$destino&titulo=$datos[2]&descripcion=$datos[3]");
}
else{
  header('Location:../Vista/formularios/iu.subidaArchivo.html');
    
}



