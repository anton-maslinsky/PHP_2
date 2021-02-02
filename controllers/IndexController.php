<?php


namespace app\controllers;


use app\model\Basket;
use app\model\Product;

class IndexController extends Controller
{
    public function actionIndex() {
        $catalog = Product::getLimit(8);
        $basket = Basket::getBasket(session_id());
        echo $this->render('index', [
            'catalog' => $catalog,
            'basket' => $basket
        ]);
    }
}