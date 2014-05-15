<?php  
    require '../Modelo/ModeloGrupoEmpresa.php';
    
    function mostrarListaEmp(){
        $listaEmpresas = mostrarListaEmpresas();
        require_once '../Vista/iu.listaEmpresas.html';
    }
    function mostrarDatosEmp($codGE){
        $nombreRepLegal = mostrarDatosEmpresa($codGE);
        echo $nombreRepLegal;
    }
    function mostrarEmpresa(){
        $listaEmpresas = mostrarEmpresas();
        require_once '../Vista/ListaEmpresas.html';
    }
?>
