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
       //$c_c=$_GET['codC'];
       $c_c=1;
            echo "<nav id='menu_consultor_vistaGE'>"
                    ."<a href='../Controlador/ControladorContrato.php?codC=$c_c&codGE=$codGE'><img width='100%' height='48' src='imagenes/btn_generarContrato.jpg'/></a>"
                    ."<a href='iu.mostrarPlanDePagosGE.php?codC=$c_c&codGE=$codGE'><img width='100%' height='48' src='imagenes/btn_verPlanDePagos.jpg'/></a>"   
                    ."<a href='iu.estadoDeEvaluacionPlanDePagos.php?codC=$c_c'&codGE=$codGE'><img width='100%' height='48' src='imagenes/btn_verEvaluacionPlanDePagos.jpg'/></a>"         
                    ."<a href='iuListaEmpresas.php?codC=$c_c'><img width='100%' height='48' src='imagenes/btn_listaEmpresas.jpg'/></a>"         
                ."</nav>";
        ?>
        <div id="campoBlanco_consultor_vistaGE">
            <fieldset id="fieldsetForo" width="670"> 
            <legend>Estado De Evaluacion</legend>
            <form name="f" action="../Controlador/ContriladorMostrarPlanDePago.php" method="post">
                <div class="CSSTableGenerator">
                    <table align="left" border="2" class="encabezado" width="670">
                        <thead>
                        <tr>
                            <td>Hito O Evento</td>
                            <td>Porcentaje De Stisfaccion</td>
                            <td>Porcentaje Alcanzado</td>
                            <td>Estado De Pago</td>
                        </tr>
            
                        <?php
                            require '../Controlador/ControladorestadoDeEvaluacionPlanDePagos.php';
                            $estado= retornarEstadoTablaPagoConsultor();
                            if($estado=="basio"){
                                echo "NO EXIXTE UNA EVALUACION RECIENTE";
                            }else if($estado=="lleno"){
                                $array_evaluacion=retornarEstadoDeEvaluaciones();
                                foreach($array_evaluacion as $post):?>
                                            <tr>
                                            <td><?php echo $post?></td>
                                            </tr>        
                                <?php endforeach;
                            }
                        ?>
        </div>
    </article>
    <footer id="pie_consultor_vistaGE"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
</div>
</body>
</html>
