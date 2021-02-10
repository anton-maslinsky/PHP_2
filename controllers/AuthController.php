<?php


namespace app\controllers;


use app\engine\App;

use app\model\repositories\UserRepository;

class AuthController extends Controller
{

    public function actionLogin() {

        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];

        if (App::call()->userRepository->auth($login, $pass)) {
            if (App::call()->userRepository->isAdmin()) {
                header("Location: /admin/");
            } else {
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }

        } else {
            die("Wrong login or password...");
        }
    }

    public function actionLogout() {
        App::call()->session->destroySession();
        header("Location: /");
    }

    public function actionReg() {


        echo $this->render('registration', []);

    }
}