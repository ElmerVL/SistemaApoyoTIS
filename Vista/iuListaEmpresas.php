<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CONSULTOR</title>
<link href="css/consultor.css" rel="stylesheet" type="text/css" />
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
            <a href="../Controlador/ControladorBackup.php"><img width="100%" height="48" src="imagenes/btn_backup.jpg"/></a>
    </nav>
    <div id="noticias_seguimiento">
        <h2> Lista de Grupo Empresas </h2>
        <form name="f" action="../Controlador/ControladorGrupoEmpresa.php" method="post">
            <table align=center frame="void" border="0" class="encabezado" width="500" bgcolor=#C6E1E1>
                <br>
                    <caption> GRUPO - EMPRESAS </caption>
                   <thead>
                       <tbody align="center" style="font:  1.1em/1.1em 'FB Armada' arial">
                       <tr><th>Nombre de la Grupo Empresa</th></tr>
                       
                        <?php 
                        include '../Controlador/ControladorGrupoEmpresa.php'; 
                        $fila= mostrarListaEmp();
                        foreach ($fila as $elemento){ ?>
                        <tr>
                            <td><?php echo $elemento['grupoempresa'] ?></td>
                            </tr>
                        <?php } ?>
                        
                       <tbody>
                        </thead>
                </table> 
          </form>  
    </div>
    </article>
    <footer id="pie_seguimiento"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
</div>
</body>
</html>
