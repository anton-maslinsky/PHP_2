<?php


namespace app\model\entities;


use app\model\Model;

class Orders extends Model
{
    protected $id;
    protected $user_name;
    protected $phone;
    protected $email;
    protected $session_id;
    protected $status;

    protected $props = [
        'user_name' => false,
        'phone' => false,
        'email' => false,
        'session_id' => false,
        'status' => false
    ];

    public function __construct($user_name = null, $phone = null, $email = null, $session_id = null, $status = null)
    {
        $this->user_name = $user_name;
        $this->phone = $phone;
        $this->email = $email;
        $this->session_id = $session_id;
        $this->status = $status;
    }

}