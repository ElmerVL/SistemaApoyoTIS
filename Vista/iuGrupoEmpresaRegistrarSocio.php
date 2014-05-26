<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Grupo-Empresa</title>
        <link href="css/grupo_empresa_registrar_socio.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="imagenes/favicon.ico" />
    </head>

    <body id="body">
        <div id="principal_grupo_empresa">
            <header id="cabecera_grupo_empresa"><img src="imagenes/encabezado_logo.jpg" width="50%" height="200" alt="cabecera1" /><img src="imagenes/encabezado2.jpg" width="50%" height="200" alt="cabecera2" /></header>
            <article id="contenido_usuarios">
                <?php
                $a;
                $a = $_GET['a'];

                echo "<nav id='menu_grupo_empresa'>
                            <a href='iu.propuestaDePago.php?a=$a'><img width='100%' height='48' src='imagenes/btn_planDePagos.jpg'/></a>
                            <a href='../Vista/iuDiaReunionGE.php?a=$a'><img src='imagenes/btn_diaDeReunion.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Vista/iuCalendarioGrupoEmpresa.php?a=$a'><img src='imagenes/btn_calendario.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Vista/iuGrupoEmpresaRegistrarSocio.php?a=$a'><img src='imagenes/btn_registrarSocio.jpg' width='100%' height='46' alt='btn_1' /></a>
                            <a href='../Vista/iuGrupoEmpresa.php?a=$a'><img src='imagenes/btn_volverMiPagina.jpg' width='100%' height='46' alt='btn_1' /></a>  
                      </nav>"
                ?>
                <div id="noticias_grupoEmpresa">
                    <section id="registrar">
                    <fieldset >
                        <legend>Registrar Socio</legend>
                        <form action="../Controlador/ControladorRegistrarSocio.php" method="post"> 
                            <table id="tabla_formulario_registro">
                                <tr>
                                    <td align="right" id="nombre">Nombre:</td>
                                    <td ><input title="Se necesita un nombre" type="text" name="nombre" id="nombre_registro" placeholder="nombre" pattern="[a-zA-Zñáéíóú]{9}+[ a-zA-Zñáéíóú]{9}" autocomplete="" required /></td>
                                </tr>
                                <tr>
                                    <td align="right" id="apellido">Apellidos:</td>
                                    <td ><input title="Se necesita un apellido" type="text" name="apellido" id="apellido" placeholder="apellidos" pattern="[a-zA-Z]+"  required /></td>
                                </tr>
                                <tr>
                                    <td align="right" id="estado_civil">Estado civil: </td>
                                    <td> 
                                                     
                                                     <select name="combo_estado_civil" id="combo_estado_civil" width="15 px">
                                                     <option value="soltero">Soltero(a)</option>
                                                     <option value="casado">Casado(a)      </option>
                                                     <option value="divorciado">Divorsiado(a)              </option>
                                                     <option value="viudo">Viudo(a)</option>
                                                     </select>
                                                
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" id="direccion">Dirección:</td>
                                    <td ><input title="Se necesita una dirección" type="text" name="direccion" id="direccion" onclick="alert('esto es una alerta')" placeholder="dirección" pattern="[a-zA-Z0-9]+"  required /></td>
                                </tr>  
                                <tr>
                                    <td align="right" id="profesion">Profesión:</td>
                                    <td ><input title="Se necesita una profesión" type="text" name="profesion" id="profesion" placeholder="profesión" pattern="[a-zA-Z]+"  required /></td>
                                </tr>
                                <tr>
                                    <td align="right" id="correo">Correo electrónico:</td>
                                    <td ><input title="Se necesita una direccón de correo electrónico" type="email" name="correo" id="correo" placeholder="correo electrónico"  required /></td>
                                </tr>
                                <tr>
                                    <td align="right" id="clave">Contraseña: </td>
                                    <td><input title="Se necesita una contraseña" type="password" name="clave" id="clave" placeholder="contraseña"  required /></td>
                                </tr>
                                <tr>
                                    <td align="right" id="clave1">Repita contraseña: </td>
                                    <td><input title="Repita su contraseña" type="password" name="clave1" id="clave1" placeholder="repita su contraseña"  required /></td>
                               </tr>
                                <tr>
                                    <td height="23"></td>
                                    <td align="right"><input type="submit" name="registrar" value="Registrar" /></td>
                                </tr>
                            </table>
                        </form>
                      </fieldset>
                    </section>
                </div>   
            </article>
            <footer id="pie_grupo_empresa"><p>  Sistema Apoyo T.I.S. <br> Derechos Reservados Camaleon Software </p></footer>
        </div>
    </body>
</html>
