<?php
include "../engine/Autoload.php";

use app\engine\{Autoload, Db};
use app\model\{Cart, Orders,Product, Users};

spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Product(new Db());
$user = new Users(new Db());
$cart = new Cart(new Db());
$order = new Orders(new Db());



echo $order->getOne(4) . "<br>";
echo $cart->getAll() . "<br>";
echo $user->delete(3) . "<br>";


var_dump($user);
