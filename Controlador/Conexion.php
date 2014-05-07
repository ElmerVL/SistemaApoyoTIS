
<?php

class Conexion
{
	public function getConection()
                
    {
        $cadena="host='localhost' port='5432' dbname='pruebas' user ='postgres' password='tazmancito'";
        $con = pg_connect($cadena) or die ('Error en la conexion');
        return $con;
    }
}