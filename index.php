<?php
require_once 'models/Database.php';
require_once 'controllers/property.controller.php';

// Papa que inicie con el controlador de Property
$controller = 'property';

// Todo esta lógica hará el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "controllers/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index(); 
}
else
{
    // Obtenemos el controlador y la acción que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controllers/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}