<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CONSULTOR</title>
<link href="css/consultor.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="imagenes/favicon.ico"/>

<link href="js/custom-theme/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css" />
<link href="js/custom-theme/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.20.js"></script>
<script>
$(document).ready(function(){
  $( "#fecha_fin_proyecto" ).datepicker({ dateFormat: "yy/mm/dd" });
  
  var endingDate = $(this).attr('endingDate');
  
 });
</script>
</head>

<body id="body">
<div id="principal_consultor">
    <header id="cabecera_consultor"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
    <article id="contenido_consultor">
    <nav id="menu_consultor" >
            <a href="iuListaEmpresas.php"><img width="100%" height="48" src="imagenes/btn_listaEmpresas.jpg"/></a>
            <a href="iu.addActividad.html"><img width="100%" height="48" src="imagenes/btn_añadirActividad.jpg"/></a>
            <a href="iu.foro.php"><img width="100%" height="48" src="imagenes/btn_foro.jpg"/></a>
            <a href="iu.subidaArchivo.html"><img width="100%" height="48" src="imagenes/btn_subirArchivo.jpg"/></a>
            <a href="../Controlador/ControladorBackup.php"><img width="100%" height="48" src="imagenes/btn_backup.jpg"/></a>
    </nav>
    <div id="noticias_consultor">
        <form action="../Controlador/ControladorResgistroProyecto.php" method="post">
            <h2>Registro de Proyecto</h2>
                <table width="687" border="0">
                    <tr>
                        <td align="right">Nombre del Proyecto:</td>
                        <td width="491"><input type="text" name="nombre_proyecto" id="nombre_proyecto" /></td>
                    </tr>
                    <tr>
                        <td align="right">Codigo del Proyecto:</td>
                        <td width="491"><input type="text" name="codigo_proyecto" id="codigo_proyecto" /></td>
                    </tr>
                    <tr>
                        <td width="186" align="right">Gestion del Proyecto:</td>
                        <td><p>
                            <label><input name="visible_para" type="radio" id="gestion_1" value="gestio_1" checked="checked" />Primer Semestre</label><br />
                            <label><input name="visible_para" type="radio" id="gestion_2" value="getion_2" />Segundo Semestre</label><br />
                        </p></td>
                   </tr>
                    <tr>
                        <td align="right">Fecha Fin del Proyecto:</td>
                        <td width="491"><input type="text" name="fecha_fin_proyecto" id="fecha_fin_proyecto" /></td>
                    </tr>
                    <tr>
                        <td align="right">&nbsp;</td>
                        <td width="491">
                            <label>
                                <input  type="submit" name="btn_registroProyecto" id="btn_registroProyecto" value="Añadir" />
                            </label>
                        </td>
                    </tr>
                </table>
        </form>
    </div>
    </article>
    <footer id="pie_consultor"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
</div>
</body>
</html>

