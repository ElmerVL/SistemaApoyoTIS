<?php   
$nombre="application/pdf";
(String)$tipo=$_FILES['nombre_archivo_cliente']['type'];
if($tipo==$nombre)
{
$carpeta="Archivos/";
opendir($carpeta);
$destino=$carpeta.$_FILES['nombre_archivo_cliente']['name'];
copy($_FILES['nombre_archivo_cliente']['tmp_name'],$destino);
echo "subido exitosamente";
//$nombre=$_FILES['nombre_archivo_cliente']['name'];
//echo "<img src=\"Archivos/$nombre\"><br>";
//echo $_FILES['nombre_archivo_cliente']['name']."<br>";
//echo $_FILES['nombre_archivo_cliente']['type']."<br>";
}
else{
    echo "el formato no es el correcto";
}



