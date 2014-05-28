<?php

require ('../Modelo/ModeloRegistroConsultores.php');

 $usuario = $_POST['usuario_consultor'];
 $contrasena1_consul = $_POST['contraseña_consultor1'];
 $contrasena2_consul = $_POST['contraseña_consultor2'];
 $nombre_consul = $_POST['nombreCompleto_consultor'];
 $correo_consul = $_POST['correo_consultor'];
 $telefono_consul = $_POST['telefono_consultor'];

if ($contrasena1_consul == $contrasena2_consul) {
    RegistrarUsuario($usuario, $contrasena1_consul);
    RegistrarConsultor($usuario, $contrasena1_consul, $nombre_consul,$correo_consul,$telefono_consul);
} else {
    echo "LAS CONTRASEÑAS NO COINCIDEN";
}
?>
