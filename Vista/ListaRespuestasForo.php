<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/estilos_basicos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="principal">
  <div id="cabecera"><img src="imagenes/encabezado_logo.jpg" width="550" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="350" height="200" alt="cabecera2" /></div>
  <div id="menu"><a href="iu.ingresar.html"><img src="imagenes/btn_ingresar.jpg" width="225" height="46" alt="btn_ingresar" /></a><a href="iu.noticias.html"><img src="imagenes/btn_noticias.jpg" width="225" height="46" alt="btn_noticias" /></a><a href="iu.Foro.php"><img src="imagenes/btn_foro.jpg" width="225" height="46" alt="btn_foro" /></a><a href="iu.nosotros.html"><img src="imagenes/btn_nosotros.jpg" width="225" height="46" alt="btn_nosotros" /></a></div>
  <div id="contenido">foro
      
      <form action="../Modelo/comentar.php" method="post"> (Obligatorio)<b>Nombre</b>: <input name="nombre"><br> 
<br> 
<textarea name="comentario" cols=34>Escribe tu Comentario...</textarea><br/> 
<input type="submit" value="Enviar Comentario"/> 


</form> 

<br> 

<table align="left" border="2" class="encabezado" width="850">   
<td> 
<?php require('../Controlador/ControladorMostrarTema.php');echo $aux; ?> 
</td> 
</table> 
 

<b>Comentarios de los Visitantes</b> 

<table align="left" border="2" class="encabezado" width="850">   
<td> 
<?php include 'Otros/data.data'; ?> 
</td> 
</table> 
  


  </div>
  <div id="pie">Sistema Apoyo TIS</div>
</div>
</body>
    
</html>
