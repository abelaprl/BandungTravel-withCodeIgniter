<?php

namespace App\Controllers;

use App\Models\RouteModel;
use App\Models\TransportModel;
use App\Models\ScheduleModel;

class Admin extends BaseController
{
    public function routes()
    {
        $routeModel = new RouteModel();
        $data['routes'] = $routeModel->findAll();
        return view('admin/routes', $data);
    }

    public function transports()
    {
        $transportModel = new TransportModel();
        $data['transports'] = $transportModel->findAll();
        return view('admin/transports', $data);
    }

    public function schedules()
    {
        $scheduleModel = new ScheduleModel();
        $data['schedules'] = $scheduleModel->findAll();
        return view('admin/schedules', $data);
    }
}
