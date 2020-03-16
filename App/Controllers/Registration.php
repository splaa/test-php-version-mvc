<?php


namespace App\Controllers;


use App\Controller;

class Registration extends Controller
{

    protected function handle()
    {

        return $this->view->render(__DIR__ . '/../../templates/reg.php');
    }

    private function rules($email, $password)
    {


        if (strlen($password) < 3) {

            throw new \Exception('Пароль слишком короткий ');
        }
        if ($password === 'test') {
            throw new \Exception('Пароль какойто нетакой ');
        }

    }
}
