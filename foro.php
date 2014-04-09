<?php


require('Conexion.php');
        $conec=new Conexion();
	$con=$conec->getConection();


$autor = $_POST["autor"];
$titulo = $_POST["titulo"];
$mensaje = $_POST["mensaje"];

//Hacemos algunas validaciones
if(empty($autor)) $autor = "Anónimo";
if(empty($titulo)) $titulo = "Sin título";
//Evitamos que el usuario ingrese HTML
$mensaje = htmlentities($mensaje);

// Grabamos el mensaje en la base.
$sql = "INSERT INTO foro (autor, titulo, mensaje)";
$sql.= "VALUES ('$autor','$titulo','$mensaje')";
pg_query($con,$sql) or die ("ERROR ====> al grabar el sms :( " .pg_last_error());


/*/* si es un mensaje en respuesta a otro
   actualizamos los datos */
/*
if(!empty($ident))
{
    $sql = "UPDATE foro SET respuestas=respuestas+1, ult_respuesta=NOW()";
    $sql.= " WHERE id = '$ident'";
    $rs = pg_query($sql, $con);
    Header("Location: foro.php?id=$ident#$ult_id");
    exit();
}
Header("Location: index.php");
*/
?>

