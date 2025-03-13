<?php

require_once "Controllers/routeC.php";
require_once "Controllers/StockC.php";
require_once "Controllers/ProveedorC.php";
require_once "Controllers/AdminC.php";

require_once "Models/routeM.php";
require_once "Models/StockM.php";
require_once "Models/ProveedorM.php";
require_once "Models/AdminM.php";


$route = new RouteController();

session_start();

if(!isset($_SESSION["ingreso"])){
	$route->login();
}else{
    $route->template();
}
?>

