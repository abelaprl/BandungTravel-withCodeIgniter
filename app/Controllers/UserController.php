<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function createDefaultAdmin()
    {
        $userModel = new UserModel();

        $data = [
            'username' => 'abel',
            'email'    => 'abel@gmail.com',
            'password' => password_hash('abel123', PASSWORD_DEFAULT)
        ];

        if ($userModel->insert($data)) {
            echo 'Default admin user created successfully.';
        } else {
            echo 'Failed to create default admin user.';
        }
    }
}