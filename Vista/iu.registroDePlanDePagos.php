<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GRUPO-EMPRESA</title>
<link href="css/grupo_empresa_2.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="imagenes/favicon.ico"/>
<link href="js/custom-theme/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css" />
<link href="js/custom-theme/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.20.js"></script>

<script>
    $(document).ready(function(){
        $( "#fecha_pago" ).datepicker({ dateFormat: "yy/mm/dd" });
        var endingDate = $(this).attr('endingDate');
    });
</script>
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
        <fieldset id="fieldsetForo" > 
        <legend>Formulario De Plan De Pagos</legend>
            <?php 
            echo "<form action='../Controlador/ControladorPropuestaPlanDePago.php?a=$a&2' method='post'>"; 
            ?>
            <h2>Registro de Plan de Pagos</h2>
            <table width="80%" border="0">
                <tr>
                    <td>
                        <table width="300" border="0">
                            <tr>
                                <td align="right">Hito o Evento:</td>
                                <td width="130"><input type="text" name="hito_evento" id="hito_evento" required/></td>
                            </tr>
                            <tr>
                                <td align="right">Porcentaje de Pago:</td>
                                <td width="130"><input type="text" name="porcentaje_pago" id="porcentaje_pago" required pattern="[0-9.]+"/></td>
                            </tr>
                            <tr>
                                <td align="right">Fecha de Pago:</td>
                                <td width="130"><input type="text" name="fecha_pago" id="fecha_pago" placeholder="Seleccione una fecha" required/></td>
                            </tr>
                            <tr>
                                <td width="130"><input name="codPlan_pago" value="<?=$_GET['cod'];?>" type="hidden"></td>
                            </tr>   
                        </table>
                    </td>
                    <td>    
                        <table width="300" border="0">
                            <tr>
                                <td align="center">Monto Restante:</td>         
                            </tr>
                            <tr>
                                <td width="100" align="center"><input value="<?=$_GET['m_t'];?>" type="text" name="monto_total" id="monto_total" readonly="readonly"/></td>  
                            </tr>
                            <tr>
                                <td align="center">Porcentaje Restante:</td>         
                            </tr>
                            <tr>
                                <td width="100" align="center"><strong><input size="3" value="<?=$_GET['p_s'];?>" type="text" name="porcentaje_satisfaccion" id="porcentaje_satisfaccion" readonly="readonly"/> %</strong></td>  
                            </tr>
                        </table>
                    </td> 
                </tr>
                <tr>
                    <table width="340" border="0">   
                        <tr>
                            <td width="30%" align="right">Entregables:</td>
                            <td><textarea name="entregables" cols="85%" rows="5%"></textarea></td>
                        </tr>
                        <tr>
                            <td align="right">&nbsp;</td>
                            <td width="491">
                                <label>
                                    <input  type="submit" name="btn_registroPago" id="btn_registroProyecto" value="Añadir" />
                                </label>
                            </td>
                        </tr>
                    </table>
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