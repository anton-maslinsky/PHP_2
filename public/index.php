<?php
include dirname(__DIR__) . "/config/config.php";
include ROOT_DIR . "/engine/Autoload.php";

use app\engine\Autoload;
use app\model\{Product, Users};
use app\engine\Render;

spl_autoload_register([new Autoload(), 'loadClass']);
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../twigtemplates');

$url = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = $url[1] ?: 'index';
$actionName = $url[2];

$controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
//    $controller = new $controllerClass(new Render());
    $controller = new $controllerClass(new \app\engine\TwigRender());
    $controller->runAction($actionName);
}



//$product = Product::getObjectWhere('id', 5);
//$product->price = 1980;
//$product->update();







