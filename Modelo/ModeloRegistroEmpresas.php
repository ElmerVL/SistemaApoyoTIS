<?php

require('../Controlador/Conexion.php');

function RegistrarUsuario($usuario, $contrasena1) {
    $conec = new Conexion();
    $con = $conec->getConection();

    $nombre_usuario_ge = $usuario;
    $contrasena_usuario_ge = $contrasena1;

    //Registrando datos de cuenta Grupo-Empresa

    $sql = "INSERT INTO Usuario (login,passwd)";
    $sql.= "VALUES ('$nombre_usuario_ge','$contrasena_usuario_ge')";
    pg_query($con, $sql) or die("ERROR :( " . pg_last_error());
}

function RegistrarGrupoEmpresa($usuario, $contrasena1, $nombre_largo, $nombre_corto, $correo, $direccion, $telefono) {

    $conec = new Conexion();
    $con = $conec->getConection();

    $nom_usuario = $usuario;
    $contrasena_usr = $contrasena1;
    $nombre_largo_ge = $nombre_largo;
    $nombre_corto_ge = $nombre_corto;
    $corrreo_ge = $correo;
    $direccion_ge = $direccion;
    $telefono_ge = $telefono;

    $sql_id = "SELECT idusuario FROM Usuario WHERE login='$usuario'";
    $filas = pg_query($con, $sql_id);
    $idusr = pg_fetch_object($filas);
    $idusuario = $idusr->idusuario;
    $sql = "INSERT INTO Grupo_Empresa (usuario_idusuario,nombrelargoge,nombrecortoge,correoge,direccionge,telefonoge)";
    $sql.= "VALUES ($idusuario,'$nombre_largo_ge','$nombre_corto_ge','$corrreo_ge','$direccion_ge','$telefono_ge')";
    pg_query($con, $sql) or die("ERROR :( " . pg_last_error());
    //mensaje de registro exitoso
    // mensaje de error en caso de usuario duplicado o en caso de nombre de grupo empresa duplicado
     header("Location: ../Vista/iu.ingresar.html");
     
}


?>

