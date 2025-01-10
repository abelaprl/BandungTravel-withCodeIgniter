<?php

namespace App\Controllers;

use App\Models\ScheduleModel;
use App\Models\RouteModel;
use App\Models\TransportModel;

class ScheduleController extends BaseController
{
    public function index($destinationId)
    {
        $scheduleModel = new ScheduleModel();
        $routeModel = new RouteModel();
        $transportModel = new TransportModel();

        $routes = $routeModel->where('destination_id', $destinationId)->findAll();
        $routeIds = array_column($routes, 'id');

        $schedules = $scheduleModel->whereIn('route_id', $routeIds)->findAll();

        foreach ($schedules as &$schedule) {
            $schedule['route'] = $routeModel->find($schedule['route_id']);
            $schedule['transport'] = $transportModel->find($schedule['transport_id']);
        }

        $data['schedules'] = $schedules;
        $data['destination_id'] = $destinationId;
        return view('schedules', $data);
    }
}