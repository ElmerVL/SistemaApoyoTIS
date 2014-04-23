
<?php

class Conexion
{
	public function getConection()

    {
        $cadena="host='localhost' port='5432' dbname='Parqueo' user ='postgres' password='VALENCIA'";
        $con = pg_connect($cadena) or die ('Error en la conexion');
        return $con;
    }
}