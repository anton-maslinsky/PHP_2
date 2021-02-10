<?php


namespace app\controllers;

use app\engine\App;
use app\model\entities\Orders;

class OrdersController extends Controller
{
    public function actionIndex() {
        $isAdmin = App::call()->userRepository->isAdmin();


        echo $this->render('order', [
            'isAdmin' => $isAdmin
        ]);
    }

    public function actionGet() {
        $session_id = App::call()->request->getParams()['session_id'];
        $order = App::call()->ordersRepository->getOneOrder($session_id);
        $params = App::call()->request->getParams();
        $isAdmin = App::call()->userRepository->isAdmin();
        $totalSum = App::call()->ordersRepository->getTotalSum(App::call()->request->getParams()['session_id']);

        echo $this->render('order', [
            'isAdmin' => $isAdmin,
            'order' => $order,
            'params' => $params,
            'session_id' => $session_id,
            'totalSum' => $totalSum
        ]);

    }

    public function actionCreate() {
        $params = App::call()->request->getParams();

        $order = new Orders($params['name'], $params['phone'], $params['email'], session_id(), 'new');
        App::call()->ordersRepository->save($order);
        App::call()->session->regenerateSession();
        echo $this->render('basket', [
            'message' => "Заказ оформлен, спасибо!"
        ]);
    }

    public function actionChange() {
        $isAdmin = App::call()->userRepository->isAdmin();
        $status = App::call()->request->getParams()['status'];
        $session_id = App::call()->request->getParams()['session_id'];
        $order = App::call()->ordersRepository->getOneOrder($session_id);
        $params = App::call()->request->getParams();
        $totalSum = App::call()->ordersRepository->getTotalSum(App::call()->request->getParams()['session_id']);

        App::call()->ordersRepository->changeOrderStatus($status, $session_id);
        echo $this->render('order', [
            'isAdmin' => $isAdmin,
            'order' => $order,
            'params' => $params,
            'session_id' => $session_id,
            'totalSum' => $totalSum
        ]);

    }
}