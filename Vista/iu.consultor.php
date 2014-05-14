<!DOCTYPE html>
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
            <a href="iuListaEmpresas.php"><img width="100%" height="48" src="imagenes/btn_listaEmpresas.jpg"/></a>
            <a href="iuAddActividad.php"><img width="100%" height="48" src="imagenes/btn_añadirActividad.jpg"/></a>
            <a href="iu.foro.php"><img width="100%" height="48" src="imagenes/btn_foro.jpg"/></a>
            <a href="iu.subidaArchivo.html"><img width="100%" height="48" src="imagenes/btn_subirArchivo.jpg"/></a>
            <a href="../Controlador/ControladorBackup.php"><img width="100%" height="48" src="imagenes/btn_backup.jpg"/></a>
    </nav>
    <div id="noticias_consultor">
        <?php 
        include 'Otros/actividades.data'; 
        include 'Otros/datosNoticias.data';
          ?>
    </div>
    </article>
    <footer id="pie_consultor"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
</div>
</body>
</html>

