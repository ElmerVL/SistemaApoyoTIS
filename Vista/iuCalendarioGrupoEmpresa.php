<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/estilos_basicos.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="calendar.min.js"></script>
<link href="calendar.min.css" rel="stylesheet">
</head>

<body>
<div id="principal">
  <div id="cabecera"><img src="imagenes/encabezado_logo.jpg" width="550" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="350" height="200" alt="cabecera2" /></div>
  <div id="contenido_usuarios">
      <div id="menu_grupoEmpresa"><a href="../Vista/iu.grupoEmpresa.html"><img src='imagenes/btn_volverMiPagina.jpg' width='225' height='46' alt='btn_1' /></a></div>
      <div id="noticias_grupoEmpresa"><h2>GRUPO EMPRESA X</h2></div>

            <div id="calendario_grupoEmpresa" class="calendar" data-color="normal">Calendario de la grupo empresa
                <?php 
                include '../Controlador/ControladorCalendarioGrupoEmpresa.php';
                ?>
    </div>
      
    <script>
	var yy;
	var calendarArray =[];
	var monthOffset = [6,7,8,9,10,11,0,1,2,3,4,5];
	var monthArray = [["ENE","enero"],["FEB","Febrero"],["MAR","Marzo"],["ABR","Abril"],["MAY","Mayo"],["JUN","Junio"],["JUL","Julio"],["AGO","Agosto"],["SEP","Septiembre"],["OCT","Octubre"],["NOV","Noviembre"],["DIC","Diciembre"]];
	var letrasArray = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
	var dayArray = ["7","1","2","3","4","5","6"];
	$(document).ready(function() {
		$(document).on('click','.calendar-day.have-events',activateDay);
		$(document).on('click','.specific-day',activatecalendar);
		$(document).on('click','.calendar-month-view-arrow',offsetcalendar);
		$(window).resize(calendarScale);
		
                $(".calendar").calendar({
			"2014410": {
				"REUNION2": {
					location: "MEMI"
				}
			}
		});
		calendarSet();
		});
	</script>
      </div>
    </div>
  
  </div>
  <div id="pie">
    <p>Sistema Apoyo T.I.S.  </p>
  </div>
</div>
</body>
</html>