<?php
use app\engine\Db;
use app\engine\Request;
use app\engine\Session;
use app\model\repositories\BasketRepository;
use app\model\repositories\ProductRepository;
use app\model\repositories\UserRepository;
use app\model\repositories\OrdersRepository;

return [
    'root_dir' =>  dirname(__DIR__),
    'templates_dir' => dirname(__DIR__) . "/views/",
    'controllers_namespaces' => 'app\\controllers\\',
    'images_dir' => '/img/',
    'product_display_qty' => 9,
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => 'root',
            'database' => 'shop',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'basketRepository' => [
            'class' => BasketRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ],
        'ordersRepository' => [
            'class' => OrdersRepository::class
        ],
        'session' => [
            'class' => Session::class
        ]
    ]
];


//define('ROOT_DIR', dirname(__DIR__));
//define('DS', DIRECTORY_SEPARATOR);
//define('CONTROLLERS_NAMESPACE', "app\\controllers\\");
//define('TEMPLATES_DIR', dirname(__DIR__) . "/views/");
//define('IMAGES_DIR', "/img/");
//define('PRODUCT_DISPLAY_QTY', 9);
//define('TWIG_TEMPLATES_DIR', dirname(__DIR__) . "/twigtemplates/");