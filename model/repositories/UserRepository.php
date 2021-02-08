<?php


namespace app\model\repositories;

use app\engine\App;
use app\model\entities\User;
use app\model\Repository;

class UserRepository extends Repository
{
    public function auth($login, $pass) {

        $user = $this->getOneWhere('login', strip_tags(stripslashes($login)));

        if (password_verify($pass, $user->pass)) {
            App::call()->session->setSession('login', $login);
//            $_SESSION['login'] = $login;
//            $_SESSION['id'] = $user->id;
            return true;
        } else {
            return false;
        }

    }

    public function isAuth() {
        return isset($_SESSION['login']);
    }

    public function isAdmin() {
        return $_SESSION['login'] == 'admin';
    }

    public function getName() {
        return $_SESSION['login'];
    }

    public function getTableName() {
        return 'users';
    }

    protected function getEntityClass() {
        return User::class;
    }

}