<?php
// Router utama MVC

// baca controller & action dari URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'lecturer';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// panggil file controller yang sesuai
require_once "app/controllers/" . ucfirst($controller) . "Controller.php";

// buat instance controller & jalankan action
$controllerName = ucfirst($controller) . "Controller";
$controllerObject = new $controllerName();
$controllerObject->$action();
?>
