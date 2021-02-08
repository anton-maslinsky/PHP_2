<?php


namespace app\controllers;


use app\engine\App;
use app\model\Basket;
use app\model\Product;
use app\model\repositories\BasketRepository;
use app\model\repositories\ProductRepository;

class IndexController extends Controller
{
    public function actionIndex() {
        $catalog = App::call()->productRepository->getLimit(8);
        $basket = App::call()->basketRepository->getBasket(session_id());
        $isAdmin = App::call()->userRepository->isAdmin();

        echo $this->render('index', [
            'catalog' => $catalog,
            'basket' => $basket,
            'isAdmin' => $isAdmin
        ]);
    }
}