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

        $sql = "SELECT DISTINCT user_name, phone, email, session_id, status FROM orders";
        return App::call()->db->queryAll($sql);
    }

    public function getOneOrder($session_id) {
        $sql = "SELECT * FROM products AS p JOIN basket AS b ON p.id = b.product_id WHERE b.session_id = :session_id";
        return App::call()->db->queryAll($sql, ['session_id' => $session_id]);
    }

    public function changeOrderStatus($status, $session_id) {
        $sql = "UPDATE orders SET status = :status WHERE session_id = :session_id";
        return App::call()->db->execute($sql, ['status' => $status, 'session_id' => $session_id]);
    }

    public function getTotalSum($session_id) {
        $sql = "SELECT SUM(b.qty * p.price) as total FROM basket AS b JOIN products AS p ON b.product_id = p.id WHERE b.session_id = :session_id";
        return App::call()->db->queryOneColumn($sql, ['session_id' => $session_id]);

    }

}