<?php  
    require '../Modelo/ModeloGrupoEmpresa.php';
    
    function mostrarListaEmp(){
        global $listaDocentes;
        $listaEmpresas = mostrarListaEmpresas();
        require_once '../Vista/iu.listaEmpresas.html';
    }
    function mostrarDatosEmp($codGE){
        $nombreRepLegal = mostrarDatosEmpresa($codGE);
        echo $nombreRepLegal;
    }
    function mostrarEmpresa(){
        global $listaDocentes;
        $listaEmpresas = mostrarEmpresas();
        require_once '../Vista/ListaEmpresas.html';
    }
?>
