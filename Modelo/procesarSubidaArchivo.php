<?php   

$titulo =$_POST['text_titulo'];
$descripcion=$_POST['text_descripcion'] ;

if($_FILES['nombre_archivo_subir']['type']=='application/pdf'&& $titulo!=""&&$descripcion!="")
{
$carpetaRaiz="../Archivos/";
opendir($carpetaRaiz);

//echo $titulo."<br>";

//echo $descripcion."<br>";
$destino=$carpetaRaiz.$_FILES['nombre_archivo_subir']['name'];
//echo $destino."<br>";
copy($_FILES['nombre_archivo_subir']['tmp_name'],$destino);
echo "subido exitosamente";
 header('Location:../Vista/iu.consultor.html');
}
else{
    header('Location:../Vista/iu.consultor.html');
    
}



