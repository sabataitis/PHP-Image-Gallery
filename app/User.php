<?php

namespace App;

use Core\App;
use App\Helpers\Helper;
use App\Helpers\Validation;

class User
{
    protected $queryBuilder;

    public function __construct() {
        $this->queryBuilder = App::get('database');
    }
    public function photos($userId){
        return $this->queryBuilder->select('*', 'photos')->where('user_id', $userId)->get();
    }
    public function role($userId){
        return $this->queryBuilder->select('role_id', 'users')->where('id', $userId)->get();
    }
    public function description($userId){
        return $this->queryBuilder->select('description', 'users')->where('id', $userId)->get();
    }
    public function username($userId){
        return $this->queryBuilder->select('username', 'users')->where('id', $userId)->get();
    }
    public function find($column, $value) {
        if(is_string($value)){
            $value = "'{$value}'";
        }
        $find= $this->queryBuilder->select("*", "users")->where($column,$value)->get();
        if(count($find)>0){
            return $find;
        }
        return false;
    }
    public function createUser(array $details) {
        return $this->queryBuilder->insert($details, 'users');
    }
    public function updateUser($field, $field_value, $identifier, $identifier_value){
        return $this->queryBuilder->update('users',$field, $field_value,$identifier, $identifier_value);
    }
}

?>