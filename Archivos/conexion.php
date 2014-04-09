<?phpglobal $conexion;
$conexion = pg_connect("host=localhost port=5432 dbname=postgres user=postgres
password=VALENCIA") or
die ("ERROR ====> NO SE PUDO CONECTAR :( " .pg_last_error());
?>