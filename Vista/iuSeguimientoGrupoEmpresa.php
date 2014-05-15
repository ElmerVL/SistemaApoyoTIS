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
                $b;
                $b = $_GET['b'];

                echo "<nav id='menu_grupo_empresa'>
            <a href='../Vista/iuDiaReunionGE.php?a=$a'><img src='imagenes/btn_diaDeReunion.jpg' width='100%' height='46' alt='btn_1' /></a>
            <a href='../Vista/iuCalendarioGrupoEmpresa.php?a=$a'><img src='imagenes/btn_calendario.jpg' width='100%' height='46' alt='btn_1' /></a>
            <a href='../Vista/iuGrupoEmpresa.php?a=$a'><img src='imagenes/btn_volverMiPagina.jpg' width='100%' height='46' alt='btn_1' /></a>  
        </nav>"
                ?>
                <div id="noticias_grupoEmpresa">
                    <h2> Seguimiento: Reunión semanal </h2>
                    <lbl2>Ingrese los datos necesarios para el registro de los avances semanal con el docente la cantidad de veces que considere necesario</lbl2>
                    <?php
                    echo "<form name='formulario' method='POST' action='../Controlador/ControladorSeguimientoSemanal.php?a=$a&b=$b'>"
                    ?>
                    <lbl>Rol:</lbl>
                    <br />
                    <select id="cbox_roles" name="cbox_roles" size=1> 
                        <option value="docente">Docente</option>
                        <option value="cliente">Cliente</option>
                        <option value="product owner">Product Owner</option>
                    </select>
                    <br />
                    <lbl>Qué se hara?</lbl>
                    <br />
                    <textarea id="txtEsperado" name="avance" required="" pattern="[a-zA-Z0-9.,+_-]+" onclick="clearContents(this);">¿Qué espera la grupo-empresa de la reunión?</textarea>
                    <br />
                    <input type="submit" name="btn_regAvance" id="btn_regAvance" value="Registrar">

                    </form>
                    <br />

                    <?php
                    echo "<button id='btn_terminar'><a href='../Vista/iuGrupoEmpresa.php?a=$a'>Terminar</a></button>";
                    ?>
                    <br />
                    <br />
                    <script>
                        function clearContents(element) {
                            element.value = '';
                        }
                    </script>
                </div>   
            </article>
            <footer id="pie_grupo_empresa"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
        </div>
    </body>
</html>