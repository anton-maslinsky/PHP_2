<?php


namespace app\controllers;



use app\engine\App;
use app\engine\Request;
use app\model\entities\Basket;
use app\model\repositories\BasketRepository;


class BasketController extends Controller
{

    public function actionIndex() {
        $isAdmin = App::call()->userRepository->isAdmin();

        echo $this->render('basket', [
            'basket' => App::call()->basketRepository->getBasket(session_id()),
            'isAdmin' => $isAdmin
        ]);

    }

    public function actionAdd() {

        $id = App::call()->request->getParams()['id'];
        $basket_item_id = App::call()->basketRepository->getIdWhere(session_id(), $id)['id'];

        if ($basket_item_id){
            App::call()->basketRepository->increment(4);
        } else {
            $basket = new Basket(session_id(), $id, 1);
            App::call()->basketRepository->save($basket);
        }

        $response = [
            'success' => 'ok',
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

    public function actionDelete() {
        $error = "OK";
        $id = App::call()->request->getParams()['id'];
        $basket_item = App::call()->basketRepository->getOne($id);

        if ($basket_item->session_id == session_id()) {
            App::call()->basketRepository->delete($basket_item);
        } else {
            $error = "Нет прав на удаление!";
        }

        $response = [
            'success' => 'ok',
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

    public function actionIncrement() {
        $id = App::call()->request->getParams()['id'];

        App::call()->basketRepository->increment($id);

        $price = App::call()->basketRepository->getPrice($id);
        $qty = App::call()->basketRepository->getQty('id', $id);

        $response = [
            'success' => 'ok',
            'qty' => $qty,
            'subtotal' => $price * $qty
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function actionDecrement() {
        $id = App::call()->request->getParams()['id'];
        $price = App::call()->basketRepository->getPrice($id);


        if (App::call()->basketRepository->getQty('id', $id) > 1) {
            App::call()->basketRepository->decrement($id);
        } else {
            $basket_item = App::call()->basketRepository->getOne($id);

            if ($basket_item->session_id == session_id()) {
                App::call()->basketRepository->delete($basket_item);
            } else {
                $error = "Нет прав на удаление!";
            }

            $response = [
                'success' => 'ok',
                'qty' => 0,
                'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
            ];

            echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            die();
        }

        $qty = App::call()->basketRepository->getQty('id', $id);

        $response = [
            'success' => 'ok',
            'qty' => $qty,
            'subtotal' => $price * $qty
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }


}