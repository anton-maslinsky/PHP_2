<?php

namespace app\model;

use app\engine\Request;

class User extends DbModel
{
    protected $id;
    protected $login;
    protected $pass;
    protected $hash;

    protected $props = [
        'login' => false,
        'pass' => false,
        'hash' => false
    ];


    public function __construct($login = null, $pass = null, $hash = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
    }

    public static function auth($login, $pass) {
        $request = new Request();
        $pass = $request->getParams()['pass'];
        $user = User::getOneWhere('login', strip_tags(stripslashes($login)));

        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            return true;
        } else {
            return false;
        }

    }

    public static function isAuth() {
        return isset($_SESSION['login']);
    }

    public static function getName() {
        return $_SESSION['login'];
    }


    public static function getTableName() {
        return 'users';
    }


}