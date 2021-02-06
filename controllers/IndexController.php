<?php


namespace app\controllers;


use app\model\Basket;
use app\model\Product;
use app\model\repositories\BasketRepository;
use app\model\repositories\ProductRepository;

class IndexController extends Controller
{
    public function actionIndex() {
        $catalog = (new ProductRepository())->getLimit(8);
        $basket = (new BasketRepository())->getBasket(session_id());
        echo $this->render('index', [
            'catalog' => $catalog,
            'basket' => $basket
        ]);
    }
}