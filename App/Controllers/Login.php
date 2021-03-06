<?php


namespace App\Controllers;


use App\Controller;

class Login extends Controller
{


    protected function handle()
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {

            if ($this->rules($_POST['email'], $_POST['password'])) {

                $user = new \App\Models\User();
                return $user->isMailExists($_POST['email']) ? $user->getUserByEmail($_POST['email'])->name : 'Guest';

            }


        }
        echo $this->view->render(__DIR__ . '/../../templates/login.php');
    }

    private function rules($email, $password)
    {


        if (strlen($password) < 3) {

            throw new \Exception('Пароль слишком короткий ');
        }
        if ($password === 'test') {
            throw new \Exception('Пароль какойто нетакой ');
        }
//todo: Реализовать проверку
        return true;

    }
}
