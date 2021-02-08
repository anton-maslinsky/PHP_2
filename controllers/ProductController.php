<?php


namespace app\controllers;

use app\engine\App;
use app\model\repositories\ProductRepository;

class ProductController extends Controller
{

    public function actionIndex() {

        echo $this->render('catalog');
    }

    public function actionCatalog() {

        $page = App::call()->request->getParams()['page'] ?? 1;
        $isAdmin = App::call()->userRepository->isAdmin();

        $catalog = App::call()->productRepository->getLimit($page * App::call()->config['product_display_qty']);

        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page,
            'isAdmin' => $isAdmin
        ]);
    }

    public function actionCard() {

        $id = App::call()->request->getParams()['id'];

        $item = App::call()->productRepository->getOne($id);

        echo $this->render('card', [
            'item' => $item
        ]);
    }

}