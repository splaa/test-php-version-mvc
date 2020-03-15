<?php


namespace App\Controllers;


use App\Controller;

class Login extends Controller
{

    protected function handle()
    {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {

            $this->rules($_POST['password']);

        }

        echo $this->view->render(__DIR__ . '/../../templates/login/login.php');
    }

    private function rules($password)
    {


        if (strlen($password) < 3) {

            throw new \Exception('Пароль слишком короткий ');
        }
        if ($password === 'admin') {
            throw new \Exception('Пароль какойто нетакой ');
        }

    }
}
