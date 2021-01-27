<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Helpers\Validation;
use Core\App;
use App\User;

class DescriptionController
{
    protected $errors = array();
    protected $queryBuilder;
    protected $userId;

    public function __construct() {
        if (count($_SESSION) == 0) {
            Helper::redirect('');
        }
        $this->userId = $_SESSION['id'];
        $this->queryBuilder = App::get('database');
    }

    public function create() {
        $user = new User();
        $description = $user->description($this->userId)[0];
        Helper::view('profile/profile-new_description', ['description' => $description, 'errors' => $this->errors]);
    }

    public function store() {
        $description = Validation::cleanup($_POST['description']);
        $user = new User();
        $user->updateUser('description', $description, 'id', $this->userId);
        Helper::redirect('profile');
    }
}
