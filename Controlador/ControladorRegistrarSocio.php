<?php

require('../Modelo/Model.php');

$nombre=$_POST['nombre_usuario'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$estado_civil=$_POST['combo_estado_civil'];
$direccion=$_POST['direccion'];
$profesion=$_POST['profesion'];
$correo=$_POST['correo'];
$clave=$_POST['clave'];
$claveRepetida=$_POST['claveRepetida'];

if ($clave == $claveRepetida) {
    RegistrarUsuario($usuario, $contrasena1);
    RegistrarGrupoEmpresa($usuario,$contrasena1,$nombre_largo, $nombre_corto, $correo, $direccion, $telefono);
} else {
    echo "LAS CONTRASEÑAS NO COINCIDEN";
}

//echo $nombre.'<br>';
//echo $apellido.'<br>';
//echo $estado_civil.'<br>';
//echo $direccion.'<br>';
//echo $profesion.'<br>';
//echo $correo.'<br>';
//echo $clave.'<br>';
//echo $claveRepetida.'<br>';