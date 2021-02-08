<?php


namespace app\controllers;

use app\engine\App;

class OrdersController extends Controller
{
    public function actionGet() {
        App::call()->ordersRepository->getOneOrder();

        $response = [
            'order' => App::call()->ordersRepository->getOneOrder()
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}