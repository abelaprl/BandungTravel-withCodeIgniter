<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DestinationModel;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard/' . session()->get('preference'));
        }
        return view('home');
    }

    public function savePreferences()
    {
        $userModel = new UserModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'preference' => $this->request->getPost('preference')
        ];

        $userId = $userModel->insert($data);

        session()->set([
            'isLoggedIn' => true,
            'userId' => $userId,
            'name' => $data['name'],
            'email' => $data['email'],
            'preference' => $data['preference']
        ]);

        return redirect()->to('/dashboard/' . $data['preference']);
    }

    public function dashboard($preference)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $destinationModel = new DestinationModel();
        $destinations = $destinationModel->where('category', $preference)->findAll();

        return view('dashboard', ['destinations' => $destinations, 'preference' => $preference]);
    }

    public function destination($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $destinationModel = new DestinationModel();
        $destination = $destinationModel->find($id);

        return view('destination', ['destination' => $destination]);
    }
}

