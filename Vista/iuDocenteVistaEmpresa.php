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
  <div id="contenido_usuarios">
  <?php  
        $a;
        $a=$_GET['cge'];
        echo "<div id='menu_consultor' ><a href='../Controlador/ControladorContrato.php?a=$a'><img src='imagenes/btn_generarContrato.jpg' width='225' height='46' alt='btn_1' /></a>"
                . "<a href='../Vista/iuDocenteGECalendario.php?a=$a'><img src='imagenes/btn_calendario_docenteGE.jpg' width='225' height='46' alt='btn_1' /></a></div>";
 
    ?>  
      <div id="construccion"><img src="imagenes/sitio-en-construccion.jpg" width="100%" height="100%" alt="sitio_en_construcción"/></div>
  </div>
  <div id="pie">
    <p>Sistema Apoyo T.I.S.  </p>
  </div>
</div>
</body>
</html>
