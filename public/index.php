<?php
include dirname(__DIR__) . "/config/config.php";
include ROOT_DIR . "/engine/Autoload.php";

use app\engine\{Autoload, Db};
use app\model\{Cart, Orders,Product, Users};

spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Product("Пицца","Описание", 125);
$product->insert();

//var_dump($product->getOne(2));
