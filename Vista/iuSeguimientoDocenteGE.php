<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Consultor</title>
        <link href="css/consultor.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="imagenes/favicon.ico" />
    </head>

    <body id="body">
        <div id="principal_consultor">
            <header id="cabecera_consultor"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
            <article id="contenido_consultor">
                <?php
                $a = $_GET['a'];
                $b = $_GET['b'];
                $c = $_GET['c'];
                
                $rol = $_GET['r'];
                $esp = $_GET['e'];
                
                require_once '../Controlador/ControladorSeguimientoGE.php';                    
                echo "<nav id='menu_consultor'>"
                . "<a href='../Controlador/ControladorContrato.php?a=$a'><img src='imagenes/btn_generarContrato.jpg' width='100%' height='48'/></a>"
                . "<a href='../Vista/iuDocenteGECalendario.php?a=$a'><img src='imagenes/btn_calendario_docenteGE.jpg' width='100%' height='48'/></a>"
                . " </nav>";
                ?>
                <div id="noticias_consultor">
                    <h2> Seguimiento: Reunión semanal </h2>
                    <lbl2>Registro de seguimiento del avance semanal</lbl2>
                    <?php
                    echo "<form name='formulario' method='POST' action='../Controlador/ControladorSeguimientoDocenteGE.php?a=$a&b=$b&c=$c'>"
                    ?>
                    <lbl>Rol:</lbl>
                    <br />
                    <textarea id="txtRol" name="rol" required="" pattern="[a-zA-Z0-9.,+_-]+" readonly="readonly"><?php echo $rol; ?></textarea>
                    <br />
                    <lbl>Qué se hara?</lbl>
                    <br />
                    <textarea id="txtSeguimiento" name="esperado" required="" pattern="[a-zA-Z0-9.,+_-]+" readonly="readonly"><?php echo $esp; ?></textarea>
                    <br />
                    <lbl>Detalle</lbl>
                    <br />
                    <textarea id="txtSeguimiento" name="detalle" required="" pattern="[a-zA-Z0-9.,+_-]+" onclick="clearContents(this);">Detalle de lo que espera la grupo-empresa</textarea>
                    <br />
                    <lbl>Qué se hizo?</lbl>
                    <br />
                    <textarea id="txtSeguimiento" name="realizado" required="" pattern="[a-zA-Z0-9.,+_-]+" onclick="clearContents(this);">dgldiufgsd</textarea>
                    <br />
                    <lbl>Observaciones</lbl>
                    <br />
                    <textarea id="txtSeguimiento" name="observaciones" required="" pattern="[a-zA-Z0-9.,+_-]+" onclick="clearContents(this);">dsiohflisdf</textarea>
                    <br />
                    
                    <input type="submit" name="btn_regAvance" id="btn_regAvance" value="Registrar">

                    </form>
                    <br />

                    <br />
                    <br />
                    <script>
                        function clearContents(element) {
                            element.value = '';
                        }
                    </script>
                </div>   
            </article>
            <footer id="pie_consultor"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
        </div>
    </body>
</html>