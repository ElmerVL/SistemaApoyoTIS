<?php
// lunes        : 0
// martes       : 1
// miercoles    : 2
// jueves       : 3
// viernes      : 4
// sabado       : 5

$diaseleccionado = 4;

function diaSemana($ano,$mes,$dia)
{       // 0->domingo	 | 6->sabado
	$dia= date("w",mktime(0, 0, 0, $mes, $dia, $ano));
	return $dia;
}

$fechaInicio=strtotime("01-05-2014");
$fechaFin=strtotime("20-07-2014");
for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
    $di = date("j", $i);
    $me = date("n", $i);
    $an = date("Y", $i);
    $diaSemana = diaSemana($an, $me, $di);
    if($diaSemana == $diaseleccionado){
      echo  '<div data-role="day" data-day="'.$an.$me.$di.'">
    <div data-role="event" data-name="This is an event" data-start="9.00" data-end="9.30" data-location="The Web"></div>
    </div>';
    }
     //   echo $diaSemana."<br>";
    }
echo  '<div data-role="day" data-day="2014522">
    <div data-role="event" data-name="This is an event" data-start="9.00" data-end="9.30" data-location="The Web"></div>
    </div>';