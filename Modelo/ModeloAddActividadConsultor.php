<?php

require('../Controlador/Conexion.php');

function AddActividad($visible_para, $req_repuesta, $fecha_ini, $fecha_fin, $hora_inicio, $hora_fin, $titulo, $descripcion, $activa, $contestada) {
    $conec = new Conexion();
    $con = $conec->getConection();

    $actividad_visible_para = $visible_para;
    $actividad_requiere_respuesta = $req_repuesta;
    $fecha_inicio_actividad = $fecha_ini;
    $fecha_fin_actividad = $fecha_fin;
    $hora_inicio_actividad = $hora_inicio;
    $hora_fin_actividad = $hora_fin;
    $titulo_actividad = $titulo;
    $descripcion_actividad = $descripcion;
    $actividad_activa = $activa;
    $actividad_contestada = $contestada;

    $filas = array();

    $sql = "SELECT * FROM cons_actividad";
    $consulta = pg_query($con, $sql);
    $filas = pg_fetch_array($consulta);
    $tam = count($filas);
    for ($i = 0; $i < count($filas); $i++) {
        $fechaIni = $filas['fechainicio'];
        $filaFin = $filas['fechafin'];
        echo $fechaIni . "  -  " . $fecha_fin . "<br>";
    }


    if ($fecha_fin > $fecha_ini) {
        echo "visible para:" . $actividad_visible_para . "requiere respuesta:" . $actividad_requiere_respuesta . "fecha inicio:" . $fecha_inicio_actividad . "fecha fin:" . $fecha_fin_actividad . "hora inicio:" . $hora_inicio_actividad . "hora fin:" . $hora_fin_actividad . "titulo Actividad" . $titulo_actividad . "Descripcion Actividad:" . $descripcion_actividad;
        $sql = "INSERT INTO cons_actividad (consultor_usuario_idusuario,consultor_idconsultor,visiblepara,requiererespuesta,fechainicio,fechafin,horainicio,horafin,titulo,descripcion,activo,contestada)";
        $sql.= "VALUES (1,1,'$actividad_visible_para','$actividad_requiere_respuesta','$fecha_inicio_actividad','$fecha_fin_actividad','$hora_inicio_actividad','$hora_fin_actividad','$titulo','$descripcion','$actividad_activa','$actividad_contestada')";
        pg_query($con, $sql) or die("ERROR :( " . pg_last_error());
        echo insertarActividad($titulo_actividad, $fecha_inicio_actividad, $fecha_fin_actividad, $descripcion_actividad);
    } elseif ($fecha_fin == $fecha_ini && $hora_ini < $hora_fin) {
        echo "visible para:" . $actividad_visible_para . "requiere respuesta:" . $actividad_requiere_respuesta . "fecha inicio:" . $fecha_inicio_actividad . "fecha fin:" . $fecha_fin_actividad . "hora inicio:" . $hora_inicio_actividad . "hora fin:" . $hora_fin_actividad . "titulo Actividad" . $titulo_actividad . "Descripcion Actividad:" . $descripcion_actividad;
        $sql = "INSERT INTO cons_actividad (consultor_usuario_idusuario,consultor_idconsultor,visiblepara,requiererespuesta,fechainicio,fechafin,horainicio,horafin,titulo,descripcion,activo,contestada)";
        $sql.= "VALUES (1,1,'$actividad_visible_para','$actividad_requiere_respuesta','$fecha_inicio_actividad','$fecha_fin_actividad','$hora_inicio_actividad','$hora_fin_actividad','$titulo','$descripcion','$actividad_activa','$actividad_contestada')";
        pg_query($con, $sql) or die("ERROR :( " . pg_last_error());
        echo insertarActividad($titulo_actividad, $fecha_inicio_actividad, $fecha_fin_actividad, $descripcion_actividad);
    } else {
        header("Location: ../Vista/formularios/iu.addActividad.html");
    }
}

function insertarActividad($titulo1, $fecha_ini1, $fecha_fin1, $descripcion1) {
    $conec = new Conexion();
    $con = $conec->getConection();

    $sql = "select * from cons_actividad";
    $filas = pg_query($con, $sql);
    for ($i = 0; $i < count($filas); $i++) {
        $fila = $filas[$i];
        $fechaIni = $fila['fechainicio'];
        $fechaFin = $fila['fechafin'];
        echo $fechaIni . "   -    " . $fechaFin;
    }
    $abrir = fopen("../Vista/Otros/actividades.data", "r");
    $lectura = fread($abrir, filesize("../Vista/Otros/actividades.data"));


    $escribir = fopen("../Vista/Otros/actividades.data", "a");
    fwrite($escribir, "<b></b>$titulo1<br><b>Fecha de inicio:</b>$fecha_ini1<br><b>Fecha Conclusion:</b>$fecha_fin1<br><b>Descripción:</b>$descripcion1<br></p><hr><br>");
    fclose($escribir);
    header("Location: ../Vista/iu.consultor.php");
}

function mostrarActividades() {
    $conec = new Conexion();
    $con = $conec->getConection();

    $sql = "SELECT * FROM cons_actividad";
    $consulta = pg_query($con, $sql);
    $filas = pg_fetch_array($consulta);
    $tam = count($filas);
    $cadena = "<table border=1><tr><td>fechaIni</td><td>fechaFin</td><td>titulo</td><td>Descripcion</td></tr>";
    for ($i = 0; $i < count($filas); $i++) {
        $fechaIni = $filas['fechainicio'];
        $filaFin = $filas['fechafin'];
        $titulo = $filas['titulo'];
        $descripcion = $filas['descripcion'];

        $cadena .= "<tr><td>$fechaIni</td><td>$fechaIni</td><td>$titulo</td> <td> <a href='Vista/iu.consultor.html'>Ver </a> </td> </tr>";
    }
    $cadena .= "</table>";
    return $cadena;
}

?>
