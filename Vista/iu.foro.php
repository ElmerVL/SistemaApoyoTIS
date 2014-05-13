<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FORO</title>
<link href="css/foro.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="imagenes/favicon.ico"/>
</head>

<body id="body">
<div id="principal_foro">
  <header id="cabecera_foro"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
  <nav id="menu_foro"><a href="iu.ingresar.html"><img src="imagenes/btn_ingresar.jpg" width="24%" height="46" alt="btn_ingresar" /></a><a href="iu.noticias.php"><img src="imagenes/btn_noticias.jpg" width="25%" height="46" alt="btn_noticias" /></a><a href="iu.Foro.php"><img src="imagenes/btn_foro.jpg" width="25%" height="46" alt="btn_foro" /></a><a href="iu.nosotros.html"><img src="imagenes/btn_nosotros.jpg" width="25%" height="46" alt="btn_nosotros" /></a></nav>
  <article id="contenido_foro">foro
        <div id="idiomas">
           <ul id="botonera-idiomas">
           <li class="boton_idioma"><a href="FormularioForo.html">Registrar Tema</a></li>
           </ul>
        /div> 
    <form name="f" action="../Controlador/ControladorListaTemasForo.php" method="post">
        <table align="left" border="2" class="encabezado" width="850">
                <caption> TEMAS </caption>
                <thead>
                  <tr><th width="700">Titulo</th><th width="300">Autor</th></tr>
                    <?php 
                    require '../Controlador/ControladorListaTemasForo.php';
                    $lista = mostrarListaF();
                    foreach($lista as $post):?>
                    <tr>
                    <?php echo $post['titulo']?>
                    <?php echo $post['autor']?>
                  </tr><?php endforeach;?>
                </thead>   
         </table> 
     </form>   
   </article>
  <footer id="pie_foro">
      <p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software  </p>
   </footer>
</div>
</body>
    
</html>
