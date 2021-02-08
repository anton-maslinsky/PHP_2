<?php


namespace app\model\repositories;


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

}