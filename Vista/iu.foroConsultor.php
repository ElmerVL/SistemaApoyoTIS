<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CONSULTOR</title>
        <link href="css/consultor.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="imagenes/favicon.ico"/>
    </head>

    <body id="body">
        <div id="principal_consultor">
            <header id="cabecera_consultor"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
            <article id="contenido_consultor">
                <nav id="menu_consultor" >

                    <a href="iu.registroProyecto.php"><img width="100%" height="48" src="imagenes/btn_registrarProyecto.jpg"/></a>    
                    <a href="iuListaEmpresas.php"><img width="100%" height="48" src="imagenes/btn_listaEmpresas.jpg"/></a>
                    <a href="iuAddActividad.php"><img width="100%" height="48" src="imagenes/btn_añadirActividad.jpg"/></a>
                    <a href="iu.foro.php"><img width="100%" height="48" src="imagenes/btn_foro.jpg"/></a>
                    <a href="iu.subidaArchivo.html"><img width="100%" height="48" src="imagenes/btn_subirArchivo.jpg"/></a>
                    <a href="iuSeleccionProyectoEvaluacion.php"><img width="100%" height="48" src="imagenes/btn_registroEvaluacion.jpg"/></a>
                    <a href="../Controlador/ControladorBackup.php"><img width="100%" height="48" src="imagenes/btn_backup.jpg"/></a>
                    <a href='../Controlador/ControladorFinalizarSesion.php'><img src='imagenes/btn_cerrarSesion.png' width='100%' height='46' /></a>
                </nav>
                <div id="noticias_consultor">

                    <fieldset id="fieldsetForo"> 
                    <legend>Foro Consultor</legend>
                    <a href="FormularioForo.html">Registrar Tema</a>
                    <form name="f" action="../Controlador/ControladorListaTemasForo.php" method="post">
                        <table align="center" border="2" class="encabezado" width="850">
                            <thead>
                                <tr><td width="60%">Temas</td><td width="10%">Comentarios</td><td width="30%">Autor</td></tr>
                                <?php 
                                require '../Controlador/ControladorListaTemasForo.php';
                                $lista = mostrarListaF();
                                foreach($lista as $post):?>
                                <tr>
                                    <td><?php echo $post['titulo'];?></td>
                                    <td><?php echo $post['cantidad'];?></td>
                                    <td><?php echo $post['autor'];?></td>
                                </tr><?php endforeach;?>

                            </thead>
                        </table> 
                    </form>
                    </fieldset>
                </div>
            </article>
            <footer id="pie_consultor"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
        </div>
    </body>
</html>
