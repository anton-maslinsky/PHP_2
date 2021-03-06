<?php


namespace app\model\entities;


use app\model\Model;

class Orders extends Model
{
    protected $id;
    protected $user_name;
    protected $phone;
    protected $session_id;
    protected $status;

    protected $props = [
        'user_name' => false,
        'phone' => false,
        'session_id' => false,
        'status' => false
    ];

    public function __construct($user_name = null, $phone = null, $session_id = null, $status = null)
    {
        $this->user_name = $user_name;
        $this->phone = $phone;
        $this->session_id = $session_id;
        $this->status = $status;
    }

}