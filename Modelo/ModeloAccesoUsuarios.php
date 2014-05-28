<?php

require('../Controlador/Conexion.php');

function iniciarSesion($nombre_usuario, $contrasena_usuario) {
    $conec = new Conexion();
    $con = $conec->getConection();

    $ingreso_nombre_usuario = $nombre_usuario;
    $ingreso_contrasena_usuario = $contrasena_usuario;

    if (!isset($_SESSION)) {
        session_start();
    }

    $consulta_usuario = "SELECT * FROM usuario WHERE login='$ingreso_nombre_usuario' AND passwd='$ingreso_contrasena_usuario'";
    $consulta = pg_query($con, $consulta_usuario);
    $filas = pg_fetch_array($consulta);
    if (!$filas[0]) { //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
        echo '<script language = javascript>
	alert("Usuario o Password errados, por favor verifique."
	</script>';
        header("Location: ../Vista/iu.ingresar.html");
    } else { //opcion2: Usuario logueado correctamente
        //Definimos las variables de sesión y redirigimos a la página de usuario
        $idusuario = $filas['idusuario'];
        $_SESSION['id_usuario'] = $filas['idusuario'];
        $_SESSION['nombre'] = $filas['login'];

        $consulta_rol = "SELECT rol_codrol FROM user_rol WHERE usuario_idusuario ='$idusuario'";
        $roles = pg_query($con, $consulta_rol);
        $fila = pg_fetch_array($roles);
        $rol_usuario = $fila['rol_codrol'];
        $_SESSION['rol'] = $fila['rol_codrol'];
        
        switch ($rol_usuario){
            case 1: //administrador 
                header("Location: ../Vista/iuAdminCuentas.php");
                break;
            case 2: // consultor
                header("Location: ../Vista/iu.consultor.php");
                break;
            case 3://grupo empresa
                $codigo_grupo_empresa = conseguir_codigo_ge();
                header("Location: ../Vista/iuGrupoEmpresa.php?$a=$codigo_grupo_empresa");
                break;
            case 4 ://socio 
                header("Location: ../Vista/iuGrupoEmpresa.php");
                break;
            
        }
    }
}

?>
