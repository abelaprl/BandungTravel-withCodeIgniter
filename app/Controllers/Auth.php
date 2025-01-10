<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function attemptLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            $pass = $user['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'preference' => $user['preference'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard/' . $user['preference']);
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function createTestUser()
    {
        $userModel = new UserModel();
        
        // Check if user already exists
        $existingUser = $userModel->where('email', 'abelapriliani@example.com')->first();
        
        if ($existingUser) {
            // Update existing user
            $userModel->update($existingUser['id'], [
                'username' => 'abelapriliani',
                'password' => 'password123',
                'preference' => 'nature'
            ]);
        } else {
            // Create new user
            $userModel->insert([
                'username' => 'abelapriliani',
                'email' => 'abelapriliani@example.com',
                'password' => 'password123',
                'preference' => 'nature'
            ]);
        }
        
        return 'Test user created/updated successfully. You can now login with email: abelapriliani@example.com and password: password123';
    }
}

