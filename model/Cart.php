<?php


namespace app\model;


class Cart extends Model
{
    public $id;
    public $product_id;
    public $session_id;
    public $qty;

    public function __construct($product_id = null, $session_id = null, $qty = null)
    {
        $this->product_id = $product_id;
        $this->session_id = $session_id;
        $this->qty = $qty;
    }


    public function getTableName()
    {
        return 'cart';
    }
}