<?php

namespace App\Services;

class AuthService
{
    public static function verify(array $details){
        $id = $roleId = $login = $password = null;
        list($user, $login, $pass)= $details;
        foreach($user as $details){
            $id = $details->id;
            $roleId = $details->role_id;
            $login = $details->username;
            $password = $details->password;
        }
        if(password_verify($pass, $password)){
            $_SESSION['is_active'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['role_id'] = $roleId;
            $_SESSION['login'] = $login;
           return true;
        }
        return false;
    }

}