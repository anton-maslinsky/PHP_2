<?php


namespace app\controllers;


use app\model\Product;

class ProductController extends Controller
{

    public function actionIndex() {
        echo $this->render('catalog');
    }

    public function actionCatalog() {

        $page = $_GET['page'] ?? 1;
        $catalog = Product::getLimit($page * PRODUCT_DISPLAY_QTY);

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