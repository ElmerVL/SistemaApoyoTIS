<?php
require ('../Modelo/ModeloFormularioForoConsultor.php');
    function mostrarNombreDelConsultor($a,$u){
        $nombreConsultor =  retornarNombreDelConsultor($a, $u);
        return $nombreConsultor;
    }
    if (isset($_REQUEST['1'])){
        $codC = $_GET['a'];
        $codUsuarioC = $_GET['u'];
        $temaC = $_POST['temaC'];
        $comentarioC = $_POST['comentarioC'];
        $nombreConsultor = retornarNombreDelConsultor($codC,$codUsuarioC);
        $candComentarios=0;
        insertarTemaConversacionForo($nombreConsultor,$temaC,$comentarioC,$candComentarios);
        header("Location: ../Vista/iu.foroConsultor.php?candtidad=$candComentarios&a=$codC&u=$codUsuarioC");
    }
?>
