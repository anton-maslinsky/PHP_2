<?php


namespace app\controllers;


use app\engine\App;

class AdminController extends Controller
{
    public function actionIndex() {
        $isAdmin = App::call()->userRepository->isAdmin();

        if (App::call()->userRepository->isAdmin()) {
            echo $this->render('admin', [
                'orders' => App::call()->ordersRepository->getAllOrders(),
                'isAdmin' => $isAdmin
            ]);
        } else {
            echo "Доступ запрещён";
        }
    }

}