<?php

namespace app\model\repositories;

use app\engine\Db;
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
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id ]);
    }
}