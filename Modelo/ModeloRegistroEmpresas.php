<?php

require('../Controlador/Conexion.php');

function RegistrarUsuario($usuario, $contrasena1) {
    $conec = new Conexion();
    $con = $conec->getConection();

    $nombre_usuario_ge = $usuario;
    $contrasena_usuario_ge = $contrasena1;

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
    $sql_rol = "INSERT INTO user_rol(usuario_idusuario,rol_codrol)";
    $sql_rol.="VALUES($idusuario,3)";
    pg_query($con,$sql_rol) or die("ERROR :(".pg_last_error());
    $sql = "INSERT INTO Grupo_Empresa (usuario_idusuario,nombrelargoge,nombrecortoge,correoge,direccionge,telefonoge)";
    $sql.= "VALUES ($idusuario,'$nombre_largo_ge','$nombre_corto_ge','$corrreo_ge','$direccion_ge','$telefono_ge')";
    pg_query($con, $sql) or die("ERROR :( " . pg_last_error());

    crear_calendario($idusuario);
//mensaje de registro exitoso
    // mensaje de error en caso de usuario duplicado o en caso de nombre de grupo empresa duplicado
     header("Location: ../Vista/iu.ingresar.html");
     
}
function crear_calendario($idusuario) {
    //creacion del calendario respectivo de la grupoempresa
    
    $conec = new Conexion();
    $con = $conec->getConection();
    
    $sql_cod = "select codgrupo_empresa from grupo_empresa where usuario_idusuario = $idusuario;";
    $filas = pg_query($con, $sql_cod);
    $cod_ge = pg_fetch_object($filas);
    $cod_grupoempresa = $cod_ge->codgrupo_empresa;
    
    $sql = "INSERT INTO calendario(grupo_empresa_codgrupo_empresa, grupo_empresa_usuario_idusuario, dia_reunion_fijado)";
    $sql.= "VALUES ($cod_grupoempresa,$idusuario,FALSE)";
    pg_query($con,$sql) or die("ERROR :(".pg_last_error());
}

?>

