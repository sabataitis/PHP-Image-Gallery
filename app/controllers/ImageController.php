<?php

namespace App\Controllers;

use App\Category;
use App\Helpers\Helper;
use App\Services\ImageService;
use Core\App;
use App\Helpers\Validation;
use App\Photo;

class ImageController
{
    protected $errors = array();
    protected $categories;
    protected $queryBuilder;

    public function __construct() {
        if (count($_SESSION) == 0) {
            Helper::redirect('');
        }
        $this->categories = new Category();
        $this->queryBuilder = App::get('database');
    }

    public function show() {
        $photo = new Photo();
        if (isset($_GET['id'])) {
            if (count($photo->find($_GET['id'])) > 0) {
                return Helper::view('images/image', ['photo' => $photo->find($_GET['id'])[0]]);
            }
        }
        return Helper::view('404');
    }

    public function newImage() {
        $categories = $this->categories->all();
        Helper::view('profile/profile-new_image', ['errors' => $this->errors, 'categories' => $categories]);
    }

    public function storeImage() {
        $categories = $this->categories->all();

        if (!empty($_POST['categories']) && $_FILES['picture']['name'] !== "") {
            $categoryId = Validation::cleanup($_POST['categories']);
            $filename = $_FILES['picture']['name'];
            if (count($this->categories->find('id', $categoryId)) > 0) {
                if (!ImageService::exists($filename)) {
                    if (move_uploaded_file($_FILES['picture']["tmp_name"], App::get('document_root') . '/public/images/' . $filename)) {
                        $this->queryBuilder->insert(['category_id' => $categoryId, 'user_id' => $_SESSION['id'], 'file_name' => $filename], 'photos');
                        Helper::redirect('profile');
                    } else {
                        $this->errors['picture'] = "Please try again";
                    }
                } else {
                    $this->errors['picture'] = "Duplicate photo";
                }
            } else {
                $this->errors['category'] = "Category not found";
            }
        }
        if (empty($_POST['categories'])) {
            $this->errors['category'] = "Category is not selected";
        }
        if ($_FILES['picture']['name'] == "") {
            $this->errors['picture'] = "File is not selected";
        }
        return Helper::view('profile/profile-new_image', ['categories' => $categories, 'errors' => $this->errors]);
    }
}