<?php


namespace app\controllers;


use app\engine\App;

class CheckoutController extends Controller
{
    public function actionIndex() {
        $isAdmin = App::call()->userRepository->isAdmin();

        echo $this->render('checkout', ['isAdmin' => $isAdmin]);

    }
}