<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CONSULTOR</title>
<link href="css/evaluacion.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="imagenes/favicon.ico"/>
</head>

<body id="body">
<div id="principal_consultor">
    <header id="cabecera_consultor"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
    <article id="contenido_consultor">
       <?php
       $a=$_GET['a'];
       $a=1;
            echo "<nav id='menu_consultor'>"
                    ."<a href='../Controlador/ControladorContrato.php?a=$a'><img width='100%' height='48' src='imagenes/btn_generarContrato.jpg'/></a>"
                    ."<a href='iu.mostrarPlanDePagosGE.php?a=$a'><img width='100%' height='48' src='imagenes/btn_verPlanDePagos.jpg'/></a>"     
                    ."<a href='iuListaEmpresas.php'><img width='100%' height='48' src='imagenes/btn_listaEmpresas.jpg'/></a>"
                    . "<a href='../Vista/iuDocenteGECalendario.php?a=$a'><img src='imagenes/btn_calendario_docenteGE.jpg' width='100%' height='48' alt='btn_1' /></a>"         
                ."</nav>";
        ?>  
    </article>
    <footer id="pie_consultor"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
</div>
</body>
</html>
