<?php


namespace app\model;


class Orders extends Model
{
    public $id;
    public $user_name;
    public $phone;
    public $session_id;
    public $status;

    public function getTableName()
    {
        return 'orders';
    }
}