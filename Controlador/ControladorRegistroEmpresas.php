<?php

require('../Modelo/ModeloRegistroEmpresas.php');

$usuario = $_POST['nombre_usuario'];
$contrasena1 = $_POST['contraseña_usuario1'];
$contrasena2 = $_POST['contraseña_usuario2'];
$nombre_largo = $_POST['nombre_largo_ge'];
$nombre_corto = $_POST['nombre_corto_ge'];
$correo = $_POST['correo_ge'];
$direccion = $_POST['direccion_ge'];
$telefono = $_POST['telefono_ge'];

if ($contrasena1 == $contrasena2) {
    RegistrarUsuario($usuario, $contrasena1);
    RegistrarGrupoEmpresa($usuario,$contrasena1,$nombre_largo, $nombre_corto, $correo, $direccion, $telefono);
} else {
    echo "LAS CONTRASEÑAS NO COINCIDEN";
}
?>