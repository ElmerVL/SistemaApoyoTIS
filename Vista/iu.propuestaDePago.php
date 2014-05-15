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
                <?php
                $a = $_GET['a'];

                echo "<nav id='menu_grupoEmpresa'>
                            <a href='iu.propuestaDePago.php?a=$a'><img width='100%' height='48' src='imagenes/btn_planDePagos.jpg'/></a>
                            <a href='../Vista/iuDiaReunionGE.php?a=$a'><img src='imagenes/btn_diaDeReunion.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Vista/iuCalendarioGrupoEmpresa.php?a=$a'><img src='imagenes/btn_calendario.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Vista/iuGrupoEmpresa.php?a=$a'><img src='imagenes/btn_volverMiPagina.jpg' width='100%' height='46' alt='btn_1' /></a>  
                      </nav>"
                ?>
    <div id="noticias_grupoEmpresa">
        <fieldset> 
        <legend>PROPUESTA DE PAGO</legend>
        <?php 
        echo "<form action='../Controlador/ControladorPropuestaPlanDePago.php?a=$a&1' method='post'>"; 
        ?>
        
            <h2>Registro de Plan de Pagos</h2>
            <table width="687" border="0">
                <tr>
                    <td align="right">Monto Total:</td>
                    <td width="130"><input type="text" name="monto_total" id="monto_total" required pattern="[0-9.]+"/> (Bolivianos)</td>
                </tr>
                <tr>
                    <td align="right">Porcentaje de Satisfaccion:</td>
                    <td width="130"><input type="text" name="porcentaje_satisfaccion" id="porcentaje_satisfaccion" required pattern="[0-9.]+"/> (%)</td>
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