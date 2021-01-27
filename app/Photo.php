<?php

namespace App;
use Core\App;

class Photo
{
    protected $queryBuilder;
    public function __construct(){
        $this->queryBuilder = App::get('database');
    }
    public function find($id){
       return $this->queryBuilder->select("*", "photos")->where('id', $id)->get();
    }
    public function all() {
        return $this->queryBuilder
            ->select("photos.id, photos.file_name, users.id as 'user_id', users.username", "photos, users")
            ->where('users.id','photos.user_id')->get();
    }
    public function sortedByCategory($categoryId){
        return $this->queryBuilder
            ->select("photos.id, photos.file_name, users.id as 'user_id', users.username", "photos, users")
            ->where('users.id','photos.user_id')->andWhere('photos.category_id', $categoryId)->get();
    }
}
