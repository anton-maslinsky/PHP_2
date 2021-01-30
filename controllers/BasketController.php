<?php


namespace app\controllers;



use app\model\Basket;
use app\model\Product;

class BasketController extends Controller
{
    public function actionIndex() {
        $basket = Basket::getBasket();
        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }

    public function actionAdd($id) {

        $product = Product::save();
    }

//    public function actionShow() {
//
//        $basket = Basket::getBasket();
//        echo $this->render('basket', [
//            'basket' => $basket
//        ]);
//    }

    public function actionDelete() {

    }
}