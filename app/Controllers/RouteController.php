<?php

namespace App\Controllers;

use App\Models\RouteModel;

class RouteController extends BaseController
{
    public function index($destinationId)
    {
        $routeModel = new RouteModel();
        $data['routes'] = $routeModel->where('destination_id', $destinationId)->findAll();
        $data['destination_id'] = $destinationId;
        return view('routes', $data);
    }
}