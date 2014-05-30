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
            <?php
            $a=$_GET['a'];// $a -> codigo del consultor
            $u=$_GET['u'];// $u -> codigo de usuario del consultor
            echo"<nav id='menu_consultor' >
                   <a href='iu.registroProyecto.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_registrarProyecto.jpg'/></a>    
                    <a href='iuListaEmpresas.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_listaEmpresas.jpg'/></a>
                    <a href='iuAddActividad.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_añadirActividad.jpg'/></a>
                    <a href='iu.foroConsultor.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_foro.jpg'/></a>
                    <a href='iu.subidaArchivo.html?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_subirArchivo.jpg'/></a>
                    <a href='iuSeleccionProyectoEvaluacion.php?a=$a&u=$u'><img width='100%' height='48' src='imagenes/btn_registroEvaluacion.jpg'/></a>
                    <a href='../Controlador/ControladorBackup.php'><img width='100%' height='48' src='imagenes/btn_backup.jpg'/></a>
                    <a href='../Controlador/ControladorFinalizarSesion.php'><img src='imagenes/btn_cerrarSesion.png' width='100%' height='46' /></a>
                </nav>";
            ?>
               <div id="noticias_consultor"> 
                   <fieldset id="fieldsetForo"> 
                   <legend>Formulario de respuestas</legend>
             <?php echo"<form id='valorNombre' action='../Controlador/ControladorComentarioConsultor.php?a=$a&u=$u' method='get'";?>
                            <table align="left" border="2" class="encabezado" width="100%">      
                                <tr>
                                <?php
                                    require '../Controlador/ControladorFormularioForoConsultor.php';
                                    $nombreConsultor =  mostrarNombreDelConsultor($a,$u);
                                    echo"<td width='30%' align='right'><strong>Consultor(ra) :</strong></td>
                                         <td><strong>$nombreConsultor</strong></td>";
                                ?>
                                    <input name="codigo" value="<?=$_GET['c_f'];?>" type="hidden">
                                    <input name="cantidad" value="<?=$_GET['candC'];?>" type="hidden">
                                </tr>
                                <tr>
                                    <td width="30%" align="right"><Strong>Comentario :</strong></td> 
                                    <td><textarea name="comentario" cols="100%" rows="5%" required></textarea></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="Submit"  value="Registrar Comentario" /></td>  
                                </tr>
                            </table>
                        </form>    
                    </fieldset>
                    <br> 
                    <fieldset id="fieldsetForo"> 
                    <legend>TEMA DE CONVERSACION</legend>
                        <table align="left" border="0" class="encabezado" width="100%"> 
                            <td> 
                                <?php
                                require '../Controlador/ControladorMostrarTemaControlador.php';
                                $codF=$_GET['c_f'];
                                echo mostrarTemaAComentar($codF);
                                ?> 
                            </td> 
                        </table>
                    </fieldset>
                    <fieldset id="fieldsetForo"> 
                    <legend>Comentarios de los Visitantes</legend>
                        <table  align="left" border="0" class="encabezado" width="100%">   
                            <td> 
                                <?php
                                $codArchivo = $_GET['c_f'];
                                $nombreArchivo = $_GET['nomArchivo'];
                                include ("Otros/Comentarios".$codArchivo."_".$nombreArchivo.".data");
                                ?> 
                            </td> 
                        </table>
                    </fieldset>
               </div>
            </article>
            <footer id="pie_consultor"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
        </div>
    </body>
</html>