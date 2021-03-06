<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CALENDARIO</title>
<link href="css/calendario_grupoempresa.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="imagenes/favicon.ico"/>
<link href="calendar.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/calendarDocenteGE.min.js"></script>
</head>

<body id="body">
<div id="principal_calendarioGE">
    <header id="cabecera_calendario"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
    <article id="contenido_usuarios">
      <?php
        $a;
        $a=$_GET['a'];
      echo "<div id='menu_grupoEmpresa'>"
        ."<a href='../Controlador/ControladorContrato.php?a=$a'><img width='100%' height='48' src='imagenes/btn_generarContrato.jpg'/></a>"
                    ."<a href='iu.mostrarPlanDePagosGE.php?a=$a'><img width='100%' height='48' src='imagenes/btn_verPlanDePagos.jpg'/></a>"     
                    ."<a href='iuListaEmpresas.php'><img width='100%' height='48' src='imagenes/btn_listaEmpresas.jpg'/></a>"
                    . "<a href='iuDocenteGECalendario.php?a=$a'><img src='imagenes/btn_calendario_docenteGE.jpg' img width='100%' height='48'/></a>";
      ?>
        </div>
        <div id="noticias_grupoEmpresa">
        
      <div id="calendario_seguimientoGE" class="calendar" data-color="normal">Calendario de la grupo empresa
       <?php
                include '../Controlador/ControladorCalendarioGrupoEmpresa.php';
                mostrar_reuniones();
                mostrar_hitos();
                ?>
      </div>
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
		
		calendarSet();
		});
	</script>
      </article>
      <footer id="pie_calendario"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
</div>
</body>
</html>