<?php

namespace App\Controllers;

use App\Services\AuthService;
use App\Helpers\Validation;
use App\Helpers\Helper;
use App\User;

class LoginController
{
    protected $errors = array();
    protected $old_login = null;
    protected $old_pass = null;

    public function index() {
        return Helper::view('login', ['errors' => $this->errors]);
    }

    public function login() {
        $user = new User();
        $login = Validation::cleanup($_POST['login']);
        $pass = Validation::cleanup($_POST['password']);

        if (empty($login)) {
            $this->errors['login'] = 'Field can not be empty';
        }
        if (empty($pass)) {
            $this->errors['password'] = 'Field can not be empty';
        }
        if (count($this->errors) == 0) {
            if ($user->find('username', $login)) {
                if (AuthService::verify(array($user->find('username', $login), $login, $pass))) {
                    return Helper::redirect('', ['message' => "You are logged in"]);
                }
                $this->errors['login'] = "Incorrect credentials";
            }
            $this->errors['login'] = "Incorrect credentials";
        }
            $this->old_login = $login;
            $this->old_pass = $pass;
            return Helper::view('login', ['errors' => $this->errors, 'old_login' => $this->old_login, 'old_pass' => $this->old_pass]);
    }
    public function logout(){
        session_start();
        session_destroy();

        Helper::redirect('');
    }
}
