<?php


namespace app\model;


class Cart extends Model
{
    public $id;
    public $product_id;
    public $session_id;
    public $qty;

    public function getTableName()
    {
        return 'cart';
    }
}