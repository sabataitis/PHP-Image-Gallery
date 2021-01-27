<?php

namespace App\Controllers;

use App\User;
use App\Helpers\Helper;
use App\Helpers\Validation;

class RegisterController
{
    protected $errors = array();

    public function index() {
        return Helper::view('register', ['errors' => $this->errors]);
    }

    public function store() {
        $username = Validation::cleanup($_POST['login']);
        $pass = Validation::cleanup($_POST['password']);
        $name = Validation::cleanup($_POST['name']);
        $lastname = Validation::cleanup($_POST['lastname']);
        $details = array('username' => $username, 'password' => $pass, 'name' => $name, 'lastname' => $lastname);

        foreach ($details as $key => $detail) {
            if (empty($detail)) {
                $this->errors[$key] = 'Empty field: '.$key;
            }
        }
        if (count($this->errors) == 0) {
            $user = new User();
            if (!$user->find('username', $username)) {
                $hashedPass = password_hash($pass, PASSWORD_BCRYPT);
                $user->createUser([
                    'username' => $username,
                    'password' => $hashedPass,
                    'name' => $name,
                    'lastname' => $lastname,
                    'registration_date' => date("Y-m-d H:i")
                ]);
                Helper::redirect('login');
            } else {
                $this->errors['username'] = 'Please choose another username';
            }
        }
        return Helper::view('register', ['errors' => $this->errors, 'oldName' => $name, 'oldLastName' => $lastname, 'oldLogin' => $username, 'oldPass' => $pass]);
    }
}
