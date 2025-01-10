<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('recommendation/dashboard/' . session()->get('preference'));
        }
        return redirect()->to('recommendation/login');
    }
}

