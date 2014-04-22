<?php   


if($_FILES['nombre_archivo_cliente']['type']=='application/pdf')
{
$carpetaRaiz="../Archivos/";
opendir($carpetaRaiz);
$titulo =$_POST['text_titulo'];
//echo $titulo."<br>";
$descripcion=$_POST['text_descripcion'] ;
//echo $descripcion."<br>";
$destino=$carpetaRaiz.$_FILES['nombre_archivo_cliente']['name'];
//echo $destino."<br>";
copy($_FILES['nombre_archivo_cliente']['tmp_name'],$destino);
//echo "subido exitosamente";
}
else{
    header('Location:../Vista/iu.consultor.html');
    //echo 'no es pdf'."<br>";
}


//$nombre=$_FILES['nombre_archivo_cliente']['name'];
//echo "<img src=\"Archivos/$nombre\"><br>";
//echo $_FILES['nombre_archivo_cliente']['name']."<br>";
//echo $_FILES['nombre_archivo_cliente']['type']."<br>";

