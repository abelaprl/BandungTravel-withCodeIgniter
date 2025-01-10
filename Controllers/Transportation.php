<?php

namespace App\Controllers;

use App\Models\RouteModel;
use App\Models\TransportModel;
use App\Models\ScheduleModel;
use App\Models\DestinationModel;

class Transportation extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $routeModel = new RouteModel();
        $destinationModel = new DestinationModel();

        $data['routes'] = $routeModel->findAll();
        $data['destinations'] = $destinationModel->findAll();
        $data['areas'] = $routeModel->select('DISTINCT(area)')->findAll();
        $data['preference'] = session()->get('preference');

        return view('transportation/index', $data);
    }

    public function filterRoutes()
    {
        $routeModel = new RouteModel();
        $distance = $this->request->getGet('distance');
        $area = $this->request->getGet('area');

        $data['routes'] = $routeModel->getRoutesByFilter($distance, $area);
        $data['preference'] = session()->get('preference');
        
        return view('transportation/route_list', $data);
    }

    public function route($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $routeModel = new RouteModel();
        $transportModel = new TransportModel();

        $data['route'] = $routeModel->find($id);
        $data['transports'] = $transportModel->findAll();

        return view('transportation/route', $data);
    }

    public function schedule($routeId)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $scheduleModel = new ScheduleModel();
        $data['schedules'] = $scheduleModel->getSchedulesWithTransport($routeId);

        return view('transportation/schedule', $data);
    }

    public function statistics()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $destinationModel = new DestinationModel();
        $data['popularDestinations'] = $destinationModel->getPopularDestinations();

        return view('transportation/statistics', $data);
    }
}