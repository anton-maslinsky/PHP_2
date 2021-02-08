<?php


namespace app\model\repositories;


use app\engine\App;
use app\model\entities\Orders;
use app\model\Repository;

class OrdersRepository extends Repository
{

    public function getTableName()
    {
        return 'orders';
    }

    protected function getEntityClass() {
        return Orders::class;
    }

    public function getAllOrders() {

        $sql = "SELECT * FROM orders";
        return App::call()->db->queryAll($sql);
    }

    public function getOneOrder() {
        $session_id = App::call()->request->getParams()['session_id'];
        $sql = "SELECT * FROM products AS p JOIN basket AS c ON p.id = c.product_id WHERE c.session_id = :session_id";
        return App::call()->db->queryAll($sql, ['session_id' => $session_id ]);
    }
}