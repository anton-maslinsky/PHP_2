<?php


namespace app\engine;


use app\interfaces\IRenderer;

class TwigRender implements IRenderer
{

    public $twig;

    public function __construct() {
        $loader = new \Twig\Loader\FilesystemLoader('../twigtemplates');
        $this->twig = new \Twig\Environment($loader, [
            'cache' => 'cache',
            'debug' => true
        ]);
//        var_dump($this->twig);
    }


    public function renderTemplate($template, $params = []) {
        return $this->twig->render($template . '.twig', $params);
    }
}