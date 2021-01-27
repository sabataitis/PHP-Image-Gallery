<?php

namespace App\Controllers;

use App\Category;
use App\Helpers\Helper;
use App\Photo;

class HomeController
{
    public function index() {
        $photo = new Photo();
        $category = new Category();
        $categories = $category->all();
        $pictures = $photo->all();

        if (isset($_GET['cid'])) {
            if(count($category->find('id', $_GET['cid']))>0){
                $pictures= $photo->sortedByCategory($_GET['cid']);
            }
        }
        return Helper::view('home', ['pictures' => $pictures, 'categories' => $categories]);
    }
}
