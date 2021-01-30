<?php


namespace app\controllers;


class CheckoutController extends Controller
{
    public function actionIndex() {
        echo $this->render('checkout');
    }
}