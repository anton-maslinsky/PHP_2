<?php


namespace app\controllers;


use app\model\Product;

class ProductController extends Controller
{

    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {

        $page = $_GET['page'] ?? 0;
        $catalog = Product::getAll();

        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard() {

        $id = $_GET['id'];

        $item = Product::getOne($id);

        echo $this->render('card', [
            'item' => $item
        ]);
    }

}