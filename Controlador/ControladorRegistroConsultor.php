<?php

require ('../Modelo/ModeloRegistroConsultores.php');

echo $usuario = $_POST['usuario_consultor'];
echo $contrasena1_consultor = $_POST['contraseña_consultor1'];
echo $contrasena2_consultor = $_POST['contraseña_consultor2'];
echo $nombre_consultor = $_POST['nombreCompleto_consultor'];
echo $correo_consultor = $_POST['correo_consultor'];

if ($contrasena1 == $contrasena2) {
    RegistrarUsuario($usuario, $contrasena1);
    RegistrarConsultor($usuario, $contrasena1, $nombre_largo, $nombre_corto, $correo, $direccion, $telefono);
} else {
    echo "LAS CONTRASEÑAS NO COINCIDEN";
}
?>
