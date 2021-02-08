<?php
session_start();
include dirname(__DIR__) . "/config/config.php";
//include ROOT_DIR . "/engine/Autoload.php";

require_once "../vendor/autoload.php";

use app\engine\Autoload;
use app\model\{Basket, Product, User};
use app\engine\{Render, Request};

//spl_autoload_register([new Autoload(), 'loadClass']);

try {
    $request = new Request();
    $controllerName = $request->getControllerName() ?: 'index';
    $actionName = $request->getActionName();

    $controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new Render());
//    $controller = new $controllerClass(new \app\engine\TwigRender());
        $controller->runAction($actionName);
    }
} catch (\Exception $e) {
    var_dump($e);
}


//require_once '../vendor/autoload.php';
//$loader = new \Twig\Loader\FilesystemLoader('../twigtemplates');
//
//$url = explode('/', $_SERVER['REQUEST_URI']);
//
//$controllerName = $url[1] ?: 'index';
//$actionName = $url[2];




//$product = Product::getObjectWhere('id', 5);
//$product->price = 1980;
//$product->update();







