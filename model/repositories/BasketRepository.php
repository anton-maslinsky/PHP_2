<?php

namespace app\model\repositories;

use app\engine\App;
use app\model\entities\Basket;
use app\model\Repository;

class BasketRepository extends Repository
{
    public function getTableName()
    {
        return 'basket';
    }

    protected function getEntityClass() {
        return Basket::class;
    }


    public function getBasket($session_id) {

        $sql = "SELECT * FROM products AS p JOIN basket AS c ON p.id = c.product_id WHERE c.session_id = :session_id";
        return App::call()->db->queryAll($sql, ['session_id' => $session_id ]);
    }

    public function getIdWhere($session_id, $product_id) {
        $tableName = $this->getTableName();
        $sql = "SELECT `id` FROM {$tableName}  WHERE `session_id` = :session_id AND `product_id` = :product_id" ;
        return App::call()->db->queryOneColumn($sql, ['session_id' => $session_id, 'product_id' => $product_id]);
    }

    public function getPrice($id) {

        $sql = "SELECT `price` FROM products AS p JOIN basket AS b ON p.id = b.product_id WHERE b.id = :id";
        return App::call()->db->queryOneColumn($sql, ['id' => $id]);
    }
}