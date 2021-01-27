<?php

namespace App;
use Core\App;

class Category
{
    protected $queryBuilder;
    public function __construct(){
        $this->queryBuilder = App::get('database');
    }
    public function all() {
        return $this->queryBuilder
            ->select("*", "categories")->get();
    }
    public function find($column, $value){
        return $this->queryBuilder->select("*", "categories")->where($column, $value)->get();
    }
}
