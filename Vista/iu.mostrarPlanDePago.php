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
    <div id="noticias_grupoEmpresa" class="CSSTableGenerator">
        GRUPO EMPRESA X
         <form name="f" action="../Controlador/ContriladorMostrarPlanDePago.php" method="post">
             <table align="left" border="2" class="encabezado" width="670">
                         <caption> PLAN DE PAGO </caption>
                         <thead>
                         <tr><td>Hito O Evento</td><td>Porcentaje</td><td>Monto</td><td>Fecha De Pago</td><td>Entregables</td></td>
                         <?php 
                            $codplan_papo=$_GET['cod'];
                            echo "codigo :".$codplan_papo;
                            require '../Controlador/ControladorMostrarPlanDePagos.php';
                            //require '../Modelo/ModeloPropuestaPlanDePago.php';
                            $lista = mostrarPlan($codplan_papo);
                            //$lista = mostrarPlanDePago($codplan_papo);
                            foreach($lista as $post):?>
                            <tr>
                                <td><?php echo $post['hitoevento']?></td>
                                <td><?php echo $post['porcentajepago']?></td>
                                <td><?php echo $post['monto']?></td>
                                <td><?php echo $post['fechapago']?></td>    
                                <td><?php echo $post['entregables']?></td>
                            </tr><?php endforeach;?>
                         </thead>
            </table>
         </form>
    </div>
    </article>
    <footer id="pie_grupoEmpresa"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
</div>
</body>
</html>