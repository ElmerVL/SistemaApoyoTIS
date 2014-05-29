<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CONSULTOR</title>
<link href="css/consultorVistaGE.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="imagenes/favicon.ico"/>
</head>

<body id="body">
<div id="principal_consultor_vistaGE">
    <header id="cabecera_consultor_vistaGE"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
    <article id="contenido_consultor_vistaGE">
       <?php
       $codGE=$_GET['codGE'];
       //$id_c=$_GET['codC'];
       $c_c=1;
            echo "<nav id='menu_consultor_vistaGE'>"
                    ."<a href='../Controlador/ControladorContrato.php?codC=$c_c&codGE=$codGE'><img width='100%' height='48' src='imagenes/btn_generarContrato.jpg'/></a>"
                    ."<a href='iu.mostrarPlanDePagosGE.php?codC=$c_c&codGE=$codGE'><img width='100%' height='48' src='imagenes/btn_verPlanDePagos.jpg'/></a>"     
                    ."<a href='iuListaEmpresas.php?codC=$c_c'><img width='100%' height='48' src='imagenes/btn_listaEmpresas.jpg'/></a>"         
                ."</nav>";
        ?>
        <div id="campoBlanco_consultor_vistaGE">
            <fieldset id="fieldsetForo" width="100%"> 
            <legend>Evaluacion Plan de Pagos</legend>
            <?php
      echo" <form name='formulario' action='../Controlador/ContoladorRegistroEvaluacionHitoPagable.php&codGE=$codGE' method='post'>"
            ?>
                <table width="90%" border="2" cellspacing="2" cellpadding="2">
                    <tr>
                        <td width="30%" align="right">Hito o Evento :</td>
                        <td><input type="text" name="hitoEvento" value="<?=$_GET['nombreH'];?>" readonly="readonly"></td>
                    </tr>
                    <tr>
                        <td width="30%" align="right">Entregables :</td>
                        <td><table border="0">
                            <?php
                                $codHito=$_GET['codH'];
                               require '../Controlador/ControladorEvaluacionHitoPagableGE.php';
                                        $lista = mostrarEntregables($codHito);
                                        foreach($lista as $post):?>
                                            <tr>
                                            <td><?php echo "- ".$post?></td>
                                            </tr>        
                                        <?php endforeach;
                            ?> 
                            </table></td>
                    </tr>
                    <tr>
                        <td width="30%" align="right">Monto De Pago :</td>
                        <td><input type="text" name="monto" value="<?=$_GET['monto'];?>" readonly="readonly"> <strong>(Bolivianos)</strong></td>
                    </tr>
                    <tr>
                        <td width="30%" align="right">Porcentaje de Satisfaccion :</td>
                        <td><input type="text" name="porcentajeSatisfaccion" value="<?=$_GET['p_s'];?>" readonly="readonly"> <strong>(%)</strong></td>
                    </tr>
                    <tr>
                        <td width="30%" align="right">Porcentaje Alcazado Total :</td>
                        <td><input type="text" name="porcentajeAlcanzado"> <strong>(%)</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" ><input  type="submit" name="Submit" value="Terminar"></td>
                    </tr>
                </table>
           
           </form>
            <?php
            $nombreH=$_GET['nombreH'];
                if(isset($_REQUEST['tabla'])){
                    //$codE = $_GET['codE'];
                    //$cod_ge=$_GET['a'];
                    echo"<fieldset id='fieldsetForo' width='90%'>" 
                       ."<legend>Registro de los Entregables</legend>";
                    echo"<form name'f' action='../Controlador/ContriladorMostrarPlanDePago.php' method='post'>"
                            ."<table align='center' frame='void' border='2' class='encabezado' width='70%' bgcolor=#C6E1E1>"
                                ."<thead>"
                                    ."<tbody align='center' style='font:  1.1em/1.1em 'FB Armada' arial'>"
                                    ."<tr><th>Entregables</th><th>porcentaje</th><th>Alcance</th><th>Suma Del Alcance</th></tr>";
                                        include ("Otros/EvaluacionHitosGE/".$codHito."_".$nombreH.".data");
                    echo            "</tbody>"
                                ."</thead>"
                            ."</table>"
                       ."</form>"
                       ."</fieldset>";
                }?>
            <br>
            <?php
           
            $monto=$_GET['monto'];
            $p_s=$_GET['p_s'];
           // echo"
           // <form name='formulario' action='../Controlador/ControladorEvaluacionHitoPagableGE.php?registarEPPGE&codGE=$codGE&codH=$codHito&nombreH=$nombreH&monto=$monto&p_s=$p_s' method='post'>";
            ?>
                <table  width="80%" border="2" cellspacing="2" cellpadding="2" >
                    <thead>
                    <tr>
                        <th width='40%' align="center">Entregables</th>
                        <th width='5%' align="center">Porcentaje (%)</th>
                        <th width='5%' align="center">Alcansado (%)</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    
                        <?php
                        if(isset($_REQUEST['tablaEvaluacion'])){
                            require_once '../Controlador/ControladorEvaluacionHitoPagableGE.php';    
                        $nuevaLista= mostrarRegistrosEtregables($codHito);
                        $con=0;
                        foreach($nuevaLista as $post):
                        echo"<form name='formulario' action='../Controlador/ControladorEvaluacionHitoPagableGE.php?registarEPPGE&true&codGE=$codGE&codH=$codHito&nombreH=$nombreH&monto=$monto&p_s=$p_s' method='post'>
                            <tr>"
                                ."<td ><input size='70%' name='entregable' value='$post' readonly='readonly'></td>"
                                ."<td ><input size='8%' name='porcentaje' ></td>"
                                ."<td ><input size='8%' name='porcentajeAlcansado' ></td>"
                                ."<td width='5%'><input size='6%' type='submit' name='Submit' value='Guardar$con'></td>"
                            ."</tr>
                             </form>" ;
                        $con=$con+1;
                        endforeach;
                        }?>
                        <?php
                       if(isset($_REQUEST['tablaEvaluacionNueva'])){
                            $listaNueva= retornarRegistro($codHito);
                            $con=0;
                            foreach($listaNueva as $post):
                            echo"<form name='formulario' action='../Controlador/ControladorEvaluacionHitoPagableGE.php?registarEPPGE&true&contador=$con&codGE=$codGE&codH=$codHito&nombreH=$nombreH&monto=$monto&p_s=$p_s' method='post'>
                                <tr>"
                                    ."<td ><input size='70%' name='entregable' value='$post' readonly='readonly'></td>"
                                    ."<td ><input size='8%' name='porcentaje' ></td>"
                                    ."<td ><input size='8%' name='porcentajeAlcansado' ></td>"
                                    ."<td width='5%'><input size='6%' type='submit' name='Submit' value='Guardar$con'></td>"
                                ."</tr>
                                </form>" ;
                            $con=$con+1;
                            endforeach;
                        }?> 
                        
                    </tbody>
                </table>
            </fieldset>
        </div> 
    </article>
    <footer id="pie_consultor_vistaGE"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
</div>
</body>
</html>