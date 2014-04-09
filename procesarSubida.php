<?php   
$carpeta="Archivos/";
opendir($carpeta);
$destino=$carpeta.$_FILES['nombre_archivo_cliente']['name'];
copy($_FILES['nombre_archivo_cliente']['tmp_name'],$destino);
echo "subido exitosamente";
//$nombre=$_FILES['nombre_archivo_cliente']['name'];
//echo "<img src=\"Archivos/$nombre\"><br>";
//echo $_FILES['nombre_archivo_cliente']['name']."<br>";
//echo $_FILES['nombre_archivo_cliente']['type']."<br>";




