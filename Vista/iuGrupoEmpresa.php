<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Grupo-Empresa</title>
        <link href="css/grupo_empresa.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="imagenes/favicon.ico" />
    </head>

    <body id="body">
        <div id="principal_grupo_empresa">
            <header id="cabecera_grupo_empresa"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
            <article id="contenido_usuarios">
                <?php
                $a;
                $a = $_GET['a'];

                echo "<nav id='menu_grupo_empresa'>
                            <a href='iu.propuestaDePago.php?a=$a'><img width='100%' height='48' src='imagenes/btn_planDePagos.jpg'/></a>
                            <a href='iu.mostrarPlanDePago.php?a=$a'><img width='100%' height='48' src='imagenes/btn_verPlanDePagos.jpg'/></a>    
                            <a href='../Vista/iuDiaReunionGE.php?a=$a'><img src='imagenes/btn_diaDeReunion.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Vista/iuCalendarioGrupoEmpresa.php?a=$a'><img src='imagenes/btn_calendario.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Vista/iuGrupoEmpresa.php?a=$a'><img src='imagenes/btn_volverMiPagina.jpg' width='100%' height='46' alt='btn_1' /></a>  
                      </nav>"
                ?>
                <div id="noticias_grupoEmpresa">
                    <?php
                    require '../Controlador/ControladorGrupoEmpresa.php';
                    $campo = mostrarDatosEmp($a);
                    echo "<div id='noticias_consultor'>$campo</div>";
                    ?> 
                </div>   
            </article>
            <footer id="pie_grupo_empresa"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
        </div>
    </body>
</html>
