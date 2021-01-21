<?php


namespace app\model;


class Orders extends Model
{
    public $id;
    public $user_name;
    public $phone;
    public $session_id;
    public $status;

    public function __construct($user_name = null, $phone = null, $session_id = null, $status = null)
    {
        $this->user_name = $user_name;
        $this->phone = $phone;
        $this->session_id = $session_id;
        $this->status = $status;
    }


    public function getTableName()
    {
        return 'orders';
    }
}