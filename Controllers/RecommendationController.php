<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DestinationModel;

class RecommendationController extends BaseController
{
    public function login()
    {
        // If already logged in, redirect to dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('recommendation/dashboard/' . session()->get('preference'));
        }
        return view('recommendation/login');
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
                return redirect()->to('recommendation/dashboard/' . $user['preference']);
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('recommendation/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('recommendation/login');
        }
    }
    
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('recommendation/dashboard/' . session()->get('preference'));
        }
        return view('recommendation/home');
    }

    public function savePreferences()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'preference' => $this->request->getPost('preference')
        ];

        $userId = $userModel->insert($data);

        session()->set([
            'id' => $userId,
            'username' => $data['username'],
            'email' => $data['email'],
            'preference' => $data['preference'],
            'isLoggedIn' => true
        ]);

        return redirect()->to('recommendation/dashboard/' . $data['preference']);
    }

    public function updatePreference()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('recommendation/login');
        }

        $userModel = new UserModel();
        $newPreference = $this->request->getPost('preference');

        $userModel->update(session()->get('id'), ['preference' => $newPreference]);
        session()->set('preference', $newPreference);

        return redirect()->to('recommendation/dashboard/' . $newPreference);
    }

    public function dashboard($preference)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('recommendation/login');
        }

        $destinationModel = new DestinationModel();
        $destinations = $destinationModel->where('category', $preference)->findAll();

        return view('recommendation/dashboard', [
            'destinations' => $destinations,
            'preference' => $preference
        ]);
    }

    public function destination($id)
    {
       if (!session()->get('isLoggedIn')) {
           return redirect()->to('recommendation/login');
       }

       $destinationModel = new DestinationModel();
       $destination = $destinationModel->find($id);

       return view('recommendation/destination', ['destination' => $destination]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('recommendation/login');
    }
}

