<?php

namespace App\Controllers;

use App\Helpers\Validation;
use App\User;
use App\Category;
use App\Helpers\Helper;
use Core\App;

class UserController
{
    protected $photos;
    protected $userId;
    protected $username;
    protected $role;
    protected $queryBuilder;
    protected $is_admin = false;
    protected $errors = array();

    public function __construct() {
        if(count($_SESSION) !== 0){
            $this->userId = $_SESSION['id'];
            $this->username = $_SESSION['login'];
        }
        $this->queryBuilder = App::get('database');
    }

    public function profile() {
        if (count($_SESSION) == 0) {
            Helper::redirect('');
        }
        $user = new User();
        $this->role = $user->role($this->userId);
        if ($this->role == 2) {
            $this->is_admin = true;
        }
        $this->photos = $user->photos($this->userId);
        Helper::view('profile/profile', ['username' => $this->username, 'photos' => $this->photos, 'is_admin' => $this->is_admin]);
    }
    public function show(){
       if(isset($_GET['id'])){
           $user = new User();
           $id = $_GET['id'];
           if($user->find('id', $id)){
               $username = $user->username($id);
               $userPhotos = $user->photos($id);
               $userDesc = $user->description($id);
               return Helper::view('user/user', ['username'=>$username, 'id'=>$id, 'desc'=>$userDesc, 'photos'=>$userPhotos]);
           }
           else{
               Helper::view('404');
           }
       }
    }
}
