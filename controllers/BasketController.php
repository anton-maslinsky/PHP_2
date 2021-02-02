<?php


namespace app\controllers;



use app\engine\Request;
use app\model\Basket;
use app\model\Product;

class BasketController extends Controller
{

    public function actionIndex() {
        echo $this->render('basket', [
            'basket' => Basket::getBasket(session_id())
        ]);

    }

    public function actionAdd() {

//        $data = json_decode(file_get_contents("php://input"));
//        $id = $data->id;

        $id = (new Request())->getParams()['id'];

        (new Basket(session_id(), $id))->save();
        $response = [
            'success' => 'ok',
            'count' => Basket::getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }


    public function actionDelete() {
        $data = json_decode(file_get_contents("php://input"));
        $id = $data->id;

        $basket_item = Basket::getOne($id);

        $basket_item->delete();

        $response = [
            'success' => 'ok',
            'count' => Basket::getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}