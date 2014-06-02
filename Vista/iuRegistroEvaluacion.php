<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CONSULTOR</title>
        <link href="css/evaluacion.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="imagenes/favicon.ico"/>
    </head>

    <body id="body">
        <div id="principal_seguimiento">
            <header id="cabecera_seguimiento"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
            <article id="contenido_seguimiento">
                <nav id="menu_seguimiento" >
                    <a href="iu.registroProyecto.php"><img width="100%" height="48" src="imagenes/btn_registrarProyecto.jpg"/></a>    
                    <a href="iuListaEmpresas.php"><img width="100%" height="48" src="imagenes/btn_listaEmpresas.jpg"/></a>
                    <a href="iuAddActividad.php"><img width="100%" height="48" src="imagenes/btn_añadirActividad.jpg"/></a>
                    <a href="iu.foro.php"><img width="100%" height="48" src="imagenes/btn_foro.jpg"/></a>
                    <a href="iu.subidaArchivo.html"><img width="100%" height="48" src="imagenes/btn_subirArchivo.jpg"/></a>
                    <a href="iuSeleccionProyectoEvaluacion.php"><img width="100%" height="48" src="imagenes/btn_registroEvaluacion.jpg"/></a>
                    <a href="../Controlador/ControladorBackup.php"><img width="100%" height="48" src="imagenes/btn_backup.jpg"/></a>
                </nav>
                <div id="noticias_seguimiento">
                    <h2> REGISTRO DE EVALUACION </h2>
                    <?php $proy = $_GET['proyecto']; ?>
                    <form name='formulario' method='POST' action="../Controlador/ControladorEvaluacionFinal.php">
                        <lbl>Codigo del Proyecto:</lbl>
                        <br />
                        <textarea id="txtCodigo" name="cod_proyecto" readonly="readonly"><?php echo $proy ?></textarea>
                        <br />
                        <lbl>Criterio:</lbl>
                        <br />
                        <textarea id="txtSeguimiento" name="criterio" required="" pattern="[a-zA-Z0-9.,+_-]+"></textarea>
                        <br />
                        <lbl>Porcentaje de calificación: </lbl>
                        <lbl>Porcentaje restante: </lbl>
                        <br />
                        <textarea id="txtPorcentaje" name="porcentaje_calif" required=""></textarea>
                        <textarea id="txtPorcentaje" name="porcentaje_restante" required="" readonly="readonly"><?php echo $_GET['p'];?></textarea>
                        <br />
                        <lbl>Tipo de Evaluacion:</lbl>
                        <br />
                        <select  id ='cbox_evaluaciones' name='cbox_evaluaciones' size=1>
                            <option value='1'>Falso Verdadero</option>
                            <option value='2'>Numerico</option>
                            <option value='3'>Escala conceptual</option>
                            <option value='4'>Escala numeral</option>
                        </select>

                        <br />
                        <input type="submit" name="btn_regAvance" id="btn_regAvance" value="Registrar">

                    </form>
                </div>
            </article>
            <footer id="pie_seguimiento"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
        </div>
    </body>
</html>

