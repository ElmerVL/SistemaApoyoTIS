<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GRUPO-EMPRESA</title>
<link href="css/grupo_empresa_2.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="imagenes/favicon.ico"/>
</head>

<body id="body">
<div id="principal_grupoEmpresa">
    <header id="cabecera_grupoEmpresa"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
    <article id="contenido_grupoEmpresa">
    <nav id="menu_grupoEmpresa" >
        <a href="iu.propuestaDePago.php"><img width="100%" height="48" src="imagenes/btn_planDePagos.jpg"/></a>
        <a href="iu.mostrarPlanDePago.php"><img width="100%" height="48" src="imagenes/btn_verPlanDePagos.jpg"/></a>
            <a href="iu.foro.php"><img width="100%" height="48" src="imagenes/btn_foro.jpg"/></a>
            <a href="iu.subidaArchivo.html"><img width="100%" height="48" src="imagenes/btn_subirArchivo.jpg"/></a>
            <a href="../Controlador/ControladorBackup.php"><img width="100%" height="48" src="imagenes/btn_backup.jpg"/></a>
    </nav>
    <div id="noticias_grupoEmpresa">
        <fieldset> 
        <legend>PROPUESTA DE PAGO</legend>
    <?php 
    $a = $_GET['a'];
    echo "<form action='../Controlador/ControladorPropuestaPlanDePago.php?a=$a&1' method='post'>"; 
    
    ?>
        
            <h2>Registro de Plan de Pagos</h2>
            <table width="687" border="0">
                <tr>
                    <td align="right">Monto Total:</td>
                    <td width="130"><input type="text" name="monto_total" id="monto_total" /> (Bolivianos)</td>
                </tr>
                <tr>
                    <td align="right">Porcentaje de Satisfaccion:</td>
                    <td width="130"><input type="text" name="porcentaje_satisfaccion" id="porcentaje_satisfaccion" /> (%)</td>
                </tr>
                <tr>
                    <td align="right">&nbsp;</td>
                    <td width="491"><label>
                    <input  type="submit" name="btn_registroPago" id="btn_registroProyecto" value="Añadir" />
                    </label></td>
                </tr>    
            </table>
        </form>
        </fieldset>
    </div>
    </article>
    <footer id="pie_grupoEmpresa"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
</div>
</body>
</html>