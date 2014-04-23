<?php
// Requiring the model
require_once('../Modelo/ModeloListaTemasForo.php');
 
// Retrieving the list of posts
$lista =  listaForo();
 
// Requiring the view
require('../Vista/VistaListaTemasForo.php');
?>