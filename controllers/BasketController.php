<?php


namespace app\controllers;



use app\model\Basket;

class BasketController extends Controller
{
    public function actionIndex() {
        echo $this->render('basket');
    }

    public function actionAdd() {

    }

    public function actionShow() {

        $basket = Basket::getBasket();
        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }

    public function actionDelete() {

    }
}