<?php


namespace app\model;


use app\engine\Db;

class Basket extends DbModel
{
    protected $id;
    protected $product_id;
    protected $session_id;


    protected $props = [
      'product_id' => false,
      'session_id' => false
    ];

    public function __construct($session_id = null, $product_id = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
    }

    public static function getBasket($session_id) {

        $sql = "SELECT * FROM products AS p JOIN basket AS c ON p.id = c.product_id WHERE c.session_id = :session_id";
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id ]);
    }

    public static function getCount() {

    }

    public static function getTableName()
    {
        return 'basket';
    }
}