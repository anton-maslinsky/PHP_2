<?php


namespace app\model;


use app\engine\Db;

class Basket extends DbModel
{
    protected $id;
    protected $product_id;
    protected $session_id;
    protected $qty;

    protected $props = [
      'product_id' => false,
      'session_id' => false,
      'qty' => false
    ];

    public function __construct($product_id = null, $session_id = null, $qty = null)
    {
        $this->product_id = $product_id;
        $this->session_id = $session_id;
        $this->qty = $qty;
    }

    public static function getBasket() {
        $session_id = 1; // временное значение для проверки
        $sql = "SELECT * FROM products AS p JOIN basket AS c ON p.id = c.product_id WHERE c.session_id = :session_id";
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

    public static function getTableName()
    {
        return 'basket';
    }
}