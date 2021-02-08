<?php


namespace app\controllers;


use app\engine\App;
use app\engine\Render;
use app\interfaces\IRenderer;
use app\model\repositories\BasketRepository;
use app\model\repositories\UserRepository;


class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $defaultLayout = 'main';
    private $useLayout = true;
    private $renderer;

    public function __construct(IRenderer $renderer) {
        $this->renderer = $renderer;
    }

    public function runAction($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        }
    }

    public function render($template, $params = []) {
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->defaultLayout}", [
                'header' => $this->renderTemplate('header', [
                    'auth' => (new UserRepository())->isAuth(),
                    'isAdmin' => (new UserRepository())->isAdmin(),
                    'username' => (new UserRepository())->getName(),
                    'basket'=> (new BasketRepository())->getBasket(session_id()),
                    'cartCount' => (new BasketRepository())->getCountWhere('session_id', session_id())
                ]),
                'menu' => $this->renderTemplate('menu', $params),
                'content' => $this->renderTemplate($template, $params),
                'footer' => $this->renderTemplate('footer', $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        return $this->renderer->renderTemplate($template, $params);
    }

}