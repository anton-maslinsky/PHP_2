<?php


namespace app\model\entities;


use app\engine\Db;
use app\model\Model;

class Basket extends Model
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

}