<?php
include dirname(__DIR__) . "/config/config.php";
include ROOT_DIR . "/engine/Autoload.php";

use app\engine\Autoload;
use app\model\{Product, Users};

spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'index';
$actionName = $_GET['a'];

$controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
}

//$user = new Users('Anton', 99991);
//$user->save();
//var_dump($user);
//$user->update('1','2');
//$user->delete();
$user = Users::getOne(8);
$products = Product::getWhere('id', 5);

//$user->update('login', 'Max');
//var_dump(get_class_methods($user));
//$user->update();





