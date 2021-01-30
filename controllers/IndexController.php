<?php


namespace app\controllers;


use app\model\Basket;
use app\model\Product;

class IndexController extends Controller
{
    public function actionIndex() {
        $catalog = Product::getAll();
        $basket = Basket::getBasket();
        echo $this->render('index', [
            'catalog' => $catalog,
            'basket' => $basket
        ]);
    }
}