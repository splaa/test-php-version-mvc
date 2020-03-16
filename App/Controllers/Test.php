<?php


namespace App\Controllers;


use App\Controller;

class Test extends Controller
{


    protected function handle()
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {

            $this->rules($_POST['email'], $_POST['password']);

        }
        echo $this->view->render(__DIR__ . '/../../templates/test.php');
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
