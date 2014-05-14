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
    <nav id="menu_grupoEmpresa" >
            <a href="iuListaEmpresas.php"><img width="100%" height="48" src="imagenes/btn_listaEmpresas.jpg"/></a>
            <a href="iu.mostrarPlanDePago.php"><img width="100%" height="48" src="imagenes/btn_verPlanDePagos.jpg"/></a>
            <a href="iu.foro.php"><img width="100%" height="48" src="imagenes/btn_foro.jpg"/></a>
            <a href="iu.subidaArchivo.html"><img width="100%" height="48" src="imagenes/btn_subirArchivo.jpg"/></a>
            <a href="../Controlador/ControladorBackup.php"><img width="100%" height="48" src="imagenes/btn_backup.jpg"/></a>
    </nav>
    <div id="noticias_grupoEmpresa">
        <fieldset id="fieldsetForo" > 
        <legend>Formulario De Plan De Pagos</legend>
            <?php 
            $a = $_GET['a'];
            echo "<form action='../Controlador/ControladorPropuestaPlanDePago.php?a=$a&2' method='post'>"; 
            ?>
            <h2>Registro de Plan de Pagos</h2>
            <table width="80%" border="0">
                <tr>
                    <td>
                        <table width="300" border="0">
                            <tr>
                                <td align="right">Hito o Evento:</td>
                                <td width="130"><input type="text" name="hito_evento" id="hito_evento" /></td>
                            </tr>
                            <tr>
                                <td align="right">Porcentaje de Pago:</td>
                                <td width="130"><input type="text" name="porcentaje_pago" id="porcentaje_pago" /></td>
                            </tr>
                            <tr>
                                <td align="right">Fecha de Pago:</td>
                                <td width="130"><input type="text" name="fecha_pago" id="fecha_pago" /></td>
                            </tr>
                            <tr>
                                <td width="130"><input name="codPlan_pago" value="<?=$_GET['cod'];?>" ></td>
                            </tr>   
                        </table>
                    </td>
                    <td>    
                        <table width="300" border="0">
                            <tr>
                                <td align="center">Monto Total:</td>         
                            </tr>
                            <tr>
                                <td width="100" align="center"><input value="<?=$_GET['m_t'];?>" type="text" name="monto_total" id="monto_total" readonly="readonly"/></td>  
                            </tr>
                            <tr>
                                <td align="center">Porcentaje de Satisfaccion:</td>         
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