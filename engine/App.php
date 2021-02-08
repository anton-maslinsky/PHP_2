<?php


namespace app\engine;

use app\model\repositories\BasketRepository;
use app\model\repositories\OrdersRepository;
use app\model\repositories\ProductRepository;
use app\model\repositories\UserRepository;
use app\traits\TSingletone;

/**
 * Class App
 * @package app\engine
 * @property Request $request
 * @property BasketRepository $basketRepository
 * @property UserRepository $userRepository
 * @property OrdersRepository $ordersRepository
 * @property ProductRepository $productRepository
 * @property Db $db
 * @property Session $session
 */

class App
{
    use TSingletone;

    public $config;
    private $components;
    private $controller;
    private $action;

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->session->sessionStart();
        $this->runController();
    }

    public function runController() {
        $this->controller = $this->request->getControllerName() ?: 'index';
        $this->action = $this->request->getActionName();
        $controllerClass = $this->config['controllers_namespaces'] . ucfirst($this->controller) . "Controller";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new Render());
            $controller->runAction($this->action);
        } else {
            echo 'Wrong controller...';
        }
    }

    public static function call() {
        return static::getInstance();
    }

    public function createComponent($name) {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];

            if(class_exists($class)) {
                unset($params['class']);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
        }
        return null;
    }

    public function __get($name) {
        return $this->components->get($name);
    }
}